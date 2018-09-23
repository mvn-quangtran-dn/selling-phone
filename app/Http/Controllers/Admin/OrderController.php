<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Order;
use App\User;
use App\OrderDetail;
use App\Promotion;
use App\Status;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'orderDetails', 'products','status', 'paymentstatus')->get();
        return view('admin.orders.index', compact('orders'));
    }
    public function create()
    {
        $products = Product::get();
        $users = User::where('role_id', '!=', 1)->get();
        $promotions = Promotion::get();
        $statuses = Status::get();
        return view('admin.orders.create', compact('products', 'users', 'promotions', 'statuses'));
    }
    public function store(Request $request)
    {
        $data = [
            "user_id" => $request->get('user_id'),
            "status_id" => $request->get('status_id'),
            "date_order" => date('d-m-Y'),
            "total" => $request->get('total'),
        ];
    }
}
