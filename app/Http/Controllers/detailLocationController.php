<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detailLocationModel;

class detailLocationController extends Controller
{
    public function index(){
        $data = detailLocationModel::all();
        return view('admin.detailLocation_index', compact('data'));
    }
}
