<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'address',
        'lat',
        'long',
        'delivery',
        'schedule'
    ];
}
