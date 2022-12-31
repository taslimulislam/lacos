<?php

namespace Modules\UserPanel\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\EkoAdmin\Entities\Investor;
use Modules\EkoAdmin\Entities\StartUpModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function startup()
    {
        return $this->belongsTo(StartUpModel::class,'company_id','user_id');
    }

    public function investor()
    {
        return $this->belongsTo(Investor::class,'company_id','user_id');
    }

}
