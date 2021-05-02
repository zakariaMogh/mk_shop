<?php


namespace App\Http\View\Composers;
use App\Models\Information;
use Illuminate\View\View;

class SideBarComposer
{
    public function compose(View $view)
    {
        $information = Information::first()->id ?? 1;
        $view->with('information', $information);
    }
}
