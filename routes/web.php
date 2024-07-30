<?php

use App\Http\Controllers\DashController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ZoomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth', 'prefix' => 'account'], function () {
    Route::get("dashboard", [DashController::class, "index"])->name("dashboard");
    Route::get("tasks", [TaskController::class, "index"])->name("tasks");
    Route::get("qrcode", [QRCodeController::class, "index"])->name("qrcode");
    Route::get("report", [ReportController::class, "index"])->name("reports");
    Route::get("zoom", [ZoomController::class, "index"])->name("zoom");
    Route::get("purchase", [PurchaseController::class, "index"])->name("purchases");
    Route::get("notice", [NoticeController::class, "index"])->name("notice");
    Route::get("invoice", [InvoiceController::class, "index"])->name("invoice");
});

Route::get("login", [LoginController::class, "index"])->name("login");
Route::post("login", [LoginController::class, "login"])->name("login");
Route::get("/register", [RegisterController::class, "index"])->name("register");
Route::post("register", [RegisterController::class, "store"])->name("users.store");
Route::get("logout", [LoginController::class, "logout"])->name("logout");
