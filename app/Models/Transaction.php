<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['_token'];
    protected $appends=["name"];
    protected $casts = [
        'created_at'  => 'date:Y-m-d',];
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function getNameAttribute() {

        return $this->client->full_name;
    }

}
