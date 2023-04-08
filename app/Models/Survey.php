<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'start_date', 'end_date', 'is_open'];


    public  function  sections(){

        return  $this->belongsToMany(Section::class,'section_surveys');
    }
    public function getCreatedAtAttribute($value){

        return date("Y-m-d",strtotime($value));

    }
}
