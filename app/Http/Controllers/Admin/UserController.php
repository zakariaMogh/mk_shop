<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $query = User::query();
        if (\request()->has('q') && !empty(\request()->get('q'))){
            $query->where('username','like','%'.\request('q').'%')
                ->orWhere('phone_1','like','%'.\request('q').'%')
                ->orWhere('email','like','%'.\request('q').'%');
        }
        $users = $query->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

}
