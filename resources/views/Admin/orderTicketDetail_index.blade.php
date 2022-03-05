@extends('layouts.admin_layout') 
{{-- @section('page-title', 'Thông tin chi tiết đặt vé') --}}

@section('main')
@php
use Illuminate\Support\Facades\DB;

   
@endphp
    <section class="content">
        <div class="container">
            <div class="row">

                <div class="col-12">


                    <div class="card min-height-700">
                        <div class="card-header">
                            <h3 class="card-title  ">  </h3>
                        </div>
                        <div class="card-body ml-4 mt-4 order-ticket-detail">
                                <h3 class="mb-5">Thông tin vé: <a href="">#000909090898987</a> </h3>
                                <h5>Tên khách hàng:<b> Quang Đạt</b> </h5>
                                <h5>Loại vé: <b>Người lớn</b> </h5> 
                                <h5>Giới tính: <b>Nam</b> </h5> 
                                <h5>Ngày sinh: <b>02/22/2222</b> </h5> 
                                <h5>Số điện thoại: <b>0389825555</b> </h5> 
                                <h5>Giấy tờ tuỳ thân: <b>214445558</b> </h5> 
                                <h5>Tiền vé: <b>200.000.000đ</b> </h5>
                        </div>  
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

            </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
