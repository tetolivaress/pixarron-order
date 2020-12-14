<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
	public function index()
	{
		$orders = Order::with(['address.user', 'products'])->orderBy('created_at')->paginate();
		return view('orders.index', ['orders' => $orders]);
	}
}
