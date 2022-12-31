<?php

namespace Modules\EkoAdmin\Entities;

use App\Traits\CommonTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvestmentStage extends Model
{
    use HasFactory,CommonTrait;

    protected $fillable = [];
    
    public function startups()
    {
        return $this->hasMany(StartUpModel::class,'funding_stage','id');
    }
}
