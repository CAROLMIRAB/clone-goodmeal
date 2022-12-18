<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductRepo
{

  /**
   * create
   *
   * @param  mixed $name
   * @param  mixed $description
   * @param  mixed $image
   * @param  mixed $price
   * @param  mixed $discount
   * @param  mixed $category
   * @param  mixed $store
   * @return void
   */
  public function create($name, $description, $image, $price, $discount, $category, $store)
  {
    $product = new Product();
    $product->name = $name;
    $product->description = $description;
    $product->image = $image;
    $product->price = $price;
    $product->discount = $discount;
    $product->category_id = $category;
    $product->store_id = $store;
    $product->save();
    return true;
  }

  /**
   * edit
   *
   * @param  mixed $id
   * @param  mixed $data
   * @return void
   */
  public function edit($id, $data)
  {
    $product = Product::find($id);
    $product->update($data);

    return $product;
  }

  /**
   * delete
   *
   * @param  mixed $id
   * @return void
   */
  public function delete($id)
  {
    $product = Product::find($id);
    $product->delete();

    return $product;
  }

  /**
   * getAll
   *
   * @return void
   */
  public function getAll()
  {
    $product = Product::all()->toArray();

    return $product;
  }
}
