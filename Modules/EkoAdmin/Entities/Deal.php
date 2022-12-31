<?php

namespace Modules\EkoAdmin\Entities;

use App\Traits\CommonTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deal extends Model
{
    use HasFactory, CommonTrait;

    protected $guarded = [];
    

    public function investor(){
        return $this->hasOne(Investor::class,'user_id','investor_user_id');
    }
    
    public function startup(){
        return $this->hasOne(StartUpModel::class,'user_id','startup_user_id');
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function($model) {
            $model->uuid = (string) Str::uuid();
        });
    }


}
