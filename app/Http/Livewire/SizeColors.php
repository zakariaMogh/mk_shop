<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SizeColors extends Component
{
    public $quantity, $color;
    public $inputs;
    public $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function mount()
    {
//        if (isset($this->product->product_details)){
//            $this->inputs = [];
//            $this->color = [];
//            $this->quantity = [];
//            foreach ($this->product->product_details as $key => $product_detail){
//                array_push($this->quantity ,$product_detail->quantity);
//                array_push($this->color ,$product_detail->color);
//                array_push($this->inputs ,$key);
//            }
//        }else{
//            $this->inputs = [1];
//        }
        $this->inputs = [1];
    }
    public function render()
    {
        return view('livewire.size-colors');
    }
}
