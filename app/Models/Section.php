<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $casts = [
        'created_at'  => 'date:Y-m-d',
        'updated_at'=> 'date:Y-m-d',

    ];
    public $fillable=["title","category"];


    public   function questions(){
        return $this->hasMany(Question::class);
    }

}
