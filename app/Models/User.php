<?php

namespace App\Models;

use App\Traits\ProfileTrait;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Modules\User\Entities\Student;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes, ProfileTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'user_type_id',
        'email_verification_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
            self::creating(function($model) {
                $model->uuid = (string) Str::uuid();
            });

        static::addGlobalScope('sortByLatest', function (Builder $builder) {
            $builder->orderByDesc('id');
        });
    }


    public function student(){
       if($this->user_type_id == 3){
        return true;
       } else {
        return false;
       }
    }

    public function admin(){
        if($this->user_type_id == 1){
         return true;
        } else {
         return false;
        }
    }

    public function studentdata(){
        return $this->hasOne(Student::class);
    }

    
}
