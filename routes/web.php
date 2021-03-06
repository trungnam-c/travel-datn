<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Categories;
use App\Http\Controllers\Admin\detailLocationController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\OrderTicketController;
use App\Http\Controllers\Admin\tourGuideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MagiamgiaController;
use App\Http\Controllers\DanhmucbaivietController;
use App\Http\Controllers\BaivietController;
use App\Http\Controllers\RateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportCustomer;
// use App\Models\detailLocationModel;
// use App\Models\Location_Model;

// Route::get('/tet1',function(){
//     return DB::select("SELECT ctdv.* from chitietdatve ctdv inner join datve dv on dv.idve = ctdv.idve WHERE dv.idlocation_detail = 2 and dv.trangthai = 1;");
// });
//admin route


// Route::get('/tet', function () {
   
// });

// bao/admin-user
//admin
Route::get('/', function () {return redirect('/login');});
Route::get('/home', function () {return redirect('/admin');});
Route::get('thoat', function () {
    Auth::logout();
    return redirect('/login');
})->middleware('auth');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin')->middleware('checklogin');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile')->middleware('auth');
    Route::post('/cap-nhat-profile', [AdminController::class, 'update'])->name('update')->middleware('auth');

    #User
    Route::prefix('user')->group(function () {
        Route::get('add-form', [UserController::class, 'create'])->name('add-form')->middleware('auth');
        Route::post('add', [UserController::class, 'store'])->name('add')->middleware('auth');
        Route::get('danh-sach-khach-hang', [UserController::class, 'index'])->name('danh-sach-khach-hang')->middleware('auth');
        Route::get('edit/{user}', [UserController::class, 'show'])->middleware('auth');
        Route::post('edit/{user}', [UserController::class, 'update'])->middleware('auth');
        Route::get('destroy/{id}', [UserController::class, 'destroy'])->middleware('auth');
    });

});

// route of categories
Route::name('categories.')->group(function () {
    Route::get('/categories/list', [Categories::class, 'list'])->name('list')->middleware('auth');
    Route::get('/categories/delete/{id}', [Categories::class, 'delete'])->name('delete')->middleware('auth');
    Route::get('/categories/edit/{id}', [Categories::class, 'form_edit'])->name('form_edit')->middleware('auth');
    Route::post('/categories/edit/{id}', [Categories::class, 'edit'])->name('edit')->middleware('auth');
    Route::get('/categories/add', [Categories::class, 'add_form'])->name('add_form')->middleware('auth');
    Route::post('/categories/add', [Categories::class, 'add'])->name('add')->middleware('auth');
});

//route of guider
Route::name('guider.')->group(function () {
    Route::get('/guider/huong-dan-vien', [tourGuideController::class, 'index'])->name('huong-dan-vien')->middleware('auth');
    Route::get('/guider/add', [tourGuideController::class, 'form_add'])->name('form_add')->middleware('auth');
    Route::post('/guider/add', [tourGuideController::class, 'add'])->name('add')->middleware('auth');
    Route::get('/guider/delete/{id}', [tourGuideController::class, 'delete'])->name('delete')->middleware('auth');
    Route::get('/guider/edit/{id}', [tourGuideController::class, 'form_edit'])->name('form_edit')->middleware('auth');
    Route::post('/guider/edit/{id}', [tourGuideController::class, 'edit'])->name('edit')->middleware('auth');
});

// order ticket detail

Route::name('orderticketdetail.')->group(function () {
    Route::get('/quantri/quan-ly-chi-tiet-dat-ve', [OrderTicketController::class, "index"])->name('index')->middleware('auth');
    Route::get('/quantri/them-dia-diem', [OrderTicketController::class, "create"])->name('create')->middleware('auth');

});

// order tikets
Route::name('orderticket.')->middleware("auth")->group(function () {
    Route::get('/quantri/quan-ly-dat-ve', [OrderTicketController::class, "index"])->name('index');
    Route::get('/quantri/cap-nhat-trang-thai-ve/{id}/{act}', [OrderTicketController::class, "updateticket"])->name('updateticket');
    Route::get('/quantri/cap-nhat-trang-thai-thanh-toan/{id}/{act}', [OrderTicketController::class, "updatepayment"])->name('updatepayment');
    Route::get('/quantri/xuat-file/{id}',function($id){
        return Excel::download(new ExportCustomer($id), 'users.xlsx');
    })->name("export");
});

