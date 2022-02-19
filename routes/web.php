<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\detailLocationController;
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

Route::name('detailLocation.')->group(function(){
    Route::get('/quantri/chi-tiet-dia-diem',[detailLocationController::class, 'index'])->name('index');
});
