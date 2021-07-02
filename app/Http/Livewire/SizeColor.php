<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SizeColor extends Component
{
    public $product;
    public $colors;

    public function chooseSize($id)
    {
        $size = $this->product->sizes->filter(function($item) use ($id) {
            return $item->id == $id;
        })->first();

        if ($size)
        {
            $this->colors = $size->colors;
        }else{
            $this->colors = collect();
        }

    }

    public function mount()
    {
        $this->colors = collect();
    }

    public function render()
    {
        return view('livewire.size-color');
    }
}
