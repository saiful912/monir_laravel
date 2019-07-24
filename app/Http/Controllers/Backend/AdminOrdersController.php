<?php

namespace App\Http\Controllers\Backend;


use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOrdersController extends Controller
{
    //something problem
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }

    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('backend.pages.orders.index', compact('orders'));
    }
    public function show($id)
    {
        $order = Order::find($id);
        return view('backend.pages.orders.show', compact('order'));
    }
}
