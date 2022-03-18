<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\detailLocationModel;
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
            ],
            [
                'idlocation.required' => 'Vị trí ưu tiên không được để trống',
                'ngaykhoihanh.required' => 'Ngày khởi hành không được để trống',
                'giokhoihanh.required' => 'Ngày khởi hành không được để trống',
                'socho.required' => 'Ngày khởi hành không được để trống', 'idhdv.required' => 'Ngày khởi hành không được để trống'
            ],
        );

        $insert = $request->all();
        $detailLocation = new detailLocationModel();
        $detailLocation->idlocation = $insert['idlocation'];
        $detailLocation->ngaykhoihanh = $insert['ngaykhoihanh'];
        $detailLocation->giokhoihanh = $insert['giokhoihanh'];
        $detailLocation->socho = $insert['socho'];
        $detailLocation->idhdv = $insert['idhdv'];

        $detailLocation->save();
        return redirect()->back()->with('success', 'Thêm mới thành công!');
    }

    public function edit($id)
    {
        $data = detailLocationModel::find($id);
        $location = DB::table("location")->get();
        $hdv = DB::table("huongdanvien")->get();
        return view("Admin/detailLocation_edit", compact("data", "location", "hdv"));
    }

    public function update(Request $request, $id)
    {
        $update = $request->all();
        $detailLocation = detailLocationModel::find($id);
        $detailLocation->idlocation = $update['idlocation'];
        $detailLocation->ngaykhoihanh = $update['ngaykhoihanh'];
        $detailLocation->giokhoihanh = $update['giokhoihanh'];
        $detailLocation->socho = $update['socho'];
        $detailLocation->idhdv = $update['idhdv'];

        $detailLocation->save();
        return redirect("/quantri/chi-tiet-dia-diem")->with('success', 'Sửa thành công!');
    }

    public function destroy($id)
    {
        detailLocationModel::destroy($id);
        return back()->with("success", "Xoá thành công!");
    }
}
