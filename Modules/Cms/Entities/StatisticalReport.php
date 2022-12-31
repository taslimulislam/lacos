<?php

namespace Modules\Cms\Entities;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatisticalReport extends Model
{
    use HasFactory;
    protected $guarded = [];

    


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
