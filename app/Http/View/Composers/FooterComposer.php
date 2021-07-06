<?php


namespace App\Http\View\Composers;
use App\Models\Category;
use App\Models\Information;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view)
    {
        $categories = Category::mainCategories()->get();
        $information = Information::first();
        $view->with(['categories' => $categories, 'information' => $information]);
    }
}
