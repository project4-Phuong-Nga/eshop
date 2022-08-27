<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {   
        $product = DB::table('products')->count();
        $categorie = DB::table('categories')->count();
        $order = Order::where('status', 'pending')->count();
        $total = DB::table('order_items')->sum('price');
        $productsell = DB::select('SELECT order_items.prod_id, products.*, Sum(order_items.qty) FROM order_items INNER JOIN products ON products.id = order_items.prod_id
         GROUP BY order_items.prod_id ORDER BY Sum(order_items.qty) DESC LIMIT 5');
        

        $post = DB::select('SELECT DATE(created_at) as ngay, SUM(price) AS tongtien FROM order_items 
        WHERE ( created_at >= DATE_ADD(NOW(), INTERVAL -30 DAY))
            GROUP BY DATE(created_at)');
// dd($productsell);
        return view('admin.index')
        ->with('product', $product)
        ->with('categorie', $categorie)
        ->with('order', $order)
        ->with('total', $total)
        ->with('productsell', $productsell)
        ->with('data', $post); 
    }
}
