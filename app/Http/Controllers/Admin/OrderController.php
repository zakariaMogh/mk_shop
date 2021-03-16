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
            'state' => 'required|string|in:validated,canceled,processing'
        ]);
        $order = Order::findOrFail($id);
        if ($data['state'] === 'processing' && in_array($order->state,['validated','canceled','processing'])  )
        {
            session()->flash('error','You can\'t return to processing state');
            return  redirect()->back();
        }

        // validate order

        if ($data['state'] === 'validated' && $order->state !== 'validated')
        {
            $order->user->cash += $order->cashback_sum;
            ++$order->user->transactions;
            if ($order->state === 'canceled')
            {
                $order->products->each(static function ($p){
                    if ($p->pivot->qte < $p->qte){
                        $p->qte -= $p->pivot->qte;
                    }else{
                        $p->qte = 0;
                    }
                    $p->save();
                });

                if ($order->paymentmethod === 'card')
                {
                    $order->user->cash -= $order->points;
                }
            }
            $order->user->save();
        }

        // canceled the order

        if ($data['state'] === 'canceled' && $order->state !== 'canceled'){
            // remove products cash back from the user cash
            if ($order->state === 'validated')
            {
                --$order->user->transactions;
                $order->user->cash -= $order->cashback_sum;
            }
            // update the product qte
            $order->products->each(function ($p){
                $p->qte += $p->pivot->qte;
                $p->save();
            });

            // if user use points for discount , add the points to cash of user
            if ($order->paymentmethod === 'card')
            {
                $order->user->cash += $order->points;
            }
            $order->user->save();
        }

        $order->update($data);
        session()->flash('success','Order has been updated successfully');
        return redirect()->route('admin.orders.show',$order->id);
    }

    public function printInvoice($id)
    {
        $order = Order::findOrFail($id);
        return view('page.order.print_invoice',compact('order'));
    }
}
