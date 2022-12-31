<?php

namespace Modules\EkoAdmin\Entities;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hub extends Model
{
    // use ,SoftDeletes after HasFactory if wants soft delete
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'industry_id',
        'country_id',
        'num_of_investment',
        'about',
        'web_link',
        'address',
        'year_launched',
        'logo',
    ];

    
    public function country(){
        return $this->belongsTo(Country::class);
    }
    
    public function industry(){
        return $this->belongsTo(Industry::class);
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

    public function scopeFilter($query, $request)
    {
        
        if(!empty($request->country_id)){
            $query->where('country_id', $request->country_id);
        }
        if(!empty($request->industry)){
            $query->where('industry_id', $request->industry);
        }
        return $query;
    }


    
    protected static function newFactory()
    {
        return \Modules\EkoAdmin\Database\factories\HubFactory::new();
    }
}
