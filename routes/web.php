<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/user', [RegisteredUserController::class, 'index'])->middleware('auth')->name('users.index');
Route::get('/product', [ProductController::class, 'index'])->middleware('auth')->name('products.index');
Route::get('/through', function () {
    return Order::with('address.user')->find(1);
});

require __DIR__.'/auth.php';
