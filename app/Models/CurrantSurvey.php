<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrantSurvey extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $casts = [
        'created_at'  => 'date:Y-m-d',
        'updated_at'=> 'date:Y-m-d',

    ];
    protected $appends = ['status_print'];

    protected $guarded=['_token'];

    public function department(){
        return $this->belongsTo(Department::class)->withDefault();
    }


    public function results(){

            return $this->hasMany(Result::class);

    }
    public function employee(){

        return $this->belongsTo(User::class);

    }
    public function survey(){

        return $this->belongsTo(Survey::class)->withDefault();;

    }

    public function evaluator(){

        return $this->belongsTo(User::class,'evaluator_id');

    }
    public function getStatusPrintAttribute()
    {

        $status=$this->status;

        switch ($status) {
            case "0":
                return " نموذج جديد ";
                break;
            case "1":
                return "تم التقيم";
                break;
            case "2":
                return "وافق الموظف";
                break;
            case "3":
                return "تم الاعتماد";
                break;
            case "4":
                return "إعادة التقيم";
                break;
        }



    }

}
