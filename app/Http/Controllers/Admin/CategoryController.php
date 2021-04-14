<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {

        if (\request()->is('admin/sub/categories'))
        {
            $data = Category::subCategories()->orderBy('created_at','desc')->with('parent');
        } else
        {
            $data = Category::mainCategories()->orderBy('created_at','desc');
        }

        if (\request()->has('q') && !empty(\request()->get('q')))
        {
            $data->where('name','like','%'.\request('q').'%');
        }

        $categories = $data->paginate(20);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        if (\request()->is('admin/sub/categories*')){
            $parent = Category::mainCategories()->orderBy('name')->get();
            return view('admin.categories.create',compact('category','parent'));
        }
        return view('admin.categories.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $data = $request->except(['_token','image']);
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $image = $file->store('category');
            $data['image'] = $image;
        }
        $data['slug'] = Str::slug($data['name']);

        Category::create($data);
        session()->flash('success','Category has been created successfully');
        //cache()->forget('mainCategoriesCache');
        return Str::contains(url()->previous(),'sub') ?
            redirect()->route('admin.categories.sub.index') :
            redirect()->route('admin.categories.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (\request()->is('admin/sub/categories*')){
            $parent = Category::mainCategories()->orderBy('name')->get();
            return view('admin.categories.edit',compact('category','parent'));
        }
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $data = $request->all();
        if ($request->hasFile('image'))
        {
            if (isset($category->image))
            {
                Storage::delete($category->image);
            }
            $file = $request->file('image');
            $data['image'] = $file->store('category');
        }

        $data['slug'] = Str::slug($data['name']);
        $category->update($data);
        //cache()->forget('mainCategoriesCache');

        session()->flash('success','Category has been updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category): RedirectResponse
    {
        try {
            if (isset($category->image)){
                Storage::delete($category->image);
            }
            $category->deleteCategoryFile($category->children);
            $category->delete();
            session()->flash('success','Category has been deleted successfully');
            //cache()->forget('mainCategoriesCache');
            return Str::contains(url()->previous(),'sub') ?
                redirect()->route('admin.categories.sub.index') :
                redirect()->route('admin.categories.index');
        }catch (\Exception $exception)
        {
            session()->flash('error','Oops! Something went wrong');
            return redirect()->back();
        }

    }
}
