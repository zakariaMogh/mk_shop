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
        $query = Product::with(['categories']);

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
            $product = Product::findOrFail($id)->load(['categories', 'images', 'sizes']);
        } catch (ModelNotFoundException $ex) {
            $response = ['error' => 'Product not found'];
            return response($response, 404);
        }

        $response = ['product' => $product];
        return response($response, 200);
    }

}
