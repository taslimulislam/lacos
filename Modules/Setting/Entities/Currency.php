<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\HumanResource\Entities\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory;
    
    protected $fillable = ['country_id' ,'symbol','title' , 'status'];

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
