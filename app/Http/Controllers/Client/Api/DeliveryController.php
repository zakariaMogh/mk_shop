<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $deliveries = Delivery::orderBy('location')->get();
        $response = ['deliveries' => $deliveries];
        return response($response, 200);
    }
}
