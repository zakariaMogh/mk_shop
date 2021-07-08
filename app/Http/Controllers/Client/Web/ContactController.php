<?php

namespace App\Http\Controllers\Client\Web;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $information = Information::first();
        return view('front.contact', compact('information'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email'             => ['required', 'string', 'email', 'max:255'],
            'subject'          => ['required', 'string', 'max:255'],
            'content'          => ['required', 'string', 'max:2000'],
        ]);

        Suggestion::create($data);

        session()->flash('success', 'Opération effectuée avec succès');
        return back();
    }
}
