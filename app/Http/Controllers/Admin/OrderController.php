<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '0')->get();
        $cartitems = Cart::all();
        return view('admin.orders.index', compact('orders', 'cartitems'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id) -> first();
        $cartitems = Cart::all();

        return view('admin.orders.view', compact('cartitems','orders'));
    }

    public function updateorder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders -> status = $request -> input('order_status');
        $orders -> update();
        return redirect('orders') -> with('status', "Order Updated Successfully");
    }

    public function orderhistory()
    {
        $orders = Order::where('status', '1')->get();
        $cartitems = Cart::all();
        return view('admin.orders.history', compact('orders', 'cartitems'));
    }
    public function destroy($id){
        $orders = Order::find($id);
        $orders->status = 1;
        $orders->update();
        return redirect('orders') -> with('status', "Cancel Successfully");
    }
}
