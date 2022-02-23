<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoriesModel;

class Categories extends Controller
{
    public function list() {
        $items = categoriesModel::select('*')->get();
        return view('Admin/Categories/categories',compact('items'));
    }

    public function delete($id) {
        $items = categoriesModel::select('*')->where('id','=',$id)->delete();
        return redirect('/categories');
    }

    public function form_edit($id) {
        $idEdit = $id;
        return view('Admin/Categories/formEdit', compact('idEdit'));
    }

    public function add_form(){
        return view('Admin/Categories/addCategories');
    }

    public function add(Request $request) {
        $data = new categoriesModel();
        $data->name = $request->cateName;
        $data->image = $request->cateImage;
        $data->anhien = $request->cateHideShow;
        $data->save();
        return redirect('/categories');
    }

    public function edit(Request $request, $id) {
        $data = categoriesModel::find($id);
        $data->id = $id;
        $data->name = $request->cateName;
        $data->image = $request->cateImage;
        $data->anhien = $request->cateHideShow;
        $data->save();
        return redirect('/categories');
    }
}
