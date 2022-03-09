<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\magiamgia;
class MagiamgiaController extends Controller
{
    public function index()
    {
        $data = magiamgia::paginate(15); 
        return view('admin.magiamgia_index',['data'=>$data]);
    }
    public function create()
    {
        $data = DB ::table('magiamgia')->get();
        return view('admin.magiamgia_create',['data'=>$data]);
    }

    public function store(Request $request){
                $input = $request->all();   
                $anhien =1;
				$magiamgia = new magiamgia();
                $magiamgia->magiamgia = $input['magiamgia'];
                $magiamgia->chitiet = $input['chitiet'];
                $magiamgia->ngaybatdau = $input['ngaybatdau'];
                $magiamgia->ngayketthuc = $input['ngayketthuc'];
                $magiamgia->loaima = $input['loaima'];
                $magiamgia->giatri = $input['giatri'];
                $magiamgia->anhien = $anhien ; 
				$magiamgia->save();
                return back()->with("tb","thêm thành công!");
    }
    public function edit($id)
    {
        $data = magiamgia::find($id);
        $cate = DB::table('magiamgia')->get();

        return view("Admin.magiamgia_edit",['data'=>$data,'cate'=>$cate]);
    
    }

    public function update(Request $request, $id)
    {
        // // Validation for required fields (and using some regex to validate our numeric value)
        // $request->validate([
        //     'stock_name'=>'required',
        //     'ticket'=>'required',
        //     'value'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/'
        // ]); 
        $data = magiamgia::find($id);
        // Getting values from the blade template form
        $data->magiamgia =  $request->get('magiamgia');
        $data->chitiet = $request->get('chitiet');
        $data->ngaybatdau = $request->get('ngaybatdau');
        $data->ngayketthuc = $request->get('ngayketthuc');
        $data->save();
        return back()->with("tb","Sửa thành công!");
     }
     public function delete($id)
     {
         $magiamgia = magiamgia::find($id);
         $magiamgia->delete();
     } 

        
}
