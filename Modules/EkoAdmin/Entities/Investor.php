<?php

namespace Modules\EkoAdmin\Entities;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investor extends Model
{
    // use ,SoftDeletes after HasFactory if wants soft delete
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'company_name',
        'industry_id',
        'country_id',
        'investor_types_id',
        'investment_stage_id',
        'exits_id',
        'about',
        'web_link',
        'year_founded',
        'logo',
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function industry(){
        return $this->belongsTo(Industry::class);
    }
    public function investorType(){
        return $this->belongsTo(InvestorType::class,'investor_types_id');
    }
    public function investmentExit(){
        return $this->belongsTo(InvestmentExit::class,'exits_id');
    }
    public function investmentStage(){
        return $this->belongsTo(InvestmentStage::class,'investment_stage_id');
    }

    
    public function scopeFilter($query, $request)
    {
        
        if(!empty($request->country_id)){
            $query->where('country_id', $request->country_id);
        }
        if(!empty($request->funding_stage)){
            $query->where('investment_stage_id', $request->funding_stage);
        }
        if(!empty($request->industry)){
            $query->where('industry_id', $request->industry);
        }
        return $query;
    }
    

    protected static function boot()
    {
        parent::boot();

        self::creating(function($model) {
            $model->uuid = (string) Str::uuid();
        });

        if(Auth::check()){
            self::creating(function($model) {
                $model->created_by = Auth::id();
            });
            self::updating(function($model) {
                $model->updated_by = Auth::id();
            });
            self::deleted(function($model){
                $model->updated_by = Auth::id();
                $model->save();
            });
        }

    }

    protected static function newFactory()
    {
        return \Modules\EkoAdmin\Database\factories\InvestorFactory::new();
    }
}
