<?php

namespace Modules\EkoAdmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResearchModel extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'articles';
    protected static function newFactory()
    {
        return \Modules\EkoAdmin\Database\factories\ResearchModelFactory::new();
    }
}
