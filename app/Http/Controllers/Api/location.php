<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Location_Model;
use App\Models\rateModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class location extends Controller
{
    public $md;
    function __construct()
    {
        $this->md = new Location_Model();
    }
    public function gettoptrip()
    {
        return $this->md::where('top', '=', '1')->where('anhien', '=', 1)->get();
        // return $this->md::all();
    }
    public function getonetrip($id)
    {
        return $this->md::find($id);
        // echo 'ok';
    }
    public function timloca($text)
    {
        // return $this->md::where('diemden', 'LIKE', "%$text%")->get();
        return  DB::select("SELECT l.* FROM location l inner join categories c on l.category = c.id WHERE diemden like '%$text%' or c.name like '%$text%' AND l.anhien = 1");
    }
    public function locabycate($idcate)
    {
        return $this->md::where('category', '=', $idcate)->where('anhien', '=', 1)->get();
    }
    // SELECT * from location WHERE id IN (1,2,6);
    // DB::table('users')
    //                 ->whereIn('id', [1, 2, 3])
    //                 ->get();
    public function getlocalike(Request $rq)
    {
        $user =  User::find($rq->iduser);
        $listlike = explode(",", $user->listlike);
        return $this->md::whereIn('id',  $listlike)->where('anhien', '=', 1)->get();
    }
    public function getlocain(Request $rq)
    {
        $list = explode(",", $rq->list);
        return $this->md::whereIn('id', $list)->where('anhien', '=', 1)->get();
    }
    public function locationstar($star)
    {
        $arridlo = array();
        $sao =  DB::table('rate')
            ->select(DB::raw('AVG(star) as sao , idlocation'))
            ->where('anhien', '<>', 0)
            ->groupBy('star')->groupBy('idlocation')
            ->get();

        foreach ($sao as $value) {
            array_push($arridlo, $value->idlocation);
        }
        return $this->md::whereIn('id', $arridlo)->where('anhien', '=', 1)->get();
    }
}
