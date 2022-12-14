<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id()) -> get();
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.orders.index', compact('orders', 'cartitems'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id) -> where('user_id', Auth::id()) -> first();
        $cartitems = OrderItem::where('order_id', $id)->get();
        return view('frontend.orders.view', compact('orders', 'cartitems'));
    }

    public function destroy(Request $request, $id) 
    {
        $orders = Order::find($id);
        $orders -> status = 4;
        $orders -> update();
        return redirect() -> back() -> with('status', "Order Cancel Successfully");
    }
}
