<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (\request()->is('api/sub/categories'))
        {
            $data = Category::subCategories()->orderBy('created_at','desc')->with('parent');
        } else
        {
            $data = Category::mainCategories()->orderBy('created_at','desc')->with('children');
        }
        $categories = $data->get();
        $response = ['categories' => $categories];
        return response($response, 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return Response
     */
    public function show($id)
    {

        try {
            $category = Category::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            $response = ['error' => 'Category not found'];
            return response($response, 404);
        }

        $response = ['category' => $category];
        return response($response, 200);
    }

}
