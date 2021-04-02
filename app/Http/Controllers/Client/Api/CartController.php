<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'colors'       => ['required', 'array'],
            'colors.*.id'     => ['required', 'numeric','gt:0']
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $colors = collect();

        try {
            foreach ($request->colors as $color){
                $colors->add(Color::findOrFail($color['id']));
            }
        } catch (ModelNotFoundException $ex) {
            $response = ['error' => 'Product not found'];
            return response($response, 404);
        }

        return $colors;
    }
}
