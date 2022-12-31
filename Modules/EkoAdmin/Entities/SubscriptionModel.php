<?php

namespace Modules\EkoAdmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubscriptionModel extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [];
    protected $table = 'plans';
    protected static function boot()
    {
        parent::boot();
        if(Auth::check()){
            self::creating(function($model) {
                $model->uuid = (string) Str::uuid();
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
        return \Modules\EkoAdmin\Database\factories\SubscriptionModelFactory::new();
    }
}
