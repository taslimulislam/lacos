<?php

namespace Modules\EkoAdmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AcademiaModel extends Model
{
    use HasFactory;
    protected $table = 'academia';
    protected $fillable = [
        'name',
        'country_id',
        'industry_id',
        'logo'
    ];

    protected static function boot()
    {
        parent::boot();
        if(Auth::check()){
            self::creating(function($model) {
                $model->uuid = (string) Str::uuid();
            });
        }

    }

    protected static function newFactory()
    {
        return \Modules\EkoAdmin\Database\factories\AcademiaModelFactory::new();
    }
}
