<?php

namespace App\Repositories;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreRepo
{

  /**
   * create
   *
   * @param  mixed $name
   * @param  mixed $address
   * @param  mixed $lat
   * @param  mixed $long
   * @param  mixed $delivery
   * @param  mixed $schedule
   * @return void
   */
  public function create($name, $address, $lat, $long, $delivery, $schedule)
  {
    $store = new Store();
    $store->name = $name;
    $store->address = $address;
    $store->lat = $lat;
    $store->long = $long;
    $store->delivery = $delivery;
    $store->schedule = $schedule;
    $store->save();
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
    $store = Store::find($id);
    $store->update($data);

    return $store;
  }

  /**
   * delete
   *
   * @param  mixed $id
   * @return void
   */
  public function delete($id)
  {
    $store = Store::find($id);
    $store->delete();

    return $store;
  }

  /**
   * getAll
   *
   * @return void
   */
  public function getAll()
  {
    $store = Store::all();

    return $store;
  }

  /**
   * getAll
   *
   * @return void
   */
  public function getAllWithProducts()
  {
    $store = Store::with('products')->get();

    return $store;
  }
}
