<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tourGuideModel;

class tourGuideController extends Controller
{
    public function index() {
        $items = tourGuideModel::select("*")->get();
        return view('Admin/TourGuide/guider', compact('items'));
    }

    public function form_add() {
        return view('Admin/TourGuide/addGuider');
    }

    public function add(Request $request) {
        $guider = new tourGuideModel();
        $guider->guider_name = $request->guiderName;
        $guider->guider_gender = $request->guiderGender;
        $guider->guider_address = $request->guiderAddress;
        $guider->guider_phone = $request->guiderPhone;
        $guider->guider_status = $request->guiderStatus;
        $guider->save();
        return redirect('/guider');
    }

    public function delete($id) {
        $items = tourGuideModel::select('*')->where('id','=',$id)->delete();
        return redirect('/guider');
    }

    public function form_edit($id) {
        $idGuider = $id;
        return view('Admin/TourGuide/formEdit', compact('idGuider'));
    }

    public function edit(Request $request, $id) {
        $guider = tourGuideModel::find($id);
        $guider->guider_name = $request->guiderName;
        $guider->guider_gender = $request->guiderGender;
        $guider->guider_address = $request->guiderAddress;
        $guider->guider_phone = $request->guiderPhone;
        $guider->guider_status = $request->guiderStatus;
        $guider->save();
        return redirect('/guider');
    }
}
