<?php

use Illuminate\Support\Facades\Route;
use Modules\Purchase\Http\Controllers\PurchaseController;
use Modules\Purchase\Http\Controllers\PurhcaseProductController;

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

Route::group(['middleware' => 'auth', 'prefix' => 'account'], function () {

    Route::group(['prefix' => 'vendors', 'as' => 'vendors.'], function () {
        Route::get('/', [PurchaseController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'purchase-products', 'as' => 'purchase-products.'], function () {
        Route::get('/', [PurhcaseProductController::class, 'index'])->name('index');
    });
});
