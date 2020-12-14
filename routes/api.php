<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:api'], 'prefix' => 'user'], function(){
    Route::get('/', function (Request $request) {
        return User::with(['orders.products', 'addresses'])->find(Auth::user()->id);
    });
    Route::get('/orders', function (Request $request) {
        return User::with(['orders.products', 'addresses'])->find(Auth::user()->id)->orders;
    });
    Route::get('/addresses', function (Request $request) {
        return User::with(['orders.products', 'addresses'])->find(Auth::user()->id)->addreses;
    });
});



Route::post('register', [PassportAuthController::class, 'register'])->middleware('auth:api');
