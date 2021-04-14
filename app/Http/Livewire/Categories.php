<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $category;
    public $categories;
    public function render()
    {
        if ($this->category){
            $sub_categories =  Category::find($this->category)->children;
        }else{
            $category = Category::orderBy('name')->first();
            if ($category){
                $sub_categories = $category->children;
            }else{
                $sub_categories = [];
            }
        }
        return view('livewire.categories', compact('sub_categories'));
    }
}
