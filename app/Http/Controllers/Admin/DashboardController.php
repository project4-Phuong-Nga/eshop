<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function users()
    {
        // $users = User::where('role_as', '0')->get();
        $users = User::all();
        $orders = Order::all();

        return view('admin.users.index', compact('users', 'orders'));
    }

    public function viewuser($id) 
    {
         $users = User::find($id);
         $orders = Order::find($id);

        return view('admin.users.view', compact('users', 'orders'));
    }

   
}
