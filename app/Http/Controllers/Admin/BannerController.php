<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $banners = Banner::paginate(20);
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banner = new Banner();
        return view('admin.banners.create', compact('banner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request): RedirectResponse
    {
        $data = $request->except(['_token', 'image']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->store('banner');
            $data['image'] = $image;
        }

        Banner::create($data);
        session()->flash('success', 'Banner has been created successfully');
        return redirect()->route('admin.banners.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BannerRequest $request
     * @param Banner $banner
     * @return RedirectResponse
     */
    public function update(BannerRequest $request, Banner $banner): RedirectResponse
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            if (isset($banner->image)) {
                Storage::delete($banner->image);
            }
            $file = $request->file('image');
            $data['image'] = $file->store('banner');
        }

        $banner->update($data);
        session()->flash('success', 'Banner has been updated successfully');
        return redirect()->route('admin.banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Banner $banner
     * @return RedirectResponse
     */
    public function destroy(Banner $banner): RedirectResponse
    {
        try {
            if (isset($banner->image)) {
                Storage::delete($banner->image);
            }
            $banner->delete();
            session()->flash('success', 'Banner has been deleted successfully');
            return redirect()->route('admin.banners.index');

        } catch (\Exception $exception) {
            session()->flash('error', 'Oops! Something went wrong');
            return redirect()->back();
        }

    }
}
