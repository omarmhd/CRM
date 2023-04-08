<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable=["email","manager_id","full_name","department_id"];

    public function manager(){
        return $this->belongsTo(Employee::class)->withDefault();
    }
}
