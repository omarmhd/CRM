<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointsAward extends Model
{
    use HasFactory;

    protected $table="points_awards";
    protected $guarded=[''];

    public function client(){
        return $this->belongsTo(Client::class);
    }

}
