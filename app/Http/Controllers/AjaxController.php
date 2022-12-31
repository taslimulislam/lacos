<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Academic\Entities\Course;
use Modules\Academic\Entities\Program;
use Modules\Tax\Entities\Tax;
use Modules\Hostel\Entities\HostelFee;
use Modules\Hostel\Entities\HostelStayDuration;
use Carbon\Carbon;

class AjaxController extends Controller
{
    public function getRegData($programId,$courseId)
    {
        $courseArray = explode(",",$courseId);
        $programDetail = Program::findOrFail($programId);
        // $courseData = Course::where('id',1)->first();
        $totalCadit = "";
        $totalLab = "";
        $totalSub = "";
        $courseData = Course::whereIn('id', $courseArray)->get();
        $totalCadit =  $courseData->sum('credit');
        $totalLab = $courseData->sum('lab_credit');
        $totalSub = $courseData->count();
        (double) $totalMoney = ((int)$totalCadit + (int)$totalLab) *(double)$programDetail->credit_fee ;
        foreach ($courseData as $key => $crvalue) {

        }

        return response()->json([
                'totalcradit'=>$totalCadit,
                'totalLab'=>$totalLab,
                'totalsub'=>$totalSub,
                'totalfee'=>$totalMoney,
            ]);
    }


    public function getTaxValue($taxId)
    {
        $taxData = Tax::findOrFail($taxId);

        return response()->json([
            'taxDetail'=>$taxData,

        ]);
    }


    public function getHostelBedFee($getHostelBedFee)
    {
        $bedFeeData = HostelFee::findOrFail($getHostelBedFee);

        return response()->json([
            'bedFedDetail'=>$bedFeeData,

        ]);
    }
    public function ceheckout($checkout)
    {
        $duration = HostelStayDuration::findOrFail($checkout);
        $totalDay = $duration->duration_day;
        $currentData = Carbon::now();
        $checkout = $currentData->addDays($totalDay);
        $newcheckout = $checkout->format('Y-m-d');

        return response()->json([
            'checkoutDate'=> $newcheckout,
            'totalDays'=>$totalDay,

        ]);
    }

    public function getOtherFee(Request $request)
    {

        $oterhFeeData = HostelFee::whereIn('id',$request->feeid)->get();

        $totalFee = array();
        foreach ($oterhFeeData as $key => $value) {

            $fee   = ((double)$value->fee_amount  + (double)$value->vat_amount) - (double)$value->discount_amount;
            array_push($totalFee, $fee);
        }

        $sendOtherFee = array_sum($totalFee);

        return response()->json([
            'otherFee'=> $sendOtherFee
        ]);
    }
}
