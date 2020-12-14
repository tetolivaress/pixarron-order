<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
	public function index()
	{
		$orders = Order::with('address.user')->orderBy('created_at')->paginate(8);
		return view('orders.index', ['orders' => $orders]);
	}
}
