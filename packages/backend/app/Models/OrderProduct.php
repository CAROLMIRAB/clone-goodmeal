<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'price',
        'discount',
        'product_id',
        'order_id'
    ];

    /**
     * products
     *
     * @return void
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
