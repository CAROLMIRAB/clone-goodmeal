<?php

namespace App\Http\Controllers;

use App\Repositories\StoreRepo;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private $storeRepo;

    /**
     * __construct
     *
     * @param  mixed $storeRepo
     * @return void
     */
    public function __construct(StoreRepo $storeRepo)
    {
        $this->storeRepo = $storeRepo;
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $stores = $this->storeRepo->getAll();
        return  response()->json([
            'status' => 200,
            'message' => 'Todas las tiendas',
            'data' => $stores
        ]);
    }

    /**
     * add
     *
     * @param  mixed $request
     * @return void
     */
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'category' => 'required|numeric',
            'store' => 'required|numeric'
        ]);

        $name = $request->name;
        $description = $request->description;
        $image = $request->image;
        $price = $request->price;
        $discount = $request->discount;
        $category = $request->category;
        $store = $request->store;

        $this->storeRepo->create($name, $description, $image, $price, $discount, $category, $store);

        return  response()->json([
            'status' => 200,
            'message' => 'La tienda fué agregada de forma correcta',
            'data' => []
        ]);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @return void
     */
    public function update($id, Request $request)
    {
        $data = [
            'name' =>  $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'price' => $request->price,
            'discount' => $request->discount,
            'category' => $request->category,
            'store' => $request->store
        ];

        $this->storeRepo->edit($id, $data);

        return response()->json([
            'status' => 200,
            'message' => 'La tienda fué editada de forma correcta',
            'data' => []
        ]);
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $this->storeRepo->delete($id);
        return response()->json([
            'status' => 200,
            'message' => 'La tienda fué eliminada de forma correcta',
            'data' => []
        ]);
    }
}
