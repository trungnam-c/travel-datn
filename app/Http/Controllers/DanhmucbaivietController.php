<?php

namespace App\Http\Controllers;
use App\Models\danhmucbaiviet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DanhmucbaivietController extends Controller
{
    public function index()
    {
        $data = danhmucbaiviet::paginate(15);
        return view('Admin.danhmucbaiviet_index', ['data' => $data]);
    }
    public function create()
    {
        $data = DB::table('danhmuc_baiviet')->get();
        return view('Admin.danhmucbaiviet_create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Thiếu tên danh mục',
            ]
        );
        $input = $request->all();
        $anhien = 1;
        $danhmucbaiviet = new danhmucbaiviet();
        $danhmucbaiviet->name = $input['name'];
        $danhmucbaiviet->anhien = $anhien;
        $danhmucbaiviet->save();
        return back()->with("tb", "thêm thành công!");
    }
    public function edit($id)
    {
        // $query = "SELECT iddm FROM baiviet WHERE iddm = ?";
        // $result = DB::select($query, [$id]);
        // if ($result){
        //     return redirect()->back() ->with('alert', 'Không thể sửa mã giảm giá đang, đã được sử dụng');
        // }
        $data = danhmucbaiviet::find($id);
        $cate = DB::table('danhmuc_baiviet')->get();

        return view("Admin.danhmucbaiviet_edit", ['data' => $data, 'cate' => $cate]);

    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Thiếu tên danh mục',
            ]
        );

        $data = danhmucbaiviet::find($id);
        // Getting values from the blade template form
        if($request->anhien == '') {
            $status = $request->anhien = 0;
        }else {
            $status = 1;
        }
        $data->name = $request->name;
        $data->anhien = $status;
        $data->save();
        return redirect('/quantri/danh-muc-bai-viet')->with("tb", "Sửa thành công!");
    }

    public function delete($id)
    {
        $query = "SELECT iddm FROM baiviet WHERE iddm = ?";
        $result = DB::select($query, [$id]);
        if ($result){
            return redirect()->back() ->with('alert', 'Không thể xoá danh mục bài viết đang, đã được sử dụng');
        }
        $danhmucbaiviet = danhmucbaiviet::find($id);
        $danhmucbaiviet->delete();
        return back()->with("tb", "Xóa thành công!");
    }


}
