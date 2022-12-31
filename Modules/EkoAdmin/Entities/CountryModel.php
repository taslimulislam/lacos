<?php

namespace Modules\EkoAdmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CountryModel extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $table = 'countries';

    protected static function newFactory()
    {
        return \Modules\EkoAdmin\Database\factories\CountryModelFactory::new();
    }
}
