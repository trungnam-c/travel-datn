<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\magiamgia as ModelsMagiamgia;
use Illuminate\Http\Request;

class Magiamgia extends Controller
{
    public function checkmagiamgia(Request $rq)
    {
        // return $rq->magiamgia;
        return ModelsMagiamgia::where('magiamgia', $rq->magiamgia)->get();
    }
}
