<?php

namespace App\Http\Controllers;

use App\Models\Location_Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 use Cloudinary;
use Illuminate\Support\Facades\Date;

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
        return view('admin.location_index',['data'=>$data]);
    }

    /**v
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB ::table('categories')->get();
        return view('admin.location_create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();   
        $phuongtien = "";
        if($input['phuongtien'] != null) {
            foreach (json_decode($input['phuongtien'],true) as $item) {
                $phuongtien .= $item['value'].",";
            } 
        }
        $anhien =1;
        if($input['anhien']) $anhien =0; 
        $loca = new  Location_Model();
        $loca->diemdi = $input['diemdi']  ;
        $loca->diemden = $input['diemden']  ;
        $loca->time = $input['time']  ;
        $loca->mota = $input['mota']  ;
        $loca->lichtrinh = '$input[lichtrinh] ' ;
        $loca->giavetb = $input['giavetb']  ;
        $loca->category = $input['category']  ;
        $loca->image = $input['images']  ;
        $loca->phuongtien = $phuongtien  ;
        $loca->top = $input['top'] ;
        $loca->anhien = $anhien  ; 
        $loca->save();
        
        return "";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        return view("Admin.location_edit",['data'=>$data,'cate'=>$cate]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();   
        $phuongtien = "";
        if($input['phuongtien'] != null) {
            foreach (json_decode($input['phuongtien'],true) as $item) {
                $phuongtien .= $item['value'].",";
            } 
        }
        $loca =  Location_Model::find($id);
        $loca->diemdi = $input['diemdi']  ;
        $loca->diemden = $input['diemden']  ;
        $loca->time = $input['time']  ;
        $loca->mota = $input['mota']  ;
        $loca->lichtrinh = '$input[lichtrinh] ' ;
        $loca->giavetb = $input['giavetb']  ;
        $loca->category = $input['category']  ;
        $loca->image = $input['images']  ;
        $loca->phuongtien = $phuongtien  ;
        $loca->top = 1 ;
        $loca->anhien = 1 ; 
        $loca->save();
        
        return "";
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
        return back()->with("tb","xoá thành công!");
    }

    public function saveImg(Request $request)
    {
        $image = $request->file('file');  
        $file_name =  Carbon::now()->timestamp;
        // $image->move(public_path('upload/'),$file_name);
        $result = $image->storeOnCloudinaryAs(); 
        return $result->getSecurePath();
    }
}
