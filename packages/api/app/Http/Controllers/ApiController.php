<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{

    /**
     * URL BACKEND
     *
     * @var string
     */
    private $url = "172.20.0.11";


    public function __construct($url)
    {
        $this->url = $url;
    }


    public function create()
    {
    }

    public function read()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
