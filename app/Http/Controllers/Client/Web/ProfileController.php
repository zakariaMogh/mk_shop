<?php

namespace App\Http\Controllers\Client\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('front.profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'username'   => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($user)],
            'email'      => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user)],
            'password'      => 'sometimes|nullable|confirmed|min:6|string|max:200',
            'old_password'      => 'required|min:6|string|max:200',
        ]);

        if (!Hash::check($data['old_password'], auth()->user()->getAuthPassword()))
        {
            session()->flash('error', 'Ancien mot de pass incorrect');
            return back();
        }

        if (isset($data['password']))
        {
            $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }

        $user->update($data);
        session()->flash('success', 'mise a jour effectuee avec succes');
        return back();
    }
}
