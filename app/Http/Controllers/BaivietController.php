<?php

namespace App\Http\Controllers;
use App\Models\baiviet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class BaivietController extends Controller
{
    public function index()
    {
        // $data = baiviet::paginate(15);
        $data = DB::table('baiviet')
            ->join('danhmuc_baiviet', 'danhmuc_baiviet.id', '=', 'baiviet.iddm')
            ->join('users', 'users.id', '=', 'baiviet.iduser')
            ->select('baiviet.*', 'users.name as username', 'danhmuc_baiviet.name as danhmuc')
            ->paginate(15);
        return view('Admin.baiviet_index', ['data' => $data]);
    }
    public function create()
    {
        $data = DB::table('baiviet')->get();
        $cate = DB::table('danhmuc_baiviet')->get();
        return view('Admin.baiviet_create', ['data' => $data,'cate' => $cate]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'noidung' => 'required',
                'tieude' => 'required',
                'iddm' => 'required',
                // 'image' => 'required',


            ],
            [
                'noidung.required' => 'Thiếu nội dung',
                'tieude.required' => 'Thiếu tiêu đề',
                'iddm.required' => 'Thiếu danh mục',
                // 'image.required' => 'Thiếu hình ảnh',

            ]
        );
        $input = $request->all();
        $anhien = 1;
        $iduser = Auth::id();
        $baiviet = new baiviet();
        $baiviet->noidung = $input['noidung'];
        $baiviet->tieude = $input['tieude'];
        $baiviet->iddm = $input['iddm'];
        $baiviet->iduser = $iduser;
        $baiviet->ngaydang = date("Y/m/d H:m:s");
        $baiviet->anhien = $anhien;
        $baiviet->image = 'chưa có ảnh'; 
        $baiviet->save();
        return back()->with("tb", "thêm thành công!");
    }
    public function edit($id)
    {
        // $query = "SELECT iddm FROM baiviet WHERE iddm = ?";
        // $result = DB::select($query, [$id]);
        // if ($result){
        //     return redirect()->back() ->with('alert', 'Không thể sửa mã giảm giá đang, đã được sử dụng');
        // }
        $data = baiviet::find($id);
        $cate = DB::table('baiviet')->get();
        $cate = DB::table('danhmuc_baiviet')->get();
        return view("Admin.baiviet_edit", ['data' => $data, 'cate' => $cate]);

    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'noidung' => 'required',
                'tieude' => 'required',
                'iddm' => 'required',
                // 'image' => 'required',

            ],
            [
                'noidung.required' => 'Thiếu nội dung',
                'tieude.required' => 'Thiếu tiêu đề',
                'iddm.required' => 'Thiếu danh mục',
                // 'image.required' => 'Thiếu hình ảnh',

            ]
        );
        $input = $request->all();
        $data = baiviet::find($id);
        // Getting values from the blade template form
        if($request->anhien == '') {
            $status = $request->anhien = 0;
        }else {
            $status = 1;
        }
        $data->noidung = $input['noidung'];
        $data->tieude = $input['tieude'];
        $data->iddm = $input['iddm'];    
        $data->image = 'chưa có ảnh'; 
        $data->anhien = $status;
        $data->save();
        return redirect('/quantri/bai-viet')->with("tb", "Sửa thành công!");
    }

    public function delete($id)
    {
        // $query = "SELECT iddm FROM baiviet WHERE iddm = ?";
        // $result = DB::select($query, [$id]);
        // if ($result){
        //     return redirect()->back() ->with('alert', 'Không thể xoá danh mục bài viết đang, đã được sử dụng');
        // }
        $baiviet = baiviet::find($id);
        $baiviet->delete();
        return back()->with("tb", "Xóa thành công!");
    }
    public function xoadauphay($text)
    {
        $data  = "";
        if ($text != "") {
            $arr1 = [];
            $arr = explode(',', $text);
            foreach ($arr as $a) {
                if ($a != null)   array_push($arr1, $a);
            }
            $data =  implode(",", $arr1);
        }

        return $data;
    }

}
