<?php

use Modules\Room\Entities\Room;
use Illuminate\Support\Facades\DB;
use Modules\Fee\Entities\FeeCategory;
use Modules\Admission\Entities\AdmissionStudent;
use Modules\Company\Entities\Company;
use Modules\Branch\Entities\Branch;
use Modules\Academic\Entities\AcademicYear;
use Modules\Academic\Entities\Program;
use Modules\Academic\Entities\Course;
use Modules\Academic\Entities\AcSemester;
use Modules\Academic\Entities\Batch;
use Modules\Inventory\Entities\InventoryStore;
use Modules\Inventory\Entities\InventoryCustomer;
use Modules\Paymethod\Entities\Paymethod;

    function companyId()
    {
        $data =   Company::orderBy('id', 'desc')->get();
        return $data;

    }
    function branchId()
    {
        $data =  Branch::where('is_active',1)->orderBy('id', 'desc')->get();
        return $data;
    }

    function batchId()
    {
        $data =  Batch::orderBy('id', 'desc')->get();
        return $data;
    }

     function courseId()
    {
        $data =  Course::where('is_active',1)->orderBy('id', 'desc')->get();

        return $data;
    }

    function programId()
    {
        $data =  Program::orderBy('id', 'desc')->get();
        return $data;
    }

    function academicyearId()
    {
        $data =  AcademicYear::orderBy('id', 'desc')->get();
        return $data;
    }

    function feeCategoryId()
    {
        $data =  FeeCategory::orderBy('id', 'desc')->get();
        return $data;
    }


    function coaId()
    {
        return DB::table('acc_coas')->get();

    }


    function semesterId()
    {
        $data =  AcSemester::orderBy('id', 'desc')->get();
        return $data;
    }

    function onlineAdmissionStudentFormId()
    {
        $data =  AdmissionStudent::orderBy('id', 'desc')->get();
        return $data;
    }

    function storeId()
    {
        $data =  InventoryStore::where('is_active',1)->orderBy('id', 'desc')->get();
        return $data;
    }

    function paymethodId()
    {
        $data =  Paymethod::where('is_active',1)->orderBy('id', 'desc')->get();
        return $data;
    }

    function customerId()
    {
        $data =  InventoryCustomer::orderBy('id', 'desc')->get();
        return $data;
    }
