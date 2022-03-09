<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\detailLocationModel;
use App\Models\loaivechitiet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class detail_location extends Controller
{
    public $md;
    public $lv;
    function __construct()
    {
        $this->md = new detailLocationModel();
        $this->vl = new loaivechitiet();
    }
    public function chitietgia($idlo)
    {
        $sql =
            "SELECT * FROM detail_location dlo inner join ( select ";
        $alllv = $this->vl->getloaivebyid($idlo);

        foreach ($alllv as $value) {
            $idlv = $value['loaive'];
            $sql .= "max(case when loaive = '$idlv' then giave end) 'n$idlv', ";
        }
        $sql .= "max(case when idlocation_detail = '$idlo' then idlocation_detail end ) 'iddetail' from chitietloaive WHERE idlocation_detail = '$idlo') temp on dlo.id = temp.iddetail";
        // echo $sql;
        $rs =  DB::select($sql);
        return $rs;
    }
    public function ngaycolich($id)
    {
        return ModelsDetail_location::where('idlocation', '=', $id)->get();
    }
}
