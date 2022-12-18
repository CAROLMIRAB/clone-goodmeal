<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'orderno',
        'status',
        'delivery',
        'user_id',
        'store_id'
    ];
}
