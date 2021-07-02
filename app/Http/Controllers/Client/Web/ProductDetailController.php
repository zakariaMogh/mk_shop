<?php

namespace App\Http\Controllers\Client\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{

    public function show($id)
    {
        $product = Product::findOrFail($id)->load('images', 'reviews', 'sizes.colors');

        return view('front.product-details', compact('product'));
    }
}
