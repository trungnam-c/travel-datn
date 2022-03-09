<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Chitietdatvecontroller extends Controller
{
    public function newchitietdv(Request $rq)
    {
        $SQL = "
        INSERT INTO `chitietdatve` (`idve`, `loaive`, `hotenkh`, `phai`, `ngaysinh`, `giaytotuythan`, `sdt`, `tienve`) VALUES ('$rq->id', b'$rq->loaive', '$rq->hoten', b'$rq->phai', '$rq->ngaysinh', '$rq->cmnd', '$rq->sdt', '$rq->tienve')";
        // return $SQL;
        DB::select($SQL);
        return DB::getPdo()->lastInsertId();
    }

    public function lsdv($id)
    {
        // $sql = "SELECT dv.idve,COUNT(ctdv.idve) as sove,ngaydatve,ngaykhoihanh,giokhoihanh,diemdi,diemden,phuongtien,time,image,trangthai,trangthai_thanhtoan FROM datve dv inner join detail_location lod on dv.idlocation_detail = lod.id inner join location lo on lod.idlocation = lo.id  
        // inner join chitietdatve ctdv on dv.idve = ctdv.idve
        // WHERE dv.iduser = $id GROUP by ctdv.idve,ngaydatve,ngaykhoihanh,giokhoihanh,diemdi,diemden,image,trangthai,dv.idve,trangthai_thanhtoan,phuongtien,time ORDER BY dv.idve DESC";
        $sql = "SELECT dv.idve,COUNT(ctdv.idve) as sove,ngaydatve,ngaykhoihanh,giokhoihanh,diemdi,diemden,phuongtien,time,image,trangthai,trangthai_thanhtoan,dv.idmagiamgia,mgg.magiamgia,mgg.giatri,mgg.loaima,mgg.chitiet
        FROM datve dv inner join detail_location lod on dv.idlocation_detail = lod.id inner join location lo on lod.idlocation = lo.id inner join chitietdatve ctdv on dv.idve = ctdv.idve left join magiamgia mgg on mgg.id = dv.idmagiamgia WHERE dv.iduser = $id GROUP by ctdv.idve,ngaydatve,ngaykhoihanh,giokhoihanh,diemdi,diemden,image,trangthai,dv.idve,trangthai_thanhtoan,phuongtien,time, dv.idmagiamgia,mgg.magiamgia,mgg.giatri,mgg.loaima,mgg.chitiet ORDER BY dv.idve DESC";
        return DB::select($sql);
    }
    public function chitietve($id)
    {
        $sql = "SELECT * FROM chitietdatve WHERE idve = $id ORDER by loaive asc";
        return DB::select($sql);
    }
    public function scanve($id)
    {
        $sql = "SELECT dv.idve,COUNT(ctdv.idve) as sove,ngaydatve,ngaykhoihanh,giokhoihanh,diemdi,diemden,image,trangthai,trangthai_thanhtoan FROM datve dv inner join detail_location lod on dv.idlocation_detail = lod.id inner join location lo on lod.idlocation = lo.id inner join chitietdatve ctdv on dv.idve = ctdv.idve WHERE dv.idve = $id GROUP by ctdv.idve,ngaydatve,ngaykhoihanh,giokhoihanh,diemdi,diemden,image,trangthai,dv.idve,trangthai_thanhtoan ORDER BY dv.idve DESC";
        return DB::select($sql);
    }
}
