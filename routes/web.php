<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProductController, OrderController};
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth', 'user.is.admin']], function () {
	Route::get('/users', [RegisteredUserController::class, 'index'])->name('users.index');
	Route::get('/products', [ProductController::class, 'index'])->name('products.index');
	Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
});

require __DIR__.'/auth.php';
