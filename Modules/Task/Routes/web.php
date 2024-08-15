<?php

use Illuminate\Support\Facades\Route;
use Modules\Task\Http\Controllers\TaskCategoryController;
use Modules\Task\Http\Controllers\TaskController;

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

    Route::group(
        ['prefix' => 'tasks', 'as' => 'tasks.'],
        function () {
            Route::get("/", [TaskController::class, "index"])->name("index");
            Route::get("create", [TaskController::class, "create"])->name("create");
            Route::post("store", [TaskController::class, 'store'])->name("store");
            Route::get("{id}/show", [TaskController::class, "show"])->name("show");
            Route::get("{id}/edit", [TaskController::class, "edit"])->name("edit");
            Route::post("{id}/update", [TaskController::class, "update"])->name("update");
            Route::get("{id}/delete", [TaskController::class, "delete"])->name("delete");
            Route::get('fetch-employees', [TaskController::class, 'getEmployeesByDepartment'])->name("employees.fetch");
        }
    );
});
