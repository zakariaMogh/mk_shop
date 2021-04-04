<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $banners = Banner::all();
        $response = ['banners' => $banners];
        return response($response, 200);
    }
}
