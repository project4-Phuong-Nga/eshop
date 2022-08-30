<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $item) {
            if (!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_id)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        // check neu k co sp nao thi bao loi
        return view('frontend.checkout', compact('cartitems'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('country');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        
        // to calculate the total price
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id()) -> get();
        foreach($cartitems_total as $prod)
        {
            $total += $prod -> products -> selling_price;
        }
        $order -> total_price = $total;

        $order->tracking_no = 'ecomerce' . rand(1111, 9999);
        $order->save();
        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            $od_item = new OrderItem();
            $od_item->order_id = $order->id;
            $od_item->prod_id = $item->prod_id;
            $od_item->qty = $item->prod_qty;
            $od_item->price = $item->products->selling_price;
            $od_item->save();
            $prod = Product::where('id', $item->prod_id)-> first();
            $prod -> qty = $prod -> qty - $item -> prod_qty;
            $prod -> update();
        }
        $cartitems = Cart::where('user_id', Auth::id()) -> get();
        Cart::destroy($cartitems);

        return redirect('/') -> with('status', "Order placed Successfully");
    }

}
