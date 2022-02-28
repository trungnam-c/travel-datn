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
        VALUES ('$rq->iddetail', '$rq->iduser', NOW(), NULL, b'$rq->thanhtoan', b'$rq->trangthai_thanhtoan', NULL);
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
}
