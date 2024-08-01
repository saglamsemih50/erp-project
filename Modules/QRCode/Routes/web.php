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
    Route::get("qrcode/create",[QRCodeController::class,"create"])->name("create");

});