// location route group
Route::name('location.')->group(function () {
    Route::get('/quantri/quan-ly-dia-diem', [LocationController::class, "index"])->name('index')->middleware('auth');
    Route::get('/quantri/them-dia-diem', [LocationController::class, "create"])->name('create')->middleware('auth');
    Route::post('/quantri/luu-dia-diem', [LocationController::class, "store"])->name('store')->middleware('auth');
    Route::post('/quantri/luu-hinh-anh', [LocationController::class, "saveImg"])->name('saveImg')->middleware('auth');
    Route::get('/quantri/sua-dia-diem/{id}', [LocationController::class, "edit"])->name('edit')->middleware('auth');
    Route::post('/quantri/cap-nhat-dia-diem/{id}', [LocationController::class, "update"])->name('cap-nhat-dia-diem')->middleware('auth');
    Route::get('/quantri/xoa-dia-diem/{id}', [LocationController::class, "destroy"])->name('destroy')->middleware('auth');
    Route::get('/quantri/inve/{id}', [LocationController::class, "inve"])->name('inve')->middleware('auth');

});
Route::name('detailLocation.')->group(function () {
    Route::get('/quantri/chi-tiet-dia-diem', [detailLocationController::class, 'index'])->name('index')->middleware('auth');
    Route::get('/quantri/them-chi-tiet-dia-diem', [detailLocationController::class, 'create'])->name('create')->middleware('auth');
    Route::post('quantri/luu-chi-tiet-dia-diem', [detailLocationController::class, 'add'])->name('add')->middleware('auth');
    Route::get('quantri/sua-chi-tiet-dia-diem/{id}', [detailLocationController::class, 'edit'])->name('edit')->middleware('auth');
    Route::post('/quantri/cap-nhat-chi-tiet-dia-diem/{id}', [detailLocationController::class, 'update'])->name('update')->middleware('auth');
    Route::get('/quantri/xoa-chi-tiet-dia-diem/{id}', [detailLocationController::class, 'destroy'])->name('destroy')->middleware('auth');
});
Route::name('magiamgia.')->group(function () {
    Route::get('/quantri/ma-giam-gia', [MagiamgiaController::class, "index"])->name('index')->middleware('auth');
    Route::get('/quantri/them-ma-giam-gia', [MagiamgiaController::class, "create"])->name('create')->middleware('auth');
    Route::post('/quantri/luu-ma-giam-gia', [MagiamgiaController::class, "store"])->name('store')->middleware('auth');
    Route::post('/quantri/cap-nhat-ma-giam-gia/{id}', [MagiamgiaController::class, "update"])->name('update')->middleware('auth');
    Route::get('/quantri/sua-ma-giam-gia/{id}', [MagiamgiaController::class, "edit"])->name('edit')->middleware('auth');
    Route::get('/quantri/xoa-ma-giam-gia/{id}', [MagiamgiaController::class, "delete"])->name('delete')->middleware('auth');
});

// Authentication router
Auth::routes();
// Danh muc bai viet route
Route::name('danhmucbaiviet.')->group(function () {
    Route::get('/quantri/danh-muc-bai-viet', [DanhmucbaivietController::class, "index"])->name('index')->middleware('auth');
    Route::get('/quantri/them-danh-muc-bai-viet', [DanhmucbaivietController::class, "create"])->name('create')->middleware('auth');
    Route::post('/quantri/luu-danh-muc-bai-viet', [DanhmucbaivietController::class, "store"])->name('store')->middleware('auth');
    Route::post('/quantri/cap-nhat-danh-muc-bai-viet/{id}', [DanhmucbaivietController::class, "update"])->name('update')->middleware('auth');
    Route::get('/quantri/sua-danh-muc-bai-viet/{id}', [DanhmucbaivietController::class, "edit"])->name('edit')->middleware('auth');
    Route::get('/quantri/xoa-danh-muc-bai-viet/{id}', [DanhmucbaivietController::class, "delete"])->name('delete')->middleware('auth');
});
Route::name('baiviet.')->group(function () {
    Route::get('/quantri/bai-viet', [BaivietController::class, "index"])->name('index')->middleware('auth');
    Route::get('/quantri/them-bai-viet', [BaivietController::class, "create"])->name('create')->middleware('auth');
    Route::post('/quantri/luu-bai-viet', [BaivietController::class, "store"])->name('store')->middleware('auth');
    Route::post('/quantri/cap-nhat-bai-viet/{id}', [BaivietController::class, "update"])->name('update')->middleware('auth');
    Route::get('/quantri/sua-bai-viet/{id}', [BaivietController::class, "edit"])->name('edit')->middleware('auth');
    Route::get('/quantri/xoa-bai-viet/{id}', [BaivietController::class, "delete"])->name('delete')->middleware('auth');
});
Route::name('rate.')->group(function () {
    Route::get('/quantri/rate', [RateController::class, "index"])->name('index')->middleware('auth');
    Route::post('/quantri/cap-nhat-rate/{id}', [RateController::class, "update"])->name('update')->middleware('auth');
    Route::get('/quantri/sua-rate/{id}', [RateController::class, "edit"])->name('edit')->middleware('auth');
    Route::get('/quantri/xoa-rate/{id}', [RateController::class, "delete"])->name('delete')->middleware('auth');
});
