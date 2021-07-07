<?php

namespace App\Http\Controllers\Client\Web;

use App\Http\Controllers\Controller;
use App\Mail\OrderMailClient;
use App\Models\Color;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::all();
        return view('front.checkout', compact('deliveries'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'              => 'required|string|max:200',
            'phone'             => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'address'           => 'required|string|max:200',
            'province'          => 'required|string|max:200',
            'delivery'          => 'required|exists:deliveries,id',
            'type'              => 'required|in:domicile,bureau',
        ]);

        $shipping = Delivery::findOrFail($data['delivery']);

        if ($data['type'] == 'domicile'){
            $data['shipping'] = $shipping->domicile;
        }else{
            $data['shipping'] = $shipping->bureau;
        }

        $data['wilaya'] = $shipping->location;

        $data['shipping_location'] = $shipping->location;

        $cart = session()->get('cart');

        if (!isset($cart) || empty($cart))
        {
            session()->flash('error', 'Votre panier est vide');
            return redirect()->route('cart');
        }

        $sub_total = 0;
        $cashback_sum = 0;

        foreach ($cart as $color){
            $color_product = Color::findOrFail($color['id']);
            $product = $color_product->size->product;

            if ($color['qty'] > $color_product->quantity){
                session()->flash('error', 'Quantité inssufisante');
                return back()->withInput();
            }

            $sub_total += $product->price * $color['qty'];
            $cashback_sum += $product->current_price * $color['qty'];
        }
        $total = $data['shipping'] + $cashback_sum;

        $data['cashback_sum'] = $cashback_sum;
        $data['sub_total'] = $sub_total;
        $data['total'] = $total;

        $order = auth()->user()->orders()->create($data);

        foreach ($cart as $color){
            $color_product = Color::findOrFail($color['id']);
            $order->colors()->attach($color_product->id, ['qte' => $color['qty']]);
            $color_product->update([
                'quantity' => $color_product->quantity - $color['qty']
            ]);
        }

        dispatch(function () use ($order) {
            try {
                Mail::to(auth()->user()->email)->send(new OrderMailClient(['subject' => 'Vous avez une nouvelle commande', 'id' => $order->id, 'client' => auth()->user()->username]));
            } catch (\Exception $exception) {

            }
        })->afterResponse();

        session()->put('cart', []);

        session()->flash('success', 'Order has been made');
        return back();
    }
}
