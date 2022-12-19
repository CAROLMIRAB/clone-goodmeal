<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'discount',
        'category_id',
        'store_id'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }
}
