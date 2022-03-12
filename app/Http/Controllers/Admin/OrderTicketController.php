<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\detailLocationModel;
use App\Models\Location_Model;
use App\Models\OrderTicketModel;
use Illuminate\Http\Request;
class OrderTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $locations = Location_Model::all(); 
        return view("Admin.Tickets.orderTicket_index",["locations"=>$locations ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function updateticket($id,$act)
    { 
        $status = "";
        $data = OrderTicketModel::find($id);
        if($act == 0){
            $data ->trangthai = 0; 
            $status = '<span class="text-light ">Chờ xác nhận</span>';

        }elseif ($act ==1 ) {
            $data ->trangthai = 1; 
            $status = '<span class="text-success ">Đã xác nhận Vé</span>';

        }
        elseif($act == 2) {
            $data ->trangthai = 2; 
            $status = '<span class="text-warning ">Khách yêu cầu huỷ</span>'; 

        }
        elseif($act == 3) { 
            $data ->trangthai = 3; 

            $status = '<span class="text-danger ">Đã xác nhận huỷ</span>'; 

        }
        $data->save();
        return $status;
    }

    public function updatepayment($id,$act)
    { 
        $status = "";
        $data = OrderTicketModel::find($id);
        if($act == 0){
            $data ->trangthai_thanhtoan = 0;
            $status = '<span class="text-success ">Chưa thanh toán</span>';
        }elseif ($act ==1 ) {
            $data ->trangthai_thanhtoan = 1;
            $status = '<span class="text-success ">Đã xác nhận thanh toán</span>'; 
        }
        elseif($act == 2) {
            $data ->trangthai_thanhtoan = 2;
            $status = '<span class="text-success ">Đã hoàn tiền</span>';

        }
        $data->save();
        return $status;
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
