<?php

namespace App\Http\Controllers\Client\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $query = Product::query();

        if (\request()->has('q') && !empty(\request()->get('q')))
        {
            $query->where('name', 'like', '%' . \request('q') . '%');
        }
        $products = $query->orderByDesc('created_at')->get();
        $categories = Category::mainCategories()->get();
        return view('front.shop', compact('products', 'categories'));
    }
}
