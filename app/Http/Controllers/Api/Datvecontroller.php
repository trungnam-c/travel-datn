<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Datvecontroller extends Controller
{

    public function newdatve(Request $rq)
    {
        $SQL = "
        INSERT INTO `datve` (`idlocation_detail`, `iduser`, `ngaydatve`,
        `idmagiamgia`, `thanhtoan`, `trangthai_thanhtoan`, `idve`)
        VALUES ('$rq->iddetail', '$rq->iduser', NOW(), $rq->magiamgia, '$rq->thanhtoan', '$rq->trangthai_thanhtoan', NULL);
        ";
        // return $SQL;
        DB::select($SQL);
        return DB::getPdo()->lastInsertId();
    }
    public function settrangthai(Request $rq)
    {
        $sql = "UPDATE `datve` SET `trangthai` = '$rq->trangthai' WHERE `datve`.`idve` = $rq->id";
        return DB::select($sql);
    }
    public function thongkeve($id)
    {
        $sql = "SELECT COUNT(*) as sove,trangthai FROM datve WHERE iduser = $id GROUP by trangthai";
        return DB::select($sql);
    }
    public function checkkhachcove(Request $rq)
    {
        $sql = " SELECT count(*) as tong FROM datve dv inner JOIN detail_location dl on dv.idlocation_detail = dl.id WHERE iduser =$rq->idus and idlocation = $rq->idloca and trangthai = 1";
        return DB::select($sql);
    }
}
