<?php

namespace Modules\EkoAdmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClaimModel extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'claims';

    protected static function newFactory()
    {
        return \Modules\EkoAdmin\Database\factories\ClaimModelFactory::new();
    }
}
