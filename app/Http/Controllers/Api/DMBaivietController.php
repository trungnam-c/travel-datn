<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DMbaivietModel;
use Illuminate\Http\Request;

class DMBaivietController extends Controller
{
    public function getall()
    {
        return DMbaivietModel::where('anhien', '=', 1)->get();
    }
}
