<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Validator;


class ProductController extends Controller
{

    private $productRepo;

    /**
     * __construct
     *
     * @param  mixed $productRepo
     * @return void
     */
    public function __construct(ProductRepo $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        $store = $request->store;
        $products = $this->productRepo->getAll($store);
        return  response()->json([
            'status' => 200,
            'message' => 'Todos los productos',
            'data' => $products
        ]);
    }

    /**
     * add
     *
     * @param  mixed $request
     * @return void
     */
    public function add(ProductRequest $request)
    {
        $name = $request->name;
        $description = $request->description;
        $image = $request->image;
        $price = $request->price;
        $discount = $request->discount;
        $category = $request->category;
        $store = $request->store;

        $this->productRepo->create($name, $description, $image, $price, $discount, $category, $store);

        return  response()->json([
            'status' => 200,
            'message' => 'El producto fué agregado de forma correcta',
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
        $id = $request->id;
        $data = [
            'name' =>  $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'price' => $request->price,
            'discount' => $request->discount,
            'category' => $request->category,
            'store' => $request->store
        ];

        $this->productRepo->edit($id, $data);

        return response()->json([
            'status' => 200,
            'message' => 'El producto fué editado de forma correcta',
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
        $this->productRepo->delete($id);
        return response()->json([
            'status' => 200,
            'message' => 'El producto fué eliminado de forma correcta',
            'data' => []
        ]);
    }
}
