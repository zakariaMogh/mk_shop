<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SocialUserResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function register (Request $request) {
        $validator = Validator::make($request->all(), [
            'phone_1'           => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            'username'          => ['required', 'string', 'max:255','unique:users,username'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => ['nullable', 'sometimes', 'string', 'min:8', 'confirmed', 'max:100'],
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $request['password']=Hash::make($request['password']);
//        $request['remember_token'] = Str::random(10);
        $user = User::create($request->all());
        $token = $user->createToken('Print_pic_client_token')->accessToken;
        $response = ['token' => $token];
        return response($response, 200);
    }


    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Mk shop client token')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 205);
            }
        } else {
            $response = ["message" =>'User does not exist'];
            return response($response, 205);
        }
    }


    public function loginSocial (Request $request) {
        $validator = Validator::make($request->all(), [
            'provider' => 'required|string|in:facebook,google',
            'access_token' => 'required',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $user = (new SocialUserResolver())->resolveUserByProviderCredentials($request->provider, $request->access_token);
        if ($user){
            $token = $user->createToken('Mk shop client token')->accessToken;
            $response = ['token' => $token];
            return response($response, 200);
        }
        return response(["message" =>'Oops something went wrong'], 422);
    }
}
