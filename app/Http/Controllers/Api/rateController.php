<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\rateModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rateController extends Controller
{
    public function getrate($id)
    {
        return rateModel::where('idlocation', $id)->get();
    }
    public function addrate(Request $rq)
    {
        // return rateModel::where('idlocation', $id)->get();
        $sql = " SELECT count(*) as tong FROM datve dv inner JOIN detail_location dl on dv.idlocation_detail = dl.id WHERE iduser =$rq->idus and idlocation = $rq->idloca and trangthai = 1";
        $rs = DB::select($sql);
        if ($rs[0]->tong > 0) {
            $data = new rateModel();
            $data->idlocation = $rq->idloca;
            $data->name = $rq->name;
            $data->comment = $rq->comment;
            $data->star = $rq->star;
            $data->datesend = Carbon::now();
            $data->anhien = 1;
            $check =  $data->save();
            if ($check) {
                return response()->json([
                    'status' => 'success',
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'status' => 'false'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'false'
            ]);
        }
        // $data = new categoriesModel();
    }
}
