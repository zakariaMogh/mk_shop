<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index(){
        $query = Suggestion::query();
        $suggestions = $query->orderByDesc('created_at')->paginate(20);
        return view('admin.suggestions.index', compact('suggestions'));
    }

    /**
     * @param Suggestion $suggestion
     * @return \Illuminate\Contracts\View\View
     * @throws \Exception
     */
    public function destroy(Suggestion $suggestion){
        $suggestion->delete();
        session()->flash('success', 'Suggestion deleted successfully');
        return redirect()->route('admin.suggestions.index');
    }
}
