<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SizeColors extends Component
{
    public $quantity, $color;
    public $color_inputs;
    public $j = 1;
    public $sizeId;
    public $size;

    public function add_color($j)
    {
        $j = $j + 1;
        $this->j = $j;
        array_push($this->color_inputs ,$j);
    }
    public function remove($j)
    {
        unset($this->color_inputs[$j]);
    }

    public function mount()
    {
        if (isset($this->size) && !empty($this->size->colors->toArray())){
            $this->color_inputs = [];
            $this->color = [];
            $this->quantity = [];
            foreach ($this->size->colors as $color_key => $color){
                array_push($this->quantity ,$color->quantity);
                array_push($this->color ,$color->color);
                array_push($this->color_inputs ,$color_key);
            }
        }else{
            $this->color_inputs = [1];
        }

    }
    public function render()
    {
        return view('livewire.size-colors');
    }
}
