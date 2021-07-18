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
        $categories = Category::mainCategories()->get();

        if (\request()->has('trending') && \request()->get('trending') == 1)
        {
            $query = Product::with('categories')->withCount('reviews');
            $products = $query->orderByDesc('reviews_count')->get();
            return view('front.shop', compact('products', 'categories'));
        }

        if (\request()->has('q') && !empty(\request()->get('q')))
        {
            $query->where('name', 'like', '%' . \request('q') . '%');
        }

        if (\request()->has('category') && !empty(\request()->get('category')))
        {
            $query->whereHas('categories', function ($q)
            {
                $q->where('slug', \request()->get('category'));
            });
        }

        if (\request()->has('promotion') && \request()->get('promotion') == 1)
        {
            $query->where('cashback', '>', 0 );
        }


        $products = $query->orderByDesc('created_at')->paginate(24);

        return view('front.shop', compact('products', 'categories'));
    }
}
