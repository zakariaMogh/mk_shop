<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate(['email' => 'required|email']);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );


        return $status === Password::RESET_LINK_SENT
            ? response(['success' => __($status)], 200)
            : response(['error' => __($status)], 404);
    }

    public function codeConfirmation(Request $request){
        $validator = Validator::make($request->all(), [
            'code' => 'required|numeric|min:10000|max:99999',
            'email' => 'required|email'
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        try {
            $reset = PasswordResetCode::where('email', $request->email)
                ->where('code', $request->code)
                ->where('created_at', '>', Carbon::now()->subMinutes(30))
                ->whereNull('token')
                ->firstOrFail();
        } catch (ModelNotFoundException $ex) {
            $response = ['error' => 'Code invalid'];
            return response($response, 401);
        }

        $token = md5(rand(1, 10) . microtime());
        $reset->update([
            'token' => $token
        ]);

        $response = ['token' => $token];
        return response($response, 200);

    }

    public function resetPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'token' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        try {
            $reset = PasswordResetCode::where('email', $request->email)
                ->where('token', $request->token)
                ->where('created_at', '>', Carbon::now()->subMinutes(30))
                ->firstOrFail();
        } catch (ModelNotFoundException $ex) {
            $response = ['error' => 'Token invalid'];
            return response($response, 401);
        }

        try {
            $user = User::where('email', $request->email)->firstOrFail();
        } catch (ModelNotFoundException $ex) {
            $response = ['error' => 'User not found'];
            return response($response, 401);
        }

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        $reset->delete();

        $response = ['success' => 'Password has been successfully updated'];
        return response($response, 200);
    }
}
