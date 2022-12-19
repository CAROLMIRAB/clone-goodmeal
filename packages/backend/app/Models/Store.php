<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public $timestamps = true;

    protected $table = 'stores';

    protected $fillable = [
        'name',
        'address',
        'lat',
        'long',
        'delivery',
        'schedule'
    ];

    /**
     * products
     *
     * @return void
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
