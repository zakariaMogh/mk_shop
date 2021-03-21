<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        return request()->user();
    }

    public function update(Request $request){
        $user = $request->user();
        $data = $request->except('email');
        $user->update($data);
        return response(['success' => 'user has been updated'], 200);
    }
}
