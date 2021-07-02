<?php

namespace App\Http\Controllers\Client\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $trending_products = Product::withCount('reviews')
            ->take(6)
            ->orderByDesc('reviews_count')
            ->get();

        $latest_products = Product::latest()->take(6)->get();

        $discount_products = Product::where('cashback', '>', 0 )->take(6)->get();

        $categories = Category::mainCategories()->with('children')->get();

        $banners = Banner::inRandomOrder()->take(4)->get();

        return view('front.home', compact('categories', 'trending_products', 'latest_products', 'discount_products', 'banners'));
    }
}
