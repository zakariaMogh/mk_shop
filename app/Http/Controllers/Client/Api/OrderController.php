<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = \request()->user();

        $query = $user->orders();

        $orders = $query->orderBy('created_at', 'desc')->paginate(10);

        $response = ['orders' => $orders];
        return response($response, 200);
    }

    public function show($id){
        $user = \request()->user();

        try {
            $order = $user->orders()->findOrFail($id)->load('colors.size.product');
        } catch (ModelNotFoundException $ex) {
            $response = ['error' => 'Order not found'];
            return response($response, 404);
        }


        $response = ['order' => $order];
        return response($response, 200);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name'                  => 'required|string|max:200',
            'phone'                 => 'required|string|max:10|min:9',
            'address'               => 'required|string|max:200',
            'wilaya'                => 'required|string|max:200',
            'province'              => 'required|string|max:200',
            'shipping'              => 'required|numeric|gt:0',
            'shipping_type'         => 'required|string|in:bureau,domicile',
            'colors'                => 'required|array|min:1',
            'colors.*.id'           => 'required|numeric|gt:0',
            'colors.*.quantity'     => 'required|numeric|gt:0',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $data = $request->all();
        try {
            $shipping = Delivery::findOrFail($request->shipping);
        } catch (ModelNotFoundException $ex) {
            $response = ['error' => 'Delivery not found'];
            return response($response, 404);
        }
        $user = request()->user();

        if ($request->shipping_type == 'domicile'){
            $data['shipping'] = $shipping->domicile;
        }else{
            $data['shipping'] = $shipping->bureau;
        }

        $data['shipping_location'] = $shipping->location;

        $sub_total = 0;
        $cashback_sum = 0;

        foreach ($data['colors'] as $color){
            try {
                $color_product = Color::findOrFail($color['id']);
                $product = $color_product->size->product;
            } catch (ModelNotFoundException $ex) {
                $response = ['error' => 'Product not found'];
                return response($response, 404);
            }
            if ($color['quantity'] > $color_product->quantity){
                $response = ['error' => 'Quantity insuffisante'];
                return response($response, 409);
            }

            $sub_total += $product->price;
            $cashback_sum += ($product->cashback > 0 ? $product->cashback : $product->price);
        }

        $total = $data['shipping'] + ($cashback_sum > 0 ? $cashback_sum : $sub_total);

        $data['cashback_sum'] = $cashback_sum;
        $data['sub_total'] = $sub_total;
        $data['total'] = $total;

        $order = $user->orders()->create($data);
        foreach ($data['colors'] as $color){
            try {
                $color_product = Color::findOrFail($color['id']);
            } catch (ModelNotFoundException $ex) {
                $response = ['error' => 'Product not found'];
                return response($response, 404);
            }
            $order->colors()->attach($color_product->id, ['qte' => $color['quantity']]);
            $color_product->update([
                'quantity' => $color_product->quantity - $color['quantity']
            ]);
        }
        $response = ["message" =>'Order has been made'];
        return response($response, 200);
    }
}
