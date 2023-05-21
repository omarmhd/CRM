<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasFactory;
    protected $fillable=['content','sender','title'];
    protected $casts = [
        'created_at'  => 'date:Y-m-d',];
}
