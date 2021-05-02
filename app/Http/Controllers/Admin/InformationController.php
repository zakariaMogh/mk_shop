<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationRequest;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param Information $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        return view('admin.information.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InformationRequest $request
     * @param Information $information
     * @return \Illuminate\Http\Response
     */
    public function update(InformationRequest $request, Information $information)
    {
        $data = $request->except('logo');
        if ($request->hasFile('logo'))
        {
            $path = $request->file('logo')->store('logo');
            $data['logo'] = $path;
        }
        $information->update($data);
        session()->flash('success', 'Information has been updated');
        return back();
    }

}
