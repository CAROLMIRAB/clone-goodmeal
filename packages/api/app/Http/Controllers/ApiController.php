<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{


    private $urlstore;

    private $urlproduct;


    public function __construct()
    {
        $url = "http://localhost:8000"; //env('BACKEND_GOODMEAL');
        $this->urlproduct = $url . '/api/product/';
        $this->urlstore = $url . '/api/store/';
    }

    /**
     * createProduct
     *
     * @param  mixed $request
     * @return void
     */
    public function createProduct(Request $request)
    {
        $url = $this->urlproduct . "add";
        $name = $request->name;
        $description = $request->description;
        $image = $request->image;
        $price = $request->price;
        $discount = $request->discount;
        $category = $request->category;
        $store = $request->store;

        $data = [
            'name' => $name,
            'description' => $description,
            'image' => $image,
            'price' => $price,
            'discount' => $discount,
            'category' => $category,
            'store' => $store
        ];

        $response = Http::post($url, $data);

        return $response;
    }

    /**
     * updateProduct
     *
     * @param  mixed $request
     * @return void
     */
    public function updateProduct(Request $request)
    {
        $id = $request->id;
        $url =  $this->urlproduct . "update/$id";
        $name = $request->name;
        $description = $request->description;
        $image = $request->image;
        $price = $request->price;
        $discount = $request->discount;
        $category = $request->category;
        $store = $request->store;

        $data = [
            'name' => $name,
            'description' => $description,
            'image' => $image,
            'price' => $price,
            'discount' => $discount,
            'category' => $category,
            'store' => $store
        ];

        $response = Http::post($url, $data);

        return $response;
    }

    /**
     * indexProduct
     *
     * @return void
     */
    public function indexProduct(Request $request)
    {
        $store = $request->store;
        $url =  $this->urlproduct;
        $response = Http::get($url, ['store' => $store])->json();

        return $response;
    }

    /**
     * deleteProduct
     *
     * @param  mixed $request
     * @return void
     */
    public function deleteProduct(Request $request)
    {
        $id = $request->id;
        $url =  $this->urlproduct . "delete/";
        $response = Http::delete($url . $id);

        return $response;
    }

    /**
     * createStore
     *
     * @param  mixed $request
     * @return void
     */
    public function createStore(Request $request)
    {
        $url = $this->urlstore . "add";
        $name = $request->name;
        $address = $request->address;
        $lat = $request->lat;
        $long = $request->long;
        $delivery = $request->delivery;
        $schedule = $request->schedule;

        $data = [
            'name' => $name,
            'address' => $address,
            'lat' => $lat,
            'long' => $long,
            'delivery' => $delivery,
            'schedule' => $schedule,
        ];

        $response = Http::post($url, $data)->json();

        return $response;
    }

    /**
     * updateProduct
     *
     * @param  mixed $request
     * @return void
     */
    public function updateStore(Request $request)
    {
        $url =  $this->urlstore . "update/";
        $id = $request->id;
        $name = $request->name;
        $address = $request->address;
        $lat = $request->lat;
        $long = $request->long;
        $delivery = $request->delivery;
        $schedule = $request->schedule;

        $data = [
            'name' => $name,
            'address' => $address,
            'lat' => $lat,
            'long' => $long,
            'delivery' => $delivery,
            'schedule' => $schedule,
        ];

        $response = Http::post($url . $id, $data);

        return $response;
    }

    /**
     * indexStore
     *
     * @return void
     */
    public function indexStore(Request $request)
    {
        $url =  $this->urlstore;
        $response = Http::get($url)->json();

        return $response;
    }

    /**
     * deleteStore
     *
     * @param  mixed $request
     * @return void
     */
    public function deleteStore(Request $request)
    {
        $id = $request->id;
        $url =  $this->urlstore . "delete/";
        $response = Http::delete($url . $id);

        return $response;
    }
}
