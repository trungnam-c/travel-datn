<?php

use App\Http\Controllers\Api\category;
use App\Http\Controllers\Api\Chitietdatvecontroller;
use App\Http\Controllers\Api\Datvecontroller;
use App\Http\Controllers\Api\detail_location;
use App\Http\Controllers\Api\location;
use App\Http\Controllers\Api\Magiamgia;
use App\Http\Controllers\Api\rateController;
use App\Http\Controllers\Api\userController;
use App\Http\Controllers\thanhtoan;
use Illuminate\Support\Facades\Route;


Route::group([], function () {
    Route::post('login', [userController::class, 'login']);
    Route::post('signup', [userController::class, 'signup']);
    Route::POST('sendmailchangepass/', [userController::class, 'sendmailchangepass']);
    Route::POST('changepassquenmk/', [userController::class, 'changepassquenmk']);
    Route::get('savethanhtoan/', [thanhtoan::class, 'savethanhtoan']);
    Route::get('getallcate', [category::class, 'getall']);
    Route::get('gettoptrip', [location::class, 'gettoptrip']);
    Route::get('getone/{id}', [location::class, 'getonetrip']);
    Route::get('getcate/{id}', [category::class, 'getcateid']);
    Route::get('chitietgia/{id}', [detail_location::class, 'chitietgia']);
    Route::get('ngaycolich/{id}', [detail_location::class, 'ngaycolich']);
    Route::get("timloca/{text}", [location::class, 'timloca']);
    Route::get("locabycate/{idcate}", [location::class, 'locabycate']);
    Route::post("checkmagiamgia", [Magiamgia::class, 'checkmagiamgia']);
    Route::post("demsoluongkhach", [Chitietdatvecontroller::class, 'demsoluongkhach']);
    Route::post('timkiemtheongay', [detail_location::class, 'timkiemtheongay']);
    Route::post('getlocain', [location::class, 'getlocain']);
    Route::post('checkkhachcove', [Datvecontroller::class, 'checkkhachcove']);
    Route::get('getrate/{id}', [rateController::class, 'getrate']);
    Route::post('cochuyenditheongay', [detail_location::class, 'cochuyenditheongay']);




    // category

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::delete('logout', [userController::class, 'logout']);
        Route::get('me', [userController::class, 'user']);
        Route::get('chitietve/{id}', [Chitietdatvecontroller::class, 'chitietve']);
        Route::get('scanve/{id}', [Chitietdatvecontroller::class, 'scanve']);
        Route::get('thongkeve/{id}', [Datvecontroller::class, 'thongkeve']);
        Route::post('newdatve', [Datvecontroller::class, 'newdatve']);
        Route::post('newchitietdv', [Chitietdatvecontroller::class, 'newchitietdv']);
        Route::patch('settrangthai', [Datvecontroller::class, 'settrangthai']);
        Route::post("uploadimage/", [userController::class, 'uploadimage']);
        Route::post("updateuser/", [userController::class, 'updateuser']);
        Route::post("changepass/", [userController::class, 'changepass']);
        Route::POST('likeandislike/', [userController::class, 'likeandislike']);
        Route::POST('getlocalike/', [location::class, 'getlocalike']);
        Route::POST('thanhtoan/', [thanhtoan::class, 'chuyentrang']);
        Route::get('lsdv/{id}', [Chitietdatvecontroller::class, 'lsdv']);
        Route::post('addrate', [rateController::class, 'addrate']);
    });
});
