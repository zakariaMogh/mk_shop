<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuggestionController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email'             => ['required', 'string', 'email', 'max:255'],
            'subject'          => ['required', 'string', 'max:255'],
            'content'          => ['required', 'string', 'max:2000'],
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $data = $request->all();
        Suggestion::create($data);

        $response = ["message" =>'Suggestion has been made'];
        return response($response, 200);
    }
}
