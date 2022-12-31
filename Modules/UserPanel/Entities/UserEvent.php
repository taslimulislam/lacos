<?php

namespace Modules\UserPanel\Entities;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserEvent extends Model
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

    public function speakers(){
        return $this->hasMany(EventSpeaker::class,'user_event_id','id');
    }
 
}
