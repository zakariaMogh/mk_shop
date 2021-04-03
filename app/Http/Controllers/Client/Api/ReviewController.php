<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'product'       => ['required', 'numeric','gt:0'],
            'rate'          => ['required', 'numeric', 'min:0', 'max:5'],
            'comment'       => ['required', 'string', 'max:600'],
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        try {
            $product = Product::findOrFail($request->product);
        } catch (ModelNotFoundException $ex) {
            $response = ['error' => 'Product not found'];
            return response($response, 404);
        }

        $data = $request->except('product');

        $user = $request->user();

        if($user->reviews->contains($product->id)){
            $user->reviews()->detach();
        }
        $user->reviews()->attach($product->id, $data);

        $response = ['success' => 'Product has been rated'];
        return response($response, 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $user = \request()->user();

        try {
            $product = $user->reviews()->findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            $response = ['Not found' => 'This product doesn\'t have a review'];
            return response($response, 201);
        }

        $review = $product->pivot;
        $response = ['review' => $review];
        return response($response, 200);
    }
}
