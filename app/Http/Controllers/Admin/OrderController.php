<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;

class OrderController extends Controller
{
    public function index()
    {
        $orders = app(Pipeline::class)
            ->send(Order::query())
            ->through([
                \App\QueryFilters\Sort::class,
                \App\QueryFilters\OrderSearch::class,
                \App\QueryFilters\State::class,
                \App\QueryFilters\Client::class,
            ])
            ->thenReturn()
            ->orderBy('created_at','desc')
            ->paginate(10)
            ->appends(request()->query());

        return view('admin.orders.index',compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.edit',compact('order'));

    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show',compact('order'));

    }

    public function update($id)
    {
        $data = request()->validate([
            'state' => 'required|string|in:validated,canceled,processing',
            'tracking_link' => 'nullable|sometimes|string|max:250'
        ]);
        $order = Order::findOrFail($id);

        if ($order->state != 'canceled' && $data['state'] == 'canceled'){
            foreach ($order->colors as $color){
                $color->update([
                    'quantity' => $color->quantity + $color->pivot->qte
                ]);
            }
        }

        if ($order->state === 'canceled' && $data['state'] != 'canceled'){
            foreach ($order->colors as $color){
                $color->update([
                    'quantity' => $color->quantity - $color->pivot->qte
                ]);
            }
        }

        $order->update($data);
        session()->flash('success','Order has been updated successfully');
        return redirect()->route('admin.orders.show',$order->id);
    }

    public function printInvoice($id)
    {
        $order = Order::findOrFail($id)->load('colors.size.product', 'user');
        return view('pdf.order_invoice',compact('order'));
    }
}
