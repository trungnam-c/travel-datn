<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tourGuideModel;
use Cloudinary;
use DB;
class tourGuideController extends Controller
{
    public function index() {
        $items = tourGuideModel::select("*")->paginate(10);
        return view('Admin/TourGuide/guider', compact('items'));
    }

    public function form_add() {
        return view('Admin/TourGuide/addGuider');
    }

    public function add(Request $request) {
        $request->validate(
            [
                'guiderName' => 'required|string',
                'guiderGender' => 'required',
                'guiderAddress' => 'required',
                'guiderPhone' => 'required|numeric',
                'guiderStatus' => 'required',

            ],
            [
                'guiderName.required' => 'Vui lòng điền họ tên',
                'guiderName.required' => 'Không đúng định dạng',
                'guiderGender.required' => 'Vui lòng chọn giới tính',
                'guiderAddress.required' => 'Vui lòng điền địa chỉ',
                'guiderPhone.required' => 'Vui lòng điền số điện thoại',
                'guiderPhone.numeric' => 'Không đúng định dạng',
                'guiderStatus.required' => 'Vui lòng chọn trạng thái',
            ]
            );

        $guider = new tourGuideModel();
        $guider->tenhdv = $request->guiderName;
        $guider->phai = $request->guiderGender;
        $guider->diachi = $request->guiderAddress;
        $guider->sdt = $request->guiderPhone;
        $guider->anhien = $request->guiderStatus;
        $guider->save();
        return redirect('/guider/huong-dan-vien');
    }

    public function delete($id) {
        
            $query = "SELECT iduser FROM datve WHERE iduser = ?";
            $result = DB::select($query, [$id]);    
            if($result){
                $errorDelete =  'Không thể xóa hướng dẫn viên đang hoạt động';
                return redirect('/guider/huong-dan-vien')->with('errorDelete','Không thể xóa hướng dẫn viên đang hoạt động');
            }else{
                $items = tourGuideModel::select('*')->where('id','=',$id)->delete();
                return redirect('/guider/huong-dan-vien');
            }
    }

    public function form_edit($id) {
        $idGuider = $id;
        return view('Admin/TourGuide/formEdit', compact('idGuider'));
    }

    public function edit(Request $request, $id) {
        $request->validate(
            [
                'guiderName' => 'required|string',
                'guiderGender' => 'required',
                'guiderAddress' => 'required',
                'guiderPhone' => 'required|numeric',
                'guiderStatus' => 'required',

            ],
            [
                'guiderName.required' => 'Vui lòng điền họ tên',
                'guiderName.required' => 'Không đúng định dạng',
                'guiderGender.required' => 'Vui lòng chọn giới tính',
                'guiderAddress.required' => 'Vui lòng điền địa chỉ',
                'guiderPhone.required' => 'Vui lòng điền số điện thoại',
                'guiderPhone.numeric' => 'Không đúng định dạng',
                'guiderStatus.required' => 'Vui lòng chọn trạng thái',
            ]
            );
        $input = $request->all();
        $guider = tourGuideModel::find($id);
        $guider->tenhdv = $request->guiderName;
        $guider->phai = $request->guiderGender;
        $guider->diachi = $request->guiderAddress;
        $guider->sdt = $request->guiderPhone;
        $guider->anhien = $request->guiderStatus;
        $guider->save();
        return redirect('/guider/huong-dan-vien');
    }
}
