<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
///->withSum('sizes', 'size_quantity');
    public function index(): View
    {
        $query = Product::with(['categories', 'images', 'sizes']);
        if (\request()->has('state') && in_array(request('state'),['active','inactive','qte'])){

            $state = \request()->get('state');
            switch ($state){
                case $state === 'active': $query->whereHas( 'sizes', function($q){
                    $q->whereHas('colors', function ($q){
                        $q->where('quantity', '>', '0');
                    });
                }); break;
                case $state === 'inactive': $query->whereHas( 'sizes', function($q){
                    $q->whereHas('colors', function ($q){
                        $q->where('quantity', '<=', '0');
                    });
                }); break;
//                case $state === 'qte': $query->orderBy('qte','asc');break;
            }
        }

        if (\request()->has('q') && !empty(\request()->get('q'))){
            $query->where('name','like','%'.\request('q').'%');
        }
        $products = $query->paginate(20);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $product = new Product();
        $parentCategories = Category::where('parent_id',null)->get();
        $categories = Category::where('parent_id','!=',null)->with('children')->get();
        return view('admin.products.create',compact('product','categories','parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->except(['_token','images[]','categories']);
        if ($request->hasFile('images'))
        {
            $p = Product::create($data);
            $p->categories()->attach($request->get('categories'));

            foreach ($request->file('images') as $image) {
                $path = $image->store('product');
                $p->images()->create(['image' => $path]);
            }

            foreach($request->sizes as $key => $value){
                $size = $p->sizes()->create([
                    'size' => $request->sizes[$key],
                ]);
                foreach ($request->colors[$key] as $color_key => $color_value){
                    $size->colors()->create([
                        'color' => ltrim($request->colors[$key][$color_key], '#'),
                        'quantity' => $request->quantities[$key][$color_key]
                    ]);
                }
            }
        }else{
            session()->flash('error','Something wen wrong');
            return redirect()->back();
        }
        //cache()->forget('wishlistCache');

        session()->flash('success','Product has been created successfully');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product): View
    {
        $product->load('categories');
        return  view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product): View
    {
        $product->load(['categories', 'sizes' => function($query){
            $query->orderBy('size');
        }]);
        $parentCategories = Category::where('parent_id',null)->get();
        $categories = Category::where('parent_id','!=',null)->with('children')->get();
        return view('admin.products.edit',compact('product','categories','parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return Response
     * @throws \Exception
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->except(['_method','_token','image','admin','categories']);
        if ($request->hasFile('images'))
        {
            foreach($product->images as $img){
                Storage::delete($img->image);
                $img->delete();
            }
            foreach ($request->file('images') as $image) {
                $path = $image->store('product');
                $product->images()->create(['image' => $path]);
            }
        }
        foreach ($product->sizes as $size){
            $size->colors()->delete();
        }
        $product->sizes()->delete();

        foreach($request->sizes as $key => $value){
            $size = $product->sizes()->create([
                'size' => $request->sizes[$key],
            ]);
            foreach ($request->colors[$key] as $color_key => $color_value){
                $size->colors()->create([
                    'color' => ltrim($request->colors[$key][$color_key], '#'),
                    'quantity' => $request->quantities[$key][$color_key]
                ]);
            }
        }

        $product->update($data);
        $product->categories()->sync($request->get('categories'));
        session()->flash('success','Product has been updated successfully');
        //cache()->forget('wishlistCache');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return void
     */
    public function destroy(Product $product)
    {
        try {
            foreach ($product->images as $image) {
                Storage::delete($image->image);
                $image->delete();
            }
            foreach ($product->product_details as $product_detail) {
                $product_detail->delete();
            }
            $product->delete();
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong');
            return redirect()->route('admin.products.index');
        }
        session()->flash('success', 'Product deleted successfully');
        return redirect()->route('admin.products.index');
    }
}
