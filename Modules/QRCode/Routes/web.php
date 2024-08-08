<?php

use Illuminate\Support\Facades\Route;
use Modules\QRCode\Http\Controllers\QRCodeController;

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

    Route::get("qrcode", [QRCodeController::class, "index"])->name("qrcode");
    Route::get("qrcode/create", [QRCodeController::class, "create"])->name("create");
    Route::group(
        ['prefix' => 'qrcode', 'as' => 'qrcode.'],
        function () {
            Route::get('fields/{type}', [QRCodeController::class, 'fields'])->name('fields');
            Route::post('preview', [QRCodeController::class, 'preview'])->name('preview');
            Route::post("store", [QRCodeController::class, "store"])->name('store');
            Route::get("{id}/edit", [QRCodeController::class, "edit"])->name("edit");
            Route::post("{id}/update", [QRCodeController::class, "update"])->name("update");
            Route::get("{id}/update", [QRCodeController::class, "delete"])->name("delete");
            Route::get("filter",[QRCodeController::class,"filter"])->name("filter");
        }
    );
});
