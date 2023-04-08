<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class SectionSurvey extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='section_surveys';

    protected $guarded=[];



    public function section(){
       return $this->belongsTo(Section::class);

    }


    public function results(){

        return $this->hasMany(Result::class,'section_survey_id','id');;

    }
}
