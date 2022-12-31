<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use Flutterwave\Rave;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Cms\Entities\StatisticalReport;
use Modules\UserPanel\Entities\ReportInvoice;
use Modules\PaymentGateway\Entities\MyEventHandler;
use Modules\PaymentGateway\Entities\PaymentGateway;

class Reports extends Controller
{

    public function index(Request $request){

        return view('frontend.pages.reports.report',[
            'report' => $this->staticalReports($request),
            'keyword' => $request->keyword?$request->keyword:''
        ]);
    }
    
    public function staticalReports($request)
    {
        if($request->keyword!=''){
            $keyword = $request->keyword;
            $reports = StatisticalReport::when($keyword, function ($q) use ($keyword) {
                return $q->where('name', 'LIKE', '%' . $keyword . '%');;
            })
            ->paginate(12)->appends('keyword', $keyword);
        }else{
            $reports = StatisticalReport::orderBy('id', 'DESC')->paginate(12);
        }

        $RP = array();
        $i = 1;
        foreach ($reports as $key   => $item) {
            $RP['name_' . $i]       = $item->name;
            $RP['price_' . $i]      = $item->price;
            $RP['link_' . $i]       = url('report-detail',$item->uuid);
            $RP['report_image_' . $i]   = getImage($item->report_image);
            $RP['report_doc_' . $i]     = getImage($item->report_doc);
            $RP['about_report_'.$i]     = $item->about_report;
            $RP['date_'.$i]             = Carbon::parse($item->created_at)->diffForhumans();
            $i++;
        }
        return $RP;
    }

    public function reportDetail($id)
    {

        $item  = StatisticalReport::firstWhere('uuid',$id);

        $RP = array();
        
        $RP['name']             = $item->name;
        $RP['price']            = $item->price;
        $RP['link']             = url('report-detail',$item->uuid);
        $RP['uuid']             = $item->uuid;
        $RP['report_image']     = getImage($item->report_image);
        $RP['report_doc']       = getImage($item->report_doc);
        $RP['about_report']     = $item->about_report;
        $RP['date']             = Carbon::parse($item->created_at)->diffForhumans();

        if(auth()->user()){
            $buyinfo = ReportInvoice::with('report')->where(['statistical_report_id'=>$item->id,'user_id'=>auth()->user()->id])->first();
        }else{
            $buyinfo = '';
        }
        

        return view('frontend.pages.reports.report_detail',[
            'report' => $RP,
            'buyinfo'=>$buyinfo
        ]);
      
        
    }

    public function checkPayment($invoice, array $request){
        // 'http://localhost/GDM/alphageek-new-0.3/paymentgateway/flutterwave-payment';
        $amount =   $invoice->price; 
        $URL = route('flutterwave-payment',$request);//(isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $settings = PaymentGateway::where('id',1)->first();

        $postData = json_decode($settings->details);
        $publicKey = $postData->flutter_public_key;
        $secretKey =  $postData->flutter_secret_key;
        $success_url = route('payment-success');
        $failure_url = route('payment-fail');;
    
        if($postData->flutter_publich==1){
            $env = "production";
        }else{
            $env = "development";
        }

        if (isset($amount)) {
            $_SESSION['publicKey'] = $publicKey;
            $_SESSION['secretKey'] = $secretKey;
            $_SESSION['env'] = $env;
            $_SESSION['successurl'] = $success_url;
            $_SESSION['failureurl'] = $failure_url;
            $_SESSION['currency'] = 'NGN';
            $_SESSION['amount'] = $amount;
            $_SESSION['invdata'] = $invoice;
        }

        $prefix = 'RV'; // Change this to the name of your business or app
        $overrideRef = false;
        
        // Uncomment here to enforce the useage of your own ref else a ref will be generated for you automatically
        // if (isset($postData['ref'])) {
        //     $prefix = $postData['ref'];
        //     $overrideRef = true;
        // }

        $payment = new Rave($_SESSION['secretKey'], $prefix, $overrideRef);

        $payment_options="value can be card, account or both";
        $description="GDM Package";
        $logo = @$settings->favicon;
        $title = 'Victor Store';
        $country="NG";
        $currency='NGN';
        $email="tuhinsorker92@gmail.com";
        $firstname="Md Tuhin Sarker";
        $lastname="Sarker";
        $phonenumber="21312312";
        $pay_button_text='Complete Payment';

        if (isset($amount)) {
            // Make payment
            $payment
                ->eventHandler(new MyEventHandler($invoice))
                ->setAmount($amount)
                ->setPaymentOptions($payment_options) // value can be card, account or both
                ->setDescription($description)
                ->setLogo($logo)
                ->setTitle($title)
                ->setCountry($country)
                ->setCurrency($currency)
                ->setEmail($email)
                ->setFirstname($firstname)
                ->setLastname($lastname)
                ->setPhoneNumber($phonenumber)
                ->setPayButtonText($pay_button_text)
                ->setRedirectUrl($URL)
                // ->setMetaData(array('metaname' => 'SomeDataName', 'metavalue' => 'SomeValue')) // can be called multiple times. Uncomment this to add meta datas
                // ->setMetaData(array('metaname' => 'SomeOtherDataName', 'metavalue' => 'SomeOtherValue')) // can be called multiple times. Uncomment this to add meta datas
                ->initialize();
                exit;
                // dd($_SESSION['secretKey']);
                //return $_SESSION['secretKey'];

        }

        
    }

    public function buyCheckReport(Request $request)
    {

        if(!auth()->user()){
            Session::flash('exception', "Please Login First");
            return redirect()->back();
        }

        Validator::make($request->all(), [
            'payment_method' => ['required'],
        ]);


        $report =  StatisticalReport::firstWhere('uuid',$request->report_id);

        $this->checkPayment($report,$request->all());

        $info = ReportInvoice::create([
            'user_id'               => auth()->user()->id,
            'statistical_report_id' => $report->id,
            'buy_price'             => $report->price,
            'report_price'          => $report->price,
            'discount'              => 0,
            'payment_method'        => $request->payment_method,
        ]);

        $notification = new Notification();
        $dataN['url']       = url('report-detail').'/'.$request->report_id;
        $dataN['message']       = 'A Report Buy Successfully';
        $dataN['activities']       = json_encode($info);
        $notification->create($dataN);

        Session::flash('message', "This Report Buy Successfully");
        return redirect()->back();


    }


}
