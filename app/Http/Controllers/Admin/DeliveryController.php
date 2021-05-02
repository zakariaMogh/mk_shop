<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryRequest;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::all();
        return view('admin.settings.deliveries', compact('deliveries'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeliveryRequest $request)
    {
        Delivery::updateOrCreate(
            ['location' => $request->location],
            ['domicile' => $request->domicile, 'bureau' => $request->bureau]
        );
        session()->flash('success','Delivery has been created successfully');

        return redirect()->route('admin.deliveries.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Delivery $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        session()->flash('success','Delivery has been deleted successfully');
        return redirect()->route('admin.deliveries.index');

    }

}
