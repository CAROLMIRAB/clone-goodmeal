<?php

namespace App\Http\Controllers;

use App\Repositories\StoreRepo;
use App\Http\Requests\StoreRequest;
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
    public function add(StoreRequest $request)
    {
        $name = $request->name;
        $address = $request->address;
        $lat = $request->lat;
        $long = $request->long;
        $delivery = $request->delivery;
        $schedule = $request->schedule;

        $this->storeRepo->create($name, $address, $lat, $long, $delivery, json_encode($schedule));

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
            'address' => $request->address,
            'lat' => $request->lat,
            'long' => $request->long,
            'delivery' => $request->delivery,
            'schedule' => $request->schedule
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
