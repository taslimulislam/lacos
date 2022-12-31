<?php

namespace Modules\EkoAdmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DocumentsModel extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'eko_documents';

    protected static function boot()
    {
        parent::boot();

        if(Auth::check()){
            self::creating(function($model) {
                $model->uuid = (string) Str::uuid();
            });
        }

    }

 
}
