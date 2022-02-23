<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\detailLocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Categories;
use App\Http\Controllers\tourGuideController;


//admin route

Route::get('/', function () {
    return view('layouts.admin_layout');
});

// location route group
Route::name('location.')->group(function () {
    Route::get('/quantri/quan-ly-dia-diem',[LocationController::class,"index"])->name('index');
    Route::get('/quantri/them-dia-diem',[LocationController::class,"create"])->name('create');
    Route::post('/quantri/luu-dia-diem',[LocationController::class,"store"])->name('store');
    Route::post('/quantri/luu-hinh-anh',[LocationController::class,"saveImg"])->name('saveImg');
    Route::get('/quantri/sua-dia-diem/{id}',[LocationController::class,"edit"])->name('edit');
    Route::post('/quantri/cap-nhat-dia-diem/{id}',[LocationController::class,"update"])->name('update');
    Route::get('/quantri/xoa-dia-diem/{id}',[LocationController::class,"destroy"])->name('destroy');
});

Route::name('detailLocation.')->group(function(){
    Route::get('/quantri/chi-tiet-dia-diem',[detailLocationController::class, 'index'])->name('index');
    Route::get('/quantri/them-chi-tiet-dia-diem',[detailLocationController::class, 'create'])->name('create');
    Route::post('quantri/luu-chi-tiet-dia-diem',[detailLocationController::class, 'add'])->name('add');
    Route::get('quantri/sua-chi-tiet-dia-diem/{id}',[detailLocationController::class, 'edit'])->name('edit');
    Route::post('/quantri/cap-nhat-chi-tiet-dia-diem/{id}',[detailLocationController::class, 'update'])->name('update');
    Route::get('/quantri/xoa-chi-tiet-dia-diem/{id}',[detailLocationController::class, 'destroy'])->name('destroy');
});


// bao/admin-user
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


// route of categories
Route::get('/categories',[Categories::class, 'list']);
Route::get('/categories/delete/{id}',[Categories::class, 'delete']);
Route::get('/categories/edit/{id}',[Categories::class, 'form_edit']);
Route::post('/categories/edit/{id}',[Categories::class, 'edit']);
Route::get('/categories/add',[Categories::class, 'add_form']);
Route::post('/categories/add',[Categories::class, 'add']);

//route of guider
Route::get('/guider',[tourGuideController::class, 'index']);
Route::get('/guider/add', [tourGuideController::class, 'form_add']);
Route::post('/guider/add', [tourGuideController::class, 'add']);
Route::get('/guider/delete/{id}',[tourGuideController::class, 'delete']);
Route::get('/guider/edit/{id}',[tourGuideController::class, 'form_edit']);
Route::post('/guider/edit/{id}',[tourGuideController::class, 'edit']);



Route::name('detailLocation.')->group(function(){
    Route::get('/quantri/chi-tiet-dia-diem',[detailLocationController::class, 'index'])->name('index');
});
