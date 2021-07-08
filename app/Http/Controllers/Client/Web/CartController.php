<?php

namespace App\Http\Controllers\Client\Web;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        return view('front.cart', compact('cart'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'color' => 'required|exists:colors,id',
//            'qty' => 'required|numeric|min:0'
        ]);

        $color = Color::findOrFail($data['color'])->load('size.product');

//        if ($color->qty > $data['qty']) {
//            session()->flash('error', 'Quantité insufisante');
//            return back();
//        }

        $color['qty'] = 1;
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [$color->id => $color];
            session()->put('cart', $cart);
        } else {
            $cart[$color->id] = $color;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart');
    }
}
