<?php

namespace Modules\PaymentGateway\Http\Controllers;

use Flutterwave\Rave;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Modules\Subcription\Entities\Package;
use Modules\Cms\Entities\StatisticalReport;
use Illuminate\Contracts\Support\Renderable;
use Modules\UserPanel\Entities\ReportInvoice;
use Modules\Subcription\Entities\PackageInvoice;
use Modules\Subcription\Entities\PackageDuration;
use Modules\PaymentGateway\Entities\MyEventHandler;
use Modules\PaymentGateway\Entities\PaymentGateway;
use Modules\Subcription\Entities\PackageInvoicePayment;
use Modules\Subcription\Entities\PackageRecarringInvoice;
use Modules\Subcription\Entities\PackageRecarringInvoicePayment;

class PaymentGatewayController extends Controller
{
   
    public function index()
    {
        return view('paymentgateway::index');
    }


    public function settingGateway(){
        return view('paymentgateway::__setting_view',[
            'flutterweb' =>PaymentGateway::where('id',1)->first()
        ]);
    }

    

    public function updateGateway(Request $request){

        $flutterwave['event'] = 'flutterwave';
        $details = array(
            'flutter_public_key'=>$request->flutter_public_key,
            'flutter_secret_key'=>$request->flutter_secret_key,
            'flutter_encription_key'=>$request->flutter_encription_key,
            'flutter_publich'=>$request->flutter_publich
        );
        $flutterwave['details'] = json_encode($details);

    
        if(PaymentGateway::where('id',1)->first()){

            PaymentGateway::where('id',1)->update($flutterwave);
            $response = array(
                'success'  =>true,
                'title'=>'Payment Gateway',
                'message'  => 'Added successfully'
            );
            return json_encode($response);

        }else{

            PaymentGateway::create($flutterwave);
            $response = array(
                'success'  =>true,
                'title'=>'Payment Gateway',
                'message'  => 'Added successfully'
            );
            return json_encode($response);
        }
        
    }



    
    public function redireacUrl(Request $request)
    {

        $getData = $request;

        $settings = PaymentGateway::where('id',1)->first();
        $postData = json_decode($settings->details);
        $publicKey = $postData->flutter_public_key;
        $secretKey =  $postData->flutter_secret_key;
        $success_url = route('payment-success');
        $failure_url = route('payment-fail');
        if($postData->flutter_publich=1){
            $env = "development";
        }else{
            $env = "development";
        }
        $_SESSION['publicKey'] = $publicKey;
        $_SESSION['secretKey'] = $secretKey;
        $_SESSION['env'] = $env;
        $_SESSION['successurl'] = $success_url;
        $_SESSION['failureurl'] = $failure_url;
        $_SESSION['currency'] = 'NGN';


       $report =  StatisticalReport::firstWhere('uuid',$request->report_id);

        $invoice = ReportInvoice::create([
            'user_id' => auth()->user()->id,
            'statistical_report_id' => $report->id,
            'buy_price' => $report->price,
            'report_price' => $report->price,
            'discount' => 0,
            'payment_method' => $request->payment_method,
        ]);
        

        $prefix = 'RV'; // Change this to the name of your business or app
        $overrideRef = false;
        $payment = new Rave($secretKey, $prefix, $overrideRef);
        
        if (isset($getData['cancelled'])) {
            // Handle canceled payments
            $payment
                ->eventHandler(new MyEventHandler($invoice))
                ->paymentCanceled($getData['cancelled']);
        } elseif (isset($getData['tx_ref'])) {
            // Handle completed payments
            $payment->logger->notice('Payment completed. Now requerying payment.');
            $payment
                ->eventHandler(new MyEventHandler($invoice))
                ->requeryTransaction($getData['transaction_id']);
        } else {
            $payment->logger->warn('Stop!!! Please pass the txref parameter!');
            echo 'Stop!!! Please pass the txref parameter!';
        }
        
        Toastr::success('Buy Successfully, You Can Download The Report Doc', 'Success');

        Session::flash('message', "Buy Successfully, You Can Download The Report Doc");
        return redirect()->route('report.detail',$report->uuid);

    }


    public function paymentSuccess($data=null)
    {
        session()->flash('msg', 'payment success');
            return redirect()->route('client.package-list');

    }

    public function paymentFail()
    {
       return false;
    }




    private function storeOffer($invoice,$package){

        $invoice->title = $package->title;
        $invoice->price = $package->price;
        $invoice->package_duration_id = $package->duration;
        $invoice->offer = $package->offer;
        $invoice->offer_price = $package->offer_price;
        $invoice->offer_discount = $package->offer_discount;
        $invoice->offer_duration = $package->offer_duration;
        $invoice->offer_status = $package->offer_status;
        $invoice->offer_start_date = $package->offer_start_date;
    }


    private function recarringInvoiceStore($request , $invoice, $package, $modules_id){

        $recarringInvoice = new PackageRecarringInvoice();
        $recarringInvoice->fill($request->all());
        $recarringInvoice->invoice_id = $invoice->invoice_id;
        $this->storeRecarringOffer( $recarringInvoice ,$package);
        $recarringInvoice->status = @$request->status ?? 0;
        if($recarringInvoice->save()){
            $recarringInvoice->modules()->sync( $modules_id);
            $recarringInvoicePayment = new PackageRecarringInvoicePayment();
            $recarringInvoicePayment->fill($request->only('total_amount','package_payment_method_id','received_date'));
            $recarringInvoicePayment->package_recarring_invoice_id = $recarringInvoice->id;
            $recarringInvoicePayment->save();
        }
    }

    private function storeRecarringOffer($recarringInvoice ,$package){

        $recarringInvoice->title    = $package->title;
        $recarringInvoice->price    = $package->price;
        $recarringInvoice->duration = $package->duration;
        $recarringInvoice->offer    = $package->offer;
        $recarringInvoice->offer_price = $package->offer_price;
        $recarringInvoice->offer_discount = $package->offer_discount;
        $recarringInvoice->offer_duration = $package->offer_duration;
        $recarringInvoice->offer_status = $package->offer_status;
        $recarringInvoice->offer_start_date = $package->offer_start_date;
    }

}