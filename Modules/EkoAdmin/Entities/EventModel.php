<?php

namespace Modules\EkoAdmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventModel extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'events';
    protected static function newFactory()
    {
        return \Modules\EkoAdmin\Database\factories\EventModelFactory::new();
    }
}
