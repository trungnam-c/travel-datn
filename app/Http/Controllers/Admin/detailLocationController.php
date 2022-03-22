<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\detailLocationModel;
use App\Models\loaivechitiet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class detailLocationController extends Controller
{
    public function index()
    {
        $data = detailLocationModel::all();
        return view('Admin/detailLocation_index', compact('data'));
    }

    public function create()
    {
        $hdv = DB::table("huongdanvien")->get();
        $location = DB::table("location")->get();
        return view('Admin/detailLocation_create', compact("hdv", "location"));
    }

    public function add(Request $request)
    {
        $request->validate(
            [
                'idlocation' => ['required'],
                'ngaykhoihanh' => ['required'],
                'giokhoihanh' => ['required'],
                'socho' => ['required'],
                'idhdv' => ['required'],
                'venguoilon' => ['required'],
                'vetreem' => ['required'],
            ],
            [
                'idlocation.required' => 'Vị trí ưu tiên không được để trống',
                'ngaykhoihanh.required' => 'Ngày khởi hành không được để trống',
                'giokhoihanh.required' => 'Ngày khởi hành không được để trống',
                'socho.required' => 'Ngày khởi hành không được để trống', 'idhdv.required' => 'Ngày khởi hành không được để trống',
            ],
        );
        $anhien = 1;
        if (isset($request->anhien)) {
            $anhien = 0;
        }

        $insert = $request->all();
        $detailLocation = new detailLocationModel();
        $detailLocation->idlocation = $insert['idlocation'];
        $detailLocation->ngaykhoihanh = $insert['ngaykhoihanh'];
        $detailLocation->giokhoihanh = $insert['giokhoihanh'];
        $detailLocation->socho = $insert['socho'];
        $detailLocation->idhdv = $insert['idhdv'];
        $detailLocation->anhien = $anhien;
        $detailLocation->save();

        for ($i = 0; $i < 2; $i++) {
            $loaivechitiet = new loaivechitiet();
            $loaivechitiet->idlocation_detail = $detailLocation->id;
            $loaivechitiet->loaive = $i;
            if($i === 0){
                $loaivechitiet->giave = (DB::table('location')->select('giavetb')->where('id', $request->idlocation)->get()[0]->giavetb*$request['venguoilon'])/100;
            }else {
                $loaivechitiet->giave = (DB::table('location')->select('giavetb')->where('id', $request->idlocation)->get()[0]->giavetb*$request['vetreem'])/100;
            }
            $loaivechitiet->save();
        }

        return redirect()->back()->with('success', 'Thêm chi tiết địa điểm thành công!');
    }

    public function edit($id)
    {
        $data = detailLocationModel::find($id);
        $location = DB::table("location")->get();
        $hdv = DB::table("huongdanvien")->get();
        $venguoilon =  number_format( 100 / DB::table("location")->where('id',$data->idlocation)->first()->giavetb * DB::table('chitietloaive')->where('idlocation_detail',$data->id)->where('loaive',0)->first()->giave);
        $vetreem = number_format( 100 / DB::table("location")->where('id',$data->idlocation)->first()->giavetb * DB::table('chitietloaive')->where('idlocation_detail',$data->id)->where('loaive',1)->first()->giave);
        return view("Admin/detailLocation_edit", compact("data", "location", "hdv","venguoilon","vetreem"));
    }

    public function update(Request $request, $id)
    {
        $update = $request->all();
        $anhien = 1;
        if (isset($request->anhien)) {
            $anhien = 0;
        }
        $detailLocation = detailLocationModel::find($id);
        $detailLocation->idlocation = $update['idlocation'];
        $detailLocation->ngaykhoihanh = $update['ngaykhoihanh'];
        $detailLocation->giokhoihanh = $update['giokhoihanh'];
        $detailLocation->socho = $update['socho'];
        $detailLocation->idhdv = $update['idhdv'];
        $detailLocation->anhien = $anhien;
        $detailLocation->save();
        for ($i = 0; $i < 2; $i++) {
            $loaivechitiet = loaivechitiet::where('idlocation_detail',$id)->where('loaive',$i)->first();
            $loaivechitiet->idlocation_detail = $detailLocation->id;
            $loaivechitiet->loaive = $i;
            if($i === 0){
                $loaivechitiet->giave = (DB::table('location')->select('giavetb')->where('id', $request->idlocation)->get()[0]->giavetb*$request['venguoilon'])/100;
            }else {
                $loaivechitiet->giave = (DB::table('location')->select('giavetb')->where('id', $request->idlocation)->get()[0]->giavetb*$request['vetreem'])/100;
            }
            $loaivechitiet->save();
        }


        return redirect("/quantri/chi-tiet-dia-diem")->with('success', 'Sửa thành công!');
    }

    public function destroy($id)
    {
        detailLocationModel::destroy($id);
        return back()->with("success", "Xoá thành công!");
    }
}
