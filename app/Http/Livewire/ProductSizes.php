<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductSizes extends Component
{
    public $size;
    public $inputs;
    public $i = 1;
    public $product;
    public $sizes;

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
        $this->sizes = old('sizes');

        if (!empty($this->product->sizes->toArray())){
            $this->inputs = [];
            $this->size = [];
            foreach ($this->product->sizes as $key => $size){
                array_push($this->size ,$size->size);
                array_push($this->inputs ,$key);
            }

        }elseif(!empty($this->sizes)){
            $this->inputs = [];
            $this->size = [];
            foreach ($this->sizes as $key => $size){
                array_push($this->size ,$size);
                array_push($this->inputs ,$key);
            }
        }else{
            $this->inputs = [1];
        }

//
//        if (empty($this->product->sizes->toArray()) && !empty($this->sizes)){
//
//            $this->inputs = [];
//            $this->size = [];
//            foreach ($this->sizes as $key => $size){
//                array_push($this->size ,$size);
//                array_push($this->inputs ,$key);
//            }
//
//        }else{
//            $this->inputs = [1];
//        }
    }
    public function render()
    {
        return view('livewire.product-sizes');
    }
}
