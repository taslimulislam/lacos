<?php

namespace Modules\EkoAdmin\Entities;

use App\Traits\CommonTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\EkoAdmin\Entities\StartUpModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductStage extends Model
{
    use HasFactory,CommonTrait;

    protected $fillable = [];
    
    public function startups()
    {
        return $this->hasMany(StartUpModel::class,'product_stage_id','id');
    }
}
