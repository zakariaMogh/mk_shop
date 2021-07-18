<?php

namespace App\Http\Controllers\Client\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $query = Order::where('user_id', auth()->id());

        if (\request()->has('state') && in_array(\request()->get('state'), ['validated', 'canceled', 'processing', 'pending']))
        {
            switch (\request()->get('state')){
                case('validated'):
                    $query->where('state', 'validated');
                    break;
                case('canceled'):
                    $query->where('state', 'canceled');
                    break;
                case('processing'):
                    $query->where('state', 'processing');
                    break;
                case('pending'):
                    $query->where('state', 'pending');
                    break;
            }

        }

        $orders = $query->paginate(9);
        return view('front.orders', compact('orders'));
    }
}
