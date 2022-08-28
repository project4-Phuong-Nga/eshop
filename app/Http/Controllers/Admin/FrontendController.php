<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $users = User::where('role_as', '0')->count();
        $orders = Order::where('status', 'pending')->count();
        $categories = Category::count();
        $products = Product::count();

        $orderData = Order::select(DB::raw("COUNT(*) as count"))
        -> whereYear("created_at", date('Y'))
        -> groupBy(DB::raw("Month(created_at)"))
        -> pluck('count');


        $get_products = Product::all() ;

        return view('admin.index', compact('users', 'orders','categories', 'products', 'orderData', 'get_products'));
    }
}
