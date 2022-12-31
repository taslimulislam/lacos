<?php

namespace Modules\EkoAdmin\Entities;

use Modules\EkoAdmin\Entities\Deal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [];
    
     public function startups()
     {
          return $this->hasMany(StartUpModel::class,'industry','id');
     }


}
