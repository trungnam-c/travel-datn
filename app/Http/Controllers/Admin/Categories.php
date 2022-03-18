<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoriesModel;

class Categories extends Controller
{
    public function list() {
        $data = categoriesModel::paginate(10);
        return view('Admin/Categories/categories',['data'=>$data]);
    }

    public function delete($id) {
        $items = categoriesModel::select('*')->where('id','=',$id)->delete();
        return redirect('/categories/list');
    }

    public function form_edit($id) {
        $idEdit = $id;
        return view('Admin/Categories/formEdit', compact('idEdit'));
    }

    public function add_form(){
        return view('Admin/Categories/addCategories');
    }

    public function add(Request $request) {
        $request->validate(
            [
                'cateName' => 'required|string',
                'images' => 'required',
                'cateHideShow' => 'required',

            ],
            [
                'cateName.required' => 'Vui lòng điền tên danh mục',
                'cateName.string' => 'Không đúng định dạng',
                'images.required' => 'Vui lòng thêm hình',
                'cateHideShow.required' => 'Vui lòng chọn ẩn hiện',
            ]
            );

        $data = new categoriesModel();
        $data->name = $request->cateName;
        $data->image = $request->images;
        $data->anhien = $request->cateHideShow;
        $data->save();
        return redirect('/categories/list');
    }

    public function edit(Request $request, $id) {
        $request->validate(
            [
                'cateName' => 'required',
                'images' => 'required',
                'cateHideShow' => 'required',

            ],
            [
                'cateName.required' => 'Vui lòng điền tên danh mục',
                'images.required' => 'Vui lòng thêm hình',
                'cateHideShow.required' => 'Vui lòng chọn ẩn hiện',
            ]
            );

        $data = categoriesModel::find($id);
        $data->id = $id;
        $data->name = $request->cateName;
        $data->image = $request->images;
        $data->anhien = $request->cateHideShow;
        $data->save();
        return redirect('/categories/list');
    }
}
