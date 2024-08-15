<?php

use Illuminate\Support\Facades\Route;
use Modules\Task\Http\Controllers\TaskCategoryController;



Route::group(['middleware' => 'auth', 'prefix' => 'account'], function () {
    Route::group(['prefix' => 'task-category', 'as' => 'task-category.'], function () {
        Route::get('/', [TaskCategoryController::class, "index"])->name('index');
        Route::get('create', [TaskCategoryController::class, "create"])->name('create');
        Route::post('store', [TaskCategoryController::class, "store"])->name('store');
        Route::get('{id}/show', [TaskCategoryController::class, "show"])->name('show');
        Route::get('{id}/edit', [TaskCategoryController::class, "edit"])->name('edit');
        Route::post('{id}/update', [TaskCategoryController::class, "update"])->name('update');
        Route::get('{id}/delete', [TaskCategoryController::class, "delete"])->name('delete');
    });
});
