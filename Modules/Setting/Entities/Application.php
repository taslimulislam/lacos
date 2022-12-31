<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Picture;
use Modules\Setting\Entities\Currency;
use Modules\Setting\Entities\Language;

class Application extends Model
{
    use HasFactory;
    protected $fillable = ['currency_id' , 'title' , 'phone' , 'email' , 'address' , 'tax_no' , 'rtl_ltr','language_id' , 'footer_text' ,'status'];

    public function picture(){
        return $this->morphOne(Picture::class, 'imageable');
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function language(){
        return $this->belongsTo(Language::class);
    }

}
