<?php

namespace App\Http\Controllers;

use App\Models\Location_Model;
use Illuminate\Http\Request;

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
        return view('admin.location_create');
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
        $loca = new  Location_Model();
        $loca->diemdi = $input['diemdi']  ;
        $loca->diemden = $input['diemden']  ;
        $loca->time = $input['time']  ;
        $loca->mota = $input['mota']  ;
        $loca->lichtrinh = $input['lichtrinh']  ;
        $loca->giavetb = $input['giavetb']  ;
        $loca->category = $input['category']  ;
        $loca->images = $input['images']  ;
        $loca->phuongtien = $input['phuongtien']  ;
        $loca->top = $input['top']  ;
        $loca->anhien = $input['anhien']  ; 
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
