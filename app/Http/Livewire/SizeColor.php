<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SizeColor extends Component
{
    public $product;
    public $colors;
    public $color;
    public $size_id;

    public function chooseSize($id)
    {
        $this->size_id = $id;
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

    public function chooseColor($id)
    {
        $this->color = $id;
    }

    public function mount()
    {
        $size = $this->product->sizes->first();
        if ($size)
        {
            $this->size_id = $size->id;
            $this->colors = $size->colors;
        }else{
            $this->colors = collect();
        }
    }

    public function render()
    {
        return view('livewire.size-color');
    }
}
