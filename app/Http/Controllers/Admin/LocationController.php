<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Location_Request;
use App\Models\Location_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Location_Model::paginate(15);
        return view('Admin.Locations.location_index', ['data' => $data]);
    }

    /**v
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('categories')->get();
        return view('Admin.Locations.location_create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Location_Request $request)
    {

        $request->validate([
            'diemdi' => ['required'],
            'diemden' => ['required'],
            'time' => ['required'],
            'mota' => ['required'],
            'lichtrinh' => ['required'],
            'giavetb' => ['required'],
            'category' => ['required'],
            'phuongtien' => ['required'],
            // 'top' => ['required'],
            // 'anhien' => ['required'],
        ]);

        $input = $request->all();
        $phuongtien = "";
        if ($input['phuongtien'] != null) {
            foreach (json_decode($input['phuongtien'], true) as $item) {
                $phuongtien .= $item['value'] . ",";
            }
        }
        $top = 0;
        if (isset($input['top'])) {
            $top = 1;
        }
        $anhien = 1;
        if (isset($input['anhien'])) {
            $anhien = 0;
        }

        $loca = new Location_Model();
        $loca->diemdi = $input['diemdi'];
        $loca->diemden = $input['diemden'];
        $loca->time = $input['time'];
        $loca->mota = $input['mota'];
        $loca->lichtrinh = $input['lichtrinh'];
        $loca->giavetb = $input['giavetb'];
        $loca->category = $input['category'];
        $loca->image = $input['images'];
        $loca->phuongtien = $phuongtien;
        $loca->top = $top;
        $loca->anhien = $anhien;
        $loca->save();
        return redirect(route("location.index"))->with("success", "Thêm thành công!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inve($id)
    {
      $sqllaygia = "SELECT * FROM detail_location dl inner join chitietloaive ctlv on dl.id = ctlv.idlocation_detail WHERE idlocation = '$id' and ngaykhoihanh >= NOW() and anhien = 1 ORDER by id";
        $gia = DB::select($sqllaygia);
       $sqllayloca = "SELECT * FROM location WHERE id = '$id'";
       $loca = DB::select($sqllayloca);

        return view("LayoutMail.printQC", ['gia' => $gia, 'loca' => $loca]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Location_Model::find($id);
        $cate = DB::table('categories')->get();

        return view("Admin.Locations.location_edit", ['data' => $data, 'cate' => $cate, 'idLocate' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function xoadauphay($text)
    {
        $data = "";
        if ($text != "") {
            $arr1 = [];
            $arr = explode(',', $text);
            foreach ($arr as $a) {
                if ($a != null) {
                    array_push($arr1, $a);
                }

            }
            $data = implode(",", $arr1);
        }

        return $data;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Location_Model::destroy($id);
        return back()->with("tb", "xoá thành công!");
    }

    public function saveImg(Request $request)
    {
        $image = $request->file('file');
        // $file_name =  Carbon::now()->timestamp;
        // $image->move(public_path('upload/'),$file_name);
        $result = $image->storeOnCloudinaryAs();
        return $result->getSecurePath();
    }

    public function update(Request $request, $id)
    {

        $input = $request->all();
        $phuongtien = "";
        if ($input['phuongtien'] != null) {
            foreach (json_decode($input['phuongtien'], true) as $item) {
                $phuongtien .= $item['value'] . ",";
            }
        }
        $top = 0;
        $anhien = 1;
        if (isset($input['top'])) {
            $top = 1;
        }

        if (isset($input['anhien'])) {
            $anhien = 0;
        }
        $loca = Location_Model::find($id);
        $loca->diemdi = $input['diemdi'];
        $loca->diemden = $input['diemden'];
        $loca->time = $input['time'];
        $loca->mota = $input['mota'];
        $loca->lichtrinh = $loca->lichtrinh;
        $loca->giavetb = $input['giavetb'];
        $loca->category = $input['category'];
        $loca->image = $this->xoadauphay($input['images']);
        $loca->phuongtien = $phuongtien;
        $loca->top = $top;
        $loca->anhien = $anhien;
        $loca->save();
        return back()->with("tb", "Sửa thành công!");
    }
}
