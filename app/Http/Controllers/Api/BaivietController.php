<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\baivietModel;
use App\Models\DMbaivietModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function getNewPostsCate()
    {
        return DB::select(" SELECT tieude , ngaydang,us.name as tenuser, dm.name as tendm FROM users us inner join baiviet bv  on bv.iduser = us.id inner join danhmuc_baiviet dm on bv.iddm = dm.id WHERE dm.anhien = 1 AND bv.anhien= 1 ORDER BY ngaydang DESC  LIMIT 3 ");
    }
    public function getAllCatePost()
    {
        $arr = [];
        $dm = DMbaivietModel::where("anhien",1)->get();
        foreach($dm as $item){
            $bv = $this->getAllPostByIdCate($item["id"]);
            if(count($bv) == 0  ) $bv = null;
            $data = [
                "tendm" => $item["name"],
                "data" =>  $bv
            ];
            array_push($arr , $data);
        }
        return $arr;   
    }
    public function getAllPostByIdCate($id)
    {
        return  DB::select(" SELECT bv.id as idbv, tieude, noidung , ngaydang, us.name as tenuser, dm.name as tendm FROM users us inner join baiviet bv  on bv.iduser = us.id inner join danhmuc_baiviet dm on bv.iddm = dm.id WHERE dm.anhien = 1 AND bv.anhien= 1 AND bv.iddm = $id ORDER BY ngaydang DESC   ");
    }

}
