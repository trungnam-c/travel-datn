<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

//admin route

Route::get('/', function () {
    return view('layouts.admin_layout');
});

// location route group
Route::name('location.')->group(function () {
    Route::get('/quantri/quan-ly-dia-diem',[LocationController::class,"index"])->name('index');
    Route::get('/quantri/them-dia-diem',[LocationController::class,"create"])->name('create');
    Route::get('/quantri/luu-dia-diem/{id}',[LocationController::class,"store"])->name('store');
    Route::get('/quantri/sua-dia-diem',[LocationController::class,"edit"])->name('edit');
    Route::get('/quantri/cap-nhat-dia-diem/{id}',[LocationController::class,"update"])->name('update');
    Route::get('/quantri/xoa-dia-diem/{id}',[LocationController::class,"destroy"])->name('destroy');
});


//admin
Route::prefix('admin')->group(function (){
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('dashboard', [AdminController::class, 'index']);

    #User
    Route::prefix('user')->group(function (){
        Route::get('add', [UserController::class, 'create']);
        Route::post('add', [UserController::class, 'store']);
        Route::get('list', [UserController::class, 'index']);
        Route::get('edit/{user}', [UserController::class, 'show']);
        Route::post('edit/{user}', [UserController::class, 'update']);
        Route::delete('destroy', [UserController::class, 'destroy']);
    });

});