<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\magiamgia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MagiamgiaController extends Controller
{
    public function index()
    {
        $data = magiamgia::paginate(15);
        return view('Admin.magiamgia_index', ['data' => $data]);
    }
    public function create()
    {
        $data = DB::table('magiamgia')->get();
        return view('Admin.magiamgia_create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'magiamgia' => 'required',
                'chitiet' => 'required',
                'ngaybatdau' => 'required',
                'ngayketthuc' => 'required',
                'loaima' => 'required',
                'giatri' => 'required',
            ],
            [
                'magiamgia.required' => 'Thiếu mã giảm giá',
                'chitiet.required' => 'Thiếu chi tiết',
                'ngaybatdau.required' => 'Thiếu ngày bắt đầu',
                'ngayketthuc.required' => 'Thiếu ngày kết thúc',
                'loaima.required' => 'Thiếu loại mã',
                'giatri.required' => 'Thiếu giá trị',

            ]
        );
        $input = $request->all();
        $anhien = 1;
        $magiamgia = new magiamgia();
        $magiamgia->magiamgia = $input['magiamgia'];
        $magiamgia->chitiet = $input['chitiet'];
        $magiamgia->ngaybatdau = $input['ngaybatdau'];
        $magiamgia->ngayketthuc = $input['ngayketthuc'];
        $magiamgia->loaima = $input['loaima'];
        $magiamgia->giatri = $input['giatri'];
        $magiamgia->anhien = $anhien;
        $magiamgia->save();
        return back()->with("tb", "thêm thành công!");
    }
    public function edit($id)
    {
        $data = magiamgia::find($id);
        $cate = DB::table('magiamgia')->get();

        return view("Admin.magiamgia_edit", ['data' => $data, 'cate' => $cate]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'chitiet' => 'required',
                'ngaybatdau' => 'required',
                'ngayketthuc' => 'required',
            ],
            [
                'chitiet.required' => 'Thiếu chi tiết',
                'ngaybatdau.required' => 'Thiếu ngày bắt đầu',
                'ngayketthuc.required' => 'Thiếu ngày kết thúc'

            ]
        );

        $data = magiamgia::find($id);
        // Getting values from the blade template form
        // dd($request->anhien);
        if ($request->anhien == null) {
            $status = 0;
        } else {
            $status = 1;
        }
        $data->chitiet = $request->chitiet;
        $data->ngaybatdau = $request->ngaybatdau;
        $data->ngayketthuc = $request->ngayketthuc;
        $data->anhien = $status;
        $data->save();
        return redirect('/quantri/ma-giam-gia')->with("tb", "Sửa thành công!");
    }

    public function delete($id)
    {
        $query = "SELECT idmagiamgia FROM datve WHERE idmagiamgia = ?";
        $result = DB::select($query, [$id]);
        if ($result) {
            return redirect()->back()->with('alert', 'Không thể xoá mã giảm giá đang, đã được sử dụng');
        }
        $magiamgia = magiamgia::find($id);
        $magiamgia->delete();
        return back()->with("tb", "Xóa thành công!");
    }
}
