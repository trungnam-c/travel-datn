<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\magiamgia;
class MagiamgiaController extends Controller
{
    public function index(){
        // $result = DB::select('select * from magiamgia');
        return view('magiamgia');
        }
    public function create(Request $request){
                $data = $request->input();
				$magiamgia = new magiamgia;
                $magiamgia->magiamgia = $data['magiamgia'];
                $magiamgia->chitiet = $data['chitiet'];
                $magiamgia->ngaybatdau = $data['ngaybatdau'];
                $magiamgia->ngayketthuc = $data['ngayketthuc'];
				$magiamgia->save();
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
        $magiamgia->ngaybatdau = $request->get('ngaybatdau');
        $magiamgia->ngayketthuc = $request->get('ngayketthuc');
        $data->save();
     }
     public function delete($id)
     {
         $magiamgia = magiamgia::find($id);
         $magiamgia->delete();
     } 

        
}
