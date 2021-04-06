<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        if (\request()->has('trending') && \request()->get('trending') == 'true')
        {
//            $query = Product::whereHas('sizes', function($query){
//                $query->whereHas('colors', function($query){
//                    $query->withCount('orders')->orderBy('orders_count');
//                });
//        });
            $query = Product::with('categories')->withCount('reviews');
            $products = $query->take(10)->orderByDesc('reviews_count')->get();

            $response = ['products' => $products];
            return response($response, 200);
        }
        $query = Product::with(['categories']);

        if (\request()->has('promotion') && \request()->get('promotion') == 'true')
        {
            $query->where('cashback', '>', 0 );
        }

        if (\request()->has('q') && !empty(\request()->get('q')))
        {
            $query->where('name', 'like', '%' . \request('q') . '%');
        }

        if (\request()->has('category') && !empty(\request()->get('category')))
        {
            $query->whereHas('categories', function ($query) {
                $query->where('slug', \request('category'));
            });
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(20);

        $response = ['products' => $products];
        return response($response, 200);
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $product = Product::findOrFail($id)->load(['categories', 'images', 'sizes.colors'])->load(['reviews' => function($reviews){
                $reviews->inRandomOrder()->take(5);
            }]);
        } catch (ModelNotFoundException $ex) {
            $response = ['error' => 'Product not found'];
            return response($response, 404);
        }

        $product->append('note');

        $response = ['product' => $product];
        return response($response, 200);
    }

}
