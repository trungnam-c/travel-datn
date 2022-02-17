<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Categories;
use App\Http\Controllers\tourGuideController;
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

Route::get('/', function () {
    return view('Admin.home');
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
