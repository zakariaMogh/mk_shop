<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $cart = [];
    public $total;
    public $quantities;
    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id]))
        {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);
        $this->cart = $cart;

    }

    public function mount()
    {
        foreach ($this->cart as $color)
        {
            $this->quantities[$color->id] = $color->qty;
        }
    }

    public function updatedQuantities()
    {
        $cart = session()->get('cart');
        foreach ($this->quantities as $key => $qty)
        {
            $cart[$key]->qty = $qty;
        }

        session()->put('cart', $cart);
        $this->cart = $cart;
    }

    public function render()
    {
        $this->cart = session()->get('cart');
        isset($this->cart) ? null : $this->cart = [];
        $this->total = 0;
        foreach ($this->cart as $color)
        {
            $this->total += $color->size->product->current_price * $color->qty;
        }
        return view('livewire.cart');
    }
}
