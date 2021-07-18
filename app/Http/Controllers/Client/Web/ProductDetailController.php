<?php

namespace App\Http\Controllers\Client\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{

    public function show($id)
    {
        $product = Product::findOrFail($id)->load('images', 'reviews', 'sizes.colors');

        return view('front.product-details', compact('product'));
    }

    public function storeReview(Request $request)
    {
        $data = $request->validate([
            'product'       => ['required', 'exists:products,id'],
            'rate'          => ['required', 'numeric', 'min:0', 'max:5'],
            'comment'       => ['required', 'string', 'max:600'],
        ]);



        $product = Product::findOrFail($request->product);

        $data = $request->except('product');

        if (!isset($data['rate']))
        {
            $data['rate'] = 3;
        }
        $user = auth()->user();

        if($user->reviews->contains($product->id)){
            $user->reviews()->detach();
        }
        $user->reviews()->attach($product->id, $data);

        return back();
    }
}
