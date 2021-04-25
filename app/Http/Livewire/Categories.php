<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $category;
    public $categories;
    public $product;

    public function mount()
    {
        $this->category = $this->product->category->first()->id ?? old('categories.0');
    }

    public function render()
    {
        if ($this->category){
            $sub_categories =  Category::find($this->category)->children;
        }else{
            $category_current = Category::orderBy('name')->first();
            if ($category_current){
                $sub_categories = $category_current->children;
            }else{
                $sub_categories = [];
            }
        }
        return view('livewire.categories', compact('sub_categories'));
    }
}
