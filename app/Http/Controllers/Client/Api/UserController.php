<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function show(){
        return request()->user();
    }

    public function update(Request $request){
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'phone_1'    => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            'username'   => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($user)],
            'email'      => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user)],
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $data = $request->except('password');
        $user->update($data);
        return response(['success' => 'user has been updated'], 200);
    }

    public function updatePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password'          => ['required', 'string', 'min:8'],
            'new_password'      => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $user = $request->user();

        if (!Hash::check($request->password, $user->password)){
            return response(['error' => 'Password incorrect'], 422);
        }

        $user->update([
            'password' => bcrypt($request->new_password)
        ]);

        return response(['success' => 'Password has been updated'], 200);
    }
}
