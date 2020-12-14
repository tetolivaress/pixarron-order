<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProductController, OrderController};
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Models\Order;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/users', [RegisteredUserController::class, 'index'])->name('users.index');
	Route::get('/products', [ProductController::class, 'index'])->name('products.index');
	Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
});

Route::get('/through', function () {
    return Order::with('address.user')->find(1);
});

require __DIR__.'/auth.php';
