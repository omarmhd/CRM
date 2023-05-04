<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $casts = [
        'created_at'  => 'date:Y-m-d',
        'updated_at'=> 'date:Y-m-d',

    ];
    protected $guarded=['_token'];



    public  function transactions(){

        return $this->hasMany(Transaction::class);

    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($client) {
            if ($client->transactions()->exists()) {
                throw new \Exception('لا يمكن حذف زبون له حركات مالية');

            }
        });
    }

}
