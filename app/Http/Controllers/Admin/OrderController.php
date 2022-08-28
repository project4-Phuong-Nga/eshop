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
        $orders = Order::where('status', '0') -> orwhere('status', '1') -> orwhere('status', '2') ->get();
        $cartitems = Cart::all();
        return view('admin.orders.index', compact('orders', 'cartitems'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id) -> first();
        $cartitems = Cart::all();

        return view('admin.orders.view', compact('cartitems','orders'));
    }

    public function add()
    {
        $orders = Order::all();
        return view('admin.orders.add', compact('orders'));
    }

    public function insert(Request $request)
    {
        $orders = new Order();
        $orders -> fname = $request -> input('fname');
        $orders -> lname = $request -> input('lname');
        $orders -> email = $request -> input('email');
        $orders -> phone = $request -> input('phone');
        $orders -> address1 = $request -> input('address1');
        $orders -> address2 = $request -> input('address2');
        $orders -> city = $request -> input('city');
        $orders -> state = $request -> input('state');
        $orders -> country = $request -> input('country');
        $orders -> pincode = $request -> input('pincode');
        $orders -> status = $request -> input('status');
        $orders -> message = $request -> input('message');
        $orders -> tracking_no = $request -> input('tracking_no');
        $orders->save();

        return redirect('/dashboard') -> with('status', "Order placed Successfully");

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
        $orders = Order::where('status', '3')->get();
        $cartitems = Cart::all();
        return view('admin.orders.history', compact('orders', 'cartitems'));
    }

    public function ordercanceled()
    {
        $orders = Order::where('status', '4')->get();
        $cartitems = Cart::all();
        return view('admin.orders.canceled', compact('orders', 'cartitems'));
    public function destroy($id){
        $orders = Order::find($id);
        $orders->status = 1;
        $orders->update();
        return redirect('orders') -> with('status', "Cancel Successfully");
    }
}
