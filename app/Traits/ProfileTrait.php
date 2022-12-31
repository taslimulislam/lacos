<?php
namespace App\Traits;

use Modules\EkoAdmin\Entities\StartUpModel;
use Modules\Teams\Entities\TeamMember;
use Modules\UserPanel\Entities\Favorite;
use Modules\UserPanel\Entities\Follow;
use Modules\UserPanel\Entities\ReportInvoice;
use Modules\UserPanel\Entities\UserNews;

trait ProfileTrait{

    public function startup(){
        return $this->hasOne(StartUpModel::class);
    }

    public function teams(){
        return $this->hasMany(TeamMember::class);
    }
    public function follows(){
        return $this->hasMany(Follow::class);
    }

    public function team(){
        return $this->hasOne(TeamMember::class);
    }

    public function follow(){
        return $this->hasOne(Follow::class);
    }

    public function favorite(){
        return $this->hasOne(Favorite::class);
    }

    public function news(){
        return $this->hasOne(UserNews::class);
    }

    public function reportInvoice(){
        return $this->hasOne(ReportInvoice::class);
    }


}