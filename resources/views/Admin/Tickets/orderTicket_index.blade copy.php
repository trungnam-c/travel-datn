@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Quản lý đặt vé')

@section('main')
@php  
use App\Models\detailLocationModel; 
 
use App\Models\User; 
use App\Models\Location_Model; 
use App\Models\magiamgia;

@endphp
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">


                    <div class="card"> 
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="stt">STT</th>
                                        <th width="200px">Mã QR</th> 
                                        <th width="200px">Địa điểm</th>
                                        <th width="250px">Người dùng</th> 
                                        <th width="200px">Thanh toán</th>
                                        <th width="200px">Trạng thái thanh toán</th>
                                        <th width="150px">Trạng thái vé</th>  


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 0;
                                    @endphp
                                    @foreach ($data as $row)
                                        @php
                                            $stt++;  
                                            $idlocation = detailLocationModel::find($row->idlocation_detail);
                                             
                                            $location = Location_Model::find($idlocation->idlocation);
                                            $user = User::find($row->iduser);
                                            $coupou = magiamgia::find($row->idmagiamgia);
                                             
                                        @endphp

                                        <tr class="location-tr">
                                            <td>{{ $stt }}</td>
                                            
                                            <td>
                                                 
                                                <p>Mã QR: <span class="data-span">khong có </span> </p>
                                            </td>
                                            <td>
                                                <p>
                                                    Đi: <span class="data-span">{{ $location->diemdi }}</span>
                                                </p>
                                                <p>
                                                    Đến: <span class="data-span">{{ $location->diemden }} </span>
                                                </p>
                                            </td>
                                            <td>
                                                <p>Họ tên: <span class="data-span">{{$user->name}} </span> </p>
                                                <p>Ngày đặt: <span class="data-span">{{$row->ngatdatve}} </span> </p>
                                            </td>
                                            <td>
                                                <p>Hình thức: <span class="data-span">{{($row->thanhtoan)?"Tại quầy":"Trực tuyến"}}</span></p>
                                                <p>Mã giảm giá: <span class="data-span">{{$coupou->magiamgia}}</span></p>

                                               
                                            </td>
                                               
                                                
                                            <td> 
                                                @if($row->thanhtoan != "" && $row->trangthai_thanhtoan == 1)
                                                        <p class=" text- "> <span class="text-danger font-weight-bold">Đã thanh toán</span> </p>
                                                           
                                                @elseif($row->thanhtoan == 0 && $row->trangthai_thanhtoan == 1)
                                                        <p class=" text- "> <span class="text-success font-weight-bold">Đã thanh toán</span> </p>
                                                                
                                                        {{-- <p><a href="{{ route('orderticket.updatepayment', ['id'=>$row->idve, 'act'=>0]) }}"><span class="text-primary a-link"> > Xác nhận chưa thanh toán</span></a></p>  --}}
                                                @elseif($row->thanhtoan == 0 && $row->trangthai_thanhtoan == 1)
                                                <p class=" text- "> <span class="text-danger font-weight-bold">Chờ xác nhận</span> </p>
                                                        
                                                <p><a href="{{ route('orderticket.updatepayment', ['id'=>$row->idve, 'act'=>1]) }}"><span class="text-primary a-link"> > Xác nhận đã thanh toán</span></a></p> 
                                                
                                                @endif
 
                                                 
                                                
                                            </td>
                                            <td>
                                                @if($row->trangthaive == 0 && $row->trangthai_thanhtoan ==1)
                                                        <p class=" text- "> <span class="text-warning font-weight-bold">Thanh toán thành công</span> </p>
                                                                
                                                        <p><a href="{{ route('orderticket.updateticket', ['id'=>$row->idve, 'act'=>1]) }}"><span class="text-primary a-link"> > Xác nhận vé</span></a></p> 
                                                  
                                                @elseif($row->trangthaive == 2 && $row->trangthai_thanhtoan == 1)
                                                <p class=" text- "> <span class="text-warning font-weight-bold">Yêu cầu huỷ vé  </span> </p>
                                                <p><a href="{{ route('orderticket.updateticket', ['id'=>$row->idve, 'act'=>3]) }}"><span class="text-primary a-link"> > Xác nhận huỷ vé</span></a></p> 
                                                
                                                    
                                                @elseif($row->trangthaive == 1  && $row->trangthai_thanhtoan == 1)
                                                <p class=" text- "> <span class="text-success font-weight-bold">Đã xác nhận vé</span> </p>
                                                @elseif($row->trangthaive == 3  && $row->trangthai_thanhtoan == 1)
                                                <p class=" text- "> <span class="text-danger font-weight-bold">Đã huỷ vé - hoàn tiền</span> </p>
                                                 
                                                @elseif($row->trangthaive == 0 && $row->trangthai_thanhtoan == 0)
                                                <p class=" text- "> <span class="text-danger font-weight-bold">Chờ thanh toán</span> </p>
                                                 
                                                        {{-- <p><a href="{{ route('orderticket.updatepayment', ['id'=>$row->idve, 'act'=>0]) }}"><span class="text-primary a-link"> > Huỷ vé</span></a></p>  --}}
                                                @endif
                                                 
                                                
                                            </td>
                                            {{-- <td>
                                                <p class="edit-p">
                                                    <a href="{{ route('location.edit', ['id'=>$row->idve]) }}"><span class="edit-span" alt="Chỉnh sửa dòng này"><i
                                                        class="bi bi-pencil-square"></i></span></a>
                                                    --
                                                    <a href="{{ route('location.destroy', ['id'=>$row->idve]) }}"><span class="delete-span" alt="Xoá dòng này"><i
                                                        class="bi bi-x-square"></i></span></a>
                                                </p>

                                            </td> --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>

                        </div>

                        <div class="div-paginate">
                            {{-- {{ $data->links('vendor.pagination.bootstrap-4') }} --}} 
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
