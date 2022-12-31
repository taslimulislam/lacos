<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Picture;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['title','status'];

    public function picture(){
        return $this->morphOne(Picture::class, 'imageable');
    }
}
