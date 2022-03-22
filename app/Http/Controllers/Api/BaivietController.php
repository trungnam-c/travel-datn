<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\baivietModel;
use Illuminate\Http\Request;

class BaivietController extends Controller
{
    public function getallbv()
    {
        return baivietModel::where('anhien', '=', 1)->get();
    }
    public function getbvbyid($id)
    {
        return baivietModel::where('anhien', '=', 1)->where('iddm', '=', $id)->get();
    }
}
