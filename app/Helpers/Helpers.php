<?php

use Carbon\Carbon;
use Modules\Academic\Entities\Course;
use Modules\Academic\Entities\Program;
use Illuminate\Support\Facades\Request;
use Modules\Permission\Entities\PerMenu;
use Modules\Academic\Entities\Assignment;
use Modules\Accounts\Entities\AccVoucher;
use Modules\Setting\Entities\Application;
use Modules\Exam\Entities\ExamResultSemester;
use Modules\Hostel\Entities\HostelBedAllocation;
use Modules\StudentEnquery\Entities\PreDefinedFee;
use Modules\Exam\Entities\ExamResultSemesterCourse;
use Modules\StudentEnquery\Entities\StudentEnquery;
use Modules\Hostel\Entities\HostelBedAllocationPaid;
use Modules\StudentEnquery\Entities\StudentEnqueryPay;
// use \NumberFormatter;

if (!function_exists('age')) {
    function age($dob) {
        $age = Carbon::parse($dob)->age;
        return $age . " Years";
    }
}

if (!function_exists('app_setting')) {
    function app_setting(){
        return Application::first();
    }
}

function getTotalAmount($studentEnqueryId)
{
    $studentInquary = StudentEnquery::findOrFail($studentEnqueryId);

    $programType = Program::findOrFail($studentInquary->program_id);

    $preDefinedFee = PreDefinedFee::firstOrFail();
    if ($programType->is_certificate == 1) {
        (double) $totalAmount = (double) $studentInquary->course_fee;
        return $totalAmount;
    }

    else{
        (double) $totalAmount = (double) $preDefinedFee->enqueryAdmFee->fee_amount;
        return $totalAmount;
    }

}

function getAdmissionEnqPayTotal($studentEnqueryId, $predefine_adm_feesid, $predefine_adm_fee_amount) {

    $studentInquary = StudentEnquery::findOrFail($studentEnqueryId);

    $programType = Program::findOrFail($studentInquary->program_id);

    if ($programType->is_certificate == 1) {
        $preDefinedFee = PreDefinedFee::firstOrFail();
        $admEnqPay    = StudentEnqueryPay::where('student_enquery_id', $studentEnqueryId)->get();
        $certificateFeeId =  $preDefinedFee->enquery_reg_wassce_verify_id;
        $filterAdmPay = $admEnqPay->where('fee_id', $certificateFeeId)->pluck('paid_amount')->sum();
        (double) $due = (double) $studentInquary->course_fee - (double) $filterAdmPay;
        return $due;
    }

    else{
        $admEnqPay    = StudentEnqueryPay::where('student_enquery_id', $studentEnqueryId)->get();
        $filterAdmPay = $admEnqPay->where('fee_id', $predefine_adm_feesid)->pluck('paid_amount')->sum();
        (double) $due = (double) $predefine_adm_fee_amount - (double) $filterAdmPay;
        return $due;
    }


}

function getPredefineFeeid($studentEnqueryId)
{
    $studentInquary = StudentEnquery::findOrFail($studentEnqueryId);
    $programType = Program::findOrFail($studentInquary->program_id);
    $preDefinedFee = PreDefinedFee::firstOrFail();
    if ($programType->is_certificate == 1) {
        $feeId =  $preDefinedFee->enquery_reg_wassce_verify_id;
        return $feeId;
    }

    else{

        $feeId =  $preDefinedFee->enquery_adm_fee_id;
        return $feeId;
    }
}

function getDueAmountOfFee($studentEnqueryId, $feeid) {

    $studentInquary = StudentEnquery::findOrFail($studentEnqueryId);
    $programType = Program::findOrFail($studentInquary->program_id);
    $preDefinedFee = PreDefinedFee::firstOrFail();
    $EnqFeePay        = StudentEnqueryPay::where('student_enquery_id', $studentEnqueryId)->get();
    if ($programType->is_certificate == 1) {

        $filterPay     = $EnqFeePay->where('fee_id', $feeid)->where('student_enquery_id',$studentEnqueryId)->pluck('paid_amount')->sum();
        $totalAmountToPay = StudentEnqueryPay::where('fee_id', $feeid)->where('student_enquery_id',$studentEnqueryId)->first();
        (double) $due     = (double) $totalAmountToPay->fee_amount - (double) $filterPay;
        return $due;
    }

    else{


        $filterPay        = $EnqFeePay->where('fee_id', $feeid)->pluck('paid_amount')->sum();
        $totalAmountToPay = $EnqFeePay->firstWhere('fee_id', $feeid);
        (double) $due     = (double) $totalAmountToPay->fee_amount - (double) $filterPay;
        return $due;
    }


}

function getDueAmountOfFeeSum($studentEnqueryId, $feeid) {
    $EnqFeePay = StudentEnqueryPay::where('student_enquery_id', $studentEnqueryId)->get();

    $filterPay = $EnqFeePay->where('fee_id', $feeid)->pluck('paid_amount')->sum();

    return $filterPay;
}

function getRegName($displyCourseCollection) {

    if (!empty($displyCourseCollection)) {
        $heading = "";

        foreach ($displyCourseCollection as $key => $dvalue) {
            $heading = $dvalue->program->program_name . ', ' . $dvalue->semester->semester_name . '- ' . $dvalue->academic_year->academic_year;

        }

        return $heading;
    }

}

