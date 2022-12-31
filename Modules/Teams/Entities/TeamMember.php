<?php

namespace Modules\Teams\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamMember extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function teamUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
