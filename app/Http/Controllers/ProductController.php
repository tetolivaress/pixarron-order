<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name')->paginate(5);
        return view('products.index', ['products' => $products]);
    }
}
