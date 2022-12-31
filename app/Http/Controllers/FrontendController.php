<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\StudentEnquery\Entities\PreDefinedFee;
use Carbon\Carbon;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use Modules\Branch\Entities\Branch;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;
use Modules\Academic\Entities\Batch;
use Modules\Fee\Entities\FeeCategory;
use Modules\Academic\Entities\Program;
use Modules\Academic\Entities\BatchTime;
use Modules\Academic\Entities\AcSemester;
use Modules\Academic\Entities\LeadSource;
use Modules\StudentEnquery\Entities\Award;
use Modules\Academic\Entities\AcademicYear;
use Modules\StudentEnquery\Entities\Gender;
use Illuminate\Contracts\Support\Renderable;
use Modules\StudentEnquery\Entities\Sponsor;
use Modules\StudentEnquery\Entities\Nationality;

use Modules\StudentEnquery\Entities\StudentStatus;
use Modules\StudentEnquery\Entities\MobileOperator;
use Modules\StudentEnquery\Entities\StudentEnquery;
use Modules\StudentEnquery\Entities\StudentEnqueryPay;
use Modules\StudentEnquery\Http\Requests\StudentEnqueryRequest;
use Modules\StudentEnquery\Http\Requests\StudentEnqueryUpdateRequest;

class FrontendController extends Controller
{
    public function enqueryPaymentDetails($uuid){
        $preDefinedFee  = PreDefinedFee::firstOrFail();

        return view('enquery-registration-payment-info', [

                'amount' => $preDefinedFee->enqueryRegFee->fee_amount,
                'uuid' => $uuid,
            ]
        );


    }


    public function paid(Request $request){
        $uuid     = $request->uuid;
        $studentEnquery    = StudentEnquery::where('uuid', $uuid)->firstOrFail();

        $studentEnqueryPay = new StudentEnqueryPay();


        $data              = [
            'name'             => $studentEnquery->full_name,
            // 'registration_fee' => $preDefinedFee->enqueryRegFee->fee_amount,
            // 'addmission_fee'   => $preDefinedFee->enqueryAdmFee->fee_amount,
            'registratin_edit'     => route('student-enquery.edit',$uuid),
        ];

        Mail::send('studentenquery::redirect-enquery-edit-mail', $data, function ($message) use ($studentEnquery) {
            $message->to($studentEnquery->student_email, $studentEnquery->full_name)
                    ->subject('Registration Payment');
            $message->from('shaykatali932@gmail.com');
        });

        Toastr::success('Student Enquery added successfully :)', 'Success');

        return redirect('/');
    }
}
