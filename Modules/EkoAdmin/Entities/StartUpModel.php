<?php

namespace Modules\EkoAdmin\Entities;

use App\Traits\CommonTrait;
use Illuminate\Support\Str;
use Modules\EkoAdmin\Entities\Deal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Modules\EkoAdmin\Entities\InvestmentStage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StartUpModel extends Model
{
    use HasFactory, CommonTrait;
    protected $table = 'start_ups';
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'address',
        'country_id',
        'no_of_employees',
        'year_launched',
        'industry',
        'market_segment',
        'funding_stage',
        'about',
        'web_link',
        'fb_link',
        'twitter_link',
        'insta_link',
        'linkedIn_link',
        'news_post_id',
        'logo',
        'product_stage_id'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function industryadd(){
        return $this->belongsTo(Industry::class,'industry','id');
    }
    public function investstage(){
        return $this->belongsTo(InvestmentStage::class,'funding_stage','id');
    }

    public function deals()
    {
       return $this->hasMany(Deal::class,'startup_user_id','user_id');
    }


    public function scopeFilter($query, $request)
    {
        
        if(!empty($request->country_id)){
            $query->where('country_id', $request->country_id);
        }
        if(!empty($request->funding_stage)){
            $query->where('funding_stage', $request->funding_stage);
        }
        if(!empty($request->industry)){
            $query->where('industry', $request->industry);
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




}
