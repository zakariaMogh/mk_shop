<?php

namespace App\Http\Controllers\Client\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.contact');
    }
}
