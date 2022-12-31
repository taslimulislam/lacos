<?php

namespace Modules\UserPanel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Cms\Entities\StatisticalReport;

class ReportInvoice extends Model
{
    use HasFactory;

    protected $guarded = [];
    

    public function report()
    {
        return $this->belongsTo(StatisticalReport::class,'statistical_report_id','id');
    }
   
}
