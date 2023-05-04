<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointsAward extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at'  => 'date:Y-m-d',
        'updated_at'=> 'date:Y-m-d',

    ];
    protected $table="points_awards";
    protected $guarded=[''];

    public function client(){
        return $this->belongsTo(Client::class);
    }

}
