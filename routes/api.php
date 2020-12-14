<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PassportAuthController, PostController};
use App\Http\Controllers\Auth\RegisteredUserController;

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
		Route::get('/', [RegisteredUserController::class, 'listUsers']);
		Route::get('/orders', [RegisteredUserController::class, 'listOrders']);
		Route::get('/addresses', [RegisteredUserController::class, 'listAddresses']);
});

Route::get('/posts', [PostController::class, 'index'])->middleware('auth:api');

Route::post('register', [PassportAuthController::class, 'register'])->middleware('auth:api');
