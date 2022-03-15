<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home', [
            'title' => 'Trang quản trị'
        ]);
    }

    public function login() {
        return view('/admin/login');
    }

    public function profile() {
        return view('/layouts/app');
    }
}
