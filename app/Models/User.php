<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use SoftDeletes;
    protected $fillable=['name',"email","full_name","role","password","created_at","updated_at"];

    public $timestamps = true;

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $appends = ['department_name'];


    protected $casts = [
        'email_verified_at' => 'datetime',

    ];

    public function department(){
        return $this->belongsTo(Department::class)->withDefault();
    }


    public function getCreatedAtAttribute($value){

        return date("Y-m-d",strtotime($value));

    }

    public function getDepartmentNameAttribute()
    {
        return $this->department->name;
    }
}