function getPreCourseName($courseId) {
    $course = Course::findOrFail($courseId);
    return $course->course_name;
}

function getSemesterWiseRegName($ProgramEnrollData) {

    $title = $ProgramEnrollData->program->program_name . ', ' . $ProgramEnrollData->semester->semester_name . '-' . $ProgramEnrollData->academicYear->academic_year;

    return $title;
}

/**
 * program_id, semester_id, student_id,
 */
function getTotalMarks($program_id, $semester_id, $exam_id, $student_id) {
    $results     = ExamResultSemesterCourse::where('program_id', $program_id)->where('semester_id', $semester_id)->where('exam_id', $exam_id)->where('student_id', $student_id)->get();
    $total_marks = $results->sum('course_total_mark');
    return $total_marks;
}

/**
 * program_id, semester_id, exam_id,
 */
function getHeigestMarks($program_id, $semester_id, $exam_id) {
    $results       = ExamResultSemester::where('program_id', $program_id)->where('semester_id', $semester_id)->where('exam_id', $exam_id)->get();
    $heigest_marks = $results->max('total_mark');
    return $heigest_marks;
}

/**
 * program_id, semester_id, exam_id,
 */
function getHeigestCourseMarks($program_id, $semester_id, $course_id, $exam_id) {
    $results       = ExamResultSemesterCourse::where('program_id', $program_id)->where('semester_id', $semester_id)->where('course_id', $course_id)->where('exam_id', $exam_id)->get();
    $heigest_marks = $results->max('course_total_mark');
    return $heigest_marks;
}

/**
 *  float total grade point, int $total_subject
 */
function getGpa($total_gp, $toal_subject) {
    return $total_gp / $toal_subject;
}

if (!function_exists('str_ordinal')) {
    
    /**
     * Append an ordinal indicator to a numeric value.
     *
     * @param  string|int  $value
     * @param  bool  $superscript
     * @return string
     */
    function str_ordinal($value, $superscript = false) {
        $number = abs($value);

        $indicators = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];

        $suffix = $superscript ? '<sup>' . $indicators[$number % 10] . '</sup>' : $indicators[$number % 10];

        if ($number % 100 >= 11 && $number % 100 <= 13) {
            $suffix = $superscript ? '<sup>th</sup>' : 'th';
        }

        return number_format($number) . $suffix;
    }


    function assignment($academic_year_id,$course_id,$semester_id)
    {
      $assignmentData =   Assignment::where('academic_year_id',$academic_year_id)
                                    ->where('course_id',$course_id)
                                    ->where('semester_id',$semester_id)
                                    ->get();
        return $assignmentData;
    }

    function numberToWords($number) {
        $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        return $f->format($number) . ' dalasi only';
    }

    function getVouchersByNo($voucher_no) {
        $vouchers = AccVoucher::where('voucher_no', $voucher_no)->get();
        return $vouchers;
    }

    function getBedAllocationDue($bedAllocationId)
    {
        $bedAllocationDetail = HostelBedAllocation::findOrFail($bedAllocationId);
        $bedAllocationPay = HostelBedAllocationPaid::where('hostel_bed_allocation_id',$bedAllocationId)->get();
        $sumPay = $bedAllocationPay->sum('paid_amount');
        $payable_amount = $bedAllocationDetail->payable_amount;
        $dueAmount = (double)$payable_amount - (double)$sumPay;
        return $dueAmount;
    }

    function parentMenu($menuId)
    {
        $menuDetail = PerMenu::where('id',$menuId)->first();

        if (empty($menuDetail)) {
            return null;
        }
        return $menuDetail->menu_name;
    }

    class StoragePath{
        const speaker = 'public/storage/speaker/';
    }

    function getImage($url, $path='public/storage/', $full_url = true){   
        $data = asset($path.$url); 
        $url = $url ?  $data : '/public/demoimg/placeholder.jpg';
        return  $full_url ? url($url) :  $url;
    } 

    function userType(){
        return $type = array(
            '3'=>'Startup',
            '4'=>'Investor',
            '5'=>'Hub',
            '6'=>'Others'
        );
    }

    function productStage(){
        return $type = array(
            '1'=>'Customer Development',
            '2'=>'Released',
            '3'=>'Beta',
            '4'=>'R&D',
            '5'=>'Alpha',
            '6'=>'Clinical Trial',
        );
    }

    
    function spaceRemover($text){
        return str_replace(' ', '', $text);
    }


    //set active sidebar menu
    if (!function_exists('hasActive')) {
        function hasActive($uri = '') {
            $active = '';
            if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
                $active = 'active';
            }
            return $active;
        }
    }

    function fundingStage(){

        return $type = array(
            '1'=>'Startup',
            '2'=>'Seed',
            '3'=>'Series A',
            '4'=>'Series B',
            '5'=>'Series C',
            '6'=>'Series D',
            '7'=>'Mezzanine',
            '8'=>'IPO'
        );
        
    }

    function profileprogress($mark){

        
    }

    function getURL($url, $data = array()) {
        $urlArr = explode('?', $url);
        $params = array_merge($_GET, $data);
        $new_query_string = http_build_query($params);
        $newUrl = $urlArr[0] . '?' . $new_query_string;
        return $newUrl;
    }


}


