<?php

use Illuminate\Support\Facades\Route;
use Modules\Purchase\Http\Controllers\PurchaseCategoryProductController;
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

    Route::group(['prefix' => 'vendors', 'as' => 'vendor.'], function () {
        Route::get('/', [PurchaseController::class, 'index'])->name('index');
        Route::get("create", [PurchaseController::class, "create"])->name("create");
        Route::post("store", [PurchaseController::class, 'store'])->name("store");
        Route::get("{id}/show", [PurchaseController::class, "show"])->name("show");
        Route::get("{id}/edit", [PurchaseController::class, "edit"])->name("edit");
        Route::post("{id}/update", [PurchaseController::class, "update"])->name("update");
        Route::get("{id}/delete", [PurchaseController::class, "delete"])->name("delete");
    });
    Route::group(['prefix' => 'purchase-category-products', 'as' => 'purchase-category-product.'], function () {
        Route::get('/', [PurchaseCategoryProductController::class, 'index'])->name('index');
        Route::get("create", [PurchaseCategoryProductController::class, "create"])->name("create");
        Route::post("store", [PurchaseCategoryProductController::class, "store"])->name("store");
        Route::get("{id}/show", [PurchaseCategoryProductController::class, "show"])->name("show");
        Route::get("{id}/edit", [PurchaseCategoryProductController::class, "edit"])->name("edit");
        Route::post("{id}/update", [PurchaseCategoryProductController::class, "update"])->name("update");
        Route::get("{id}/delete", [PurchaseCategoryProductController::class, "delete"])->name("delete");
    });
    Route::group(['prefix' => 'purchase-products', 'as' => 'purchase-product.'], function () {

        Route::get('/', [PurhcaseProductController::class, 'index'])->name('index');
        Route::get("create", [PurhcaseProductController::class, "create"])->name("create");
        Route::post("store", [PurhcaseProductController::class, "store"])->name("store");
        Route::get("{id}/show", [PurhcaseProductController::class, "show"])->name("show");
        Route::get("{id}/edit", [PurhcaseProductController::class, "edit"])->name("edit");
        Route::post("{id}/update", [PurhcaseProductController::class, "update"])->name("update");
        Route::get("{id}/delete", [PurhcaseProductController::class, "delete"])->name("delete");
    });
});
