<?php

namespace App\Http\Controllers;
use App\Models\rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RateController extends Controller
{
    public function index()
    {
        $data = rate::paginate(15);
        return view('Admin.rate_index', ['data' => $data]);
    }
    // public function create()
    // {
    //     $data = DB::table('danhmuc_baiviet')->get();
    //     return view('Admin.danhmucbaiviet_create', ['data' => $data]);
    // }

    // public function store(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'name' => 'required',
    //         ],
    //         [
    //             'name.required' => 'Thiếu tên danh mục',
    //         ]
    //     );
    //     $input = $request->all();
    //     $anhien = 1;
    //     $danhmucbaiviet = new danhmucbaiviet();
    //     $danhmucbaiviet->name = $input['name'];
    //     $danhmucbaiviet->anhien = $anhien;
    //     $danhmucbaiviet->save();
    //     return back()->with("tb", "thêm thành công!");
    // }
    public function edit($id)
    {
        // $data = rate::find($id);
        $cate = DB::table('rate')->get();
        $data = DB::table('rate')->where('idrate',$id)->first();
        return view("Admin.rate_edit", ['data' => $data, 'cate' => $cate]);

    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'lydoan' => 'required',
            ],
            [
                'lydoan.required' => 'Thiếu lý do ẩn',
            ]
        );

        $data = rate::find($id);
        // Getting values from the blade template form
        if($request->anhien == null) {
            $status = 1;
        }else {
            $status = 0;
        }
        $data->lydoan = $request->lydoan;
        $data->anhien = $status;
        $data->save();
        return redirect('/quantri/rate')->with("tb", "Sửa thành công!");
    }

    public function delete($id)
    {
        return redirect('/quantri/rate');
    }


}
