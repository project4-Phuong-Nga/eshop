<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {   
        $product = DB::table('products')->count();
        $categorie = DB::table('categories')->count();
        $order = DB::table('orders')->count();

        return view('admin.index')
        ->with('product', $product)
        ->with('categorie', $categorie)
        ->with('order', $order);
    }
}
