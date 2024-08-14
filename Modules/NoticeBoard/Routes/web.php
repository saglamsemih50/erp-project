<?php

use Modules\NoticeBoard\Http\Controllers\NoticeBoardController;
use Illuminate\Support\Facades\Route;

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
    Route::get("notice", [NoticeBoardController::class, "index"])->name("notice");
    Route::group(["prefix" => "notice", 'as' => "notice."], function () {
        Route::get("create", [NoticeBoardController::class, "create"])->name("create");
        Route::post("store", [NoticeBoardController::class, "store"])->name("store");
        Route::get("{id}/show", [NoticeBoardController::class, "show"])->name("show");
        Route::get("{id}/edit", [NoticeBoardController::class, "edit"])->name("edit");
        Route::post("{id}/update", [NoticeBoardController::class, "update"])->name("update");
        Route::get("{id}/delete", [NoticeBoardController::class, "delete"])->name("delete");
        Route::get("fetch-employees", [NoticeBoardController::class,"getEmployeesByDepartment"])->name("employees.fetch");
    });
});
