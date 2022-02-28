<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Location_Model;
use App\Models\User;
use Illuminate\Http\Request;

class location extends Controller
{
    public $md;
    function __construct()
    {
        $this->md = new Location_Model();
    }
    public function gettoptrip()
    {
        // return $this->md::where('top', '=', '1')->get();
        return $this->md::all();
    }
    public function getonetrip($id)
    {
        return $this->md::find($id);
        // echo 'ok';
    }
    public function timloca($text)
    {
        return $this->md::where('diemden', 'LIKE', "%$text%")->get();
    }
    public function locabycate($idcate)
    {
        return $this->md::where('category', '=', $idcate)->get();
    }
    // SELECT * from location WHERE id IN (1,2,6);
    // DB::table('users')
    //                 ->whereIn('id', [1, 2, 3])
    //                 ->get();
    public function getlocalike(Request $rq)
    {
        $user =  User::find($rq->iduser);
        $listlike = explode(",", $user->listlike);
        return $this->md::whereIn('id',  $listlike)->get();
    }
}
