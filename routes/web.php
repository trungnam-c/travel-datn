<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\detailLocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Categories;
use App\Http\Controllers\Admin\tourGuideController;
use App\Http\Controllers\Admin\OrderTicketController;
use App\Http\Controllers\MagiamgiaController;

//admin route

Route::get('/', function () {
    return view('layouts.admin_layout');
});

// order ticket detail

Route::name('orderticketdetail.')->group(function () {
    Route::get('/quantri/quan-ly-chi-tiet-dat-ve',[OrderTicketController::class,"index"])->name('index');
    Route::get('/quantri/them-dia-diem',[OrderTicketController::class,"create"])->name('create');

});

// order tikets
Route::name('orderticket.')->group(function () {
    Route::get('/quantri/quan-ly-dat-ve',[OrderTicketController::class,"index"])->name('index');
    Route::get('/quantri/cap-nhat-trang-thai-ve/{id}/{act}',[OrderTicketController::class,"updateticket"])->name('updateticket');
    Route::get('/quantri/cap-nhat-trang-thai-thanh-toan/{id}/{act}',[OrderTicketController::class,"updatepayment"])->name('updatepayment');

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
Route::name('magiamgia.')->group(function () {
    Route::get('/quantri/ma-giam-gia',[MagiamgiaController::class,"index"])->name('index');
    Route::get('/quantri/them-ma-giam-gia',[MagiamgiaController::class,"create"])->name('create');
    Route::post('/quantri/luu-ma-giam-gia',[MagiamgiaController::class,"store"])->name('store');
    Route::post('/quantri/cap-nhat-ma-giam-gia/{id}',[MagiamgiaController::class,"update"])->name('update');
    Route::get('/quantri/sua-ma-giam-gia/{id}',[MagiamgiaController::class,"edit"])->name('edit');
    Route::get('/quantri/xoa-ma-giam-gia/{id}',[MagiamgiaController::class,"delete"])->name('delete');
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
        Route::get('list', [UserController::class, 'index'])->name('list');
        Route::get('edit/{user}', [UserController::class, 'show']);
        Route::post('edit/{user}', [UserController::class, 'update']);
        Route::delete('destroy', [UserController::class, 'destroy']);
    });

});


// route of categories
Route::name('categories.')->group(function (){
    Route::get('/categories/list',[Categories::class, 'list'])->name('list');
    Route::get('/categories/delete/{id}',[Categories::class, 'delete'])->name('delete');
    Route::get('/categories/edit/{id}',[Categories::class, 'form_edit'])->name('form_edit');
    Route::post('/categories/edit/{id}',[Categories::class, 'edit'])->name('edit');
    Route::get('/categories/add',[Categories::class, 'add_form'])->name('add_form');
    Route::post('/categories/add',[Categories::class, 'add'])->name('add');
});


//route of guider
Route::name('guider.')->group(function (){
    Route::get('/guider/huong-dan-vien',[tourGuideController::class, 'index'])->name('huong-dan-vien');
    Route::get('/guider/add', [tourGuideController::class, 'form_add'])->name('form_add');
    Route::post('/guider/add', [tourGuideController::class, 'add'])->name('add');
    Route::get('/guider/delete/{id}',[tourGuideController::class, 'delete'])->name('delete');
    Route::get('/guider/edit/{id}',[tourGuideController::class, 'form_edit'])->name('form_edit');
    Route::post('/guider/edit/{id}',[tourGuideController::class, 'edit'])->name('edit');
});



Route::name('detailLocation.')->group(function(){
    Route::get('/quantri/chi-tiet-dia-diem',[detailLocationController::class, 'index'])->name('index');
});
