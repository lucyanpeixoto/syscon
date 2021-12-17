<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('sellers', SellerController::class);
Route::resource('sellers.users', SellerUserController::class);
Route::resource('clients', ClientController::class);
Route::resource('colors', ColorController::class);
Route::resource('lots', LotController::class);
Route::resource('products', ProductController::class);
Route::resource('products.colors', ProductColorController::class);
Route::resource('products.lots', ProductLotController::class);
Route::resource('orders', OrderController::class);
