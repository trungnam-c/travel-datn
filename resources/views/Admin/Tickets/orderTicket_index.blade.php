@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Quản lý đặt vé')

@section('main')
    @php
    use App\Models\detailLocationModel;
    use App\Models\OrderTicketModel;
    use App\Models\tourGuideModel;

    use App\Models\User;
    use App\Models\Location_Model;
    use App\Models\magiamgia;

    @endphp
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">


                    <div class="card bg-dark">
                        <div class="card-header">
                            <h3 class="card-title"> Danh sách các địa điểm</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="div-dropdown">


                                @php
                                    $stt = 0;
                                @endphp
                                @foreach ($locations as $rowlc)
                                    @php
                                        $stt++;
                                        $sochuyen = detailLocationModel::where('idlocation', $rowlc->id)->get();
                                    @endphp

                                    <div class="container-fluid location-row bg-light">
                                        <div class="location-name row">
                                            <div class="col-sm-8">
                                                <p class="">Chuyến đi: <span
                                                        class="text-upper">{{ $rowlc->diemdi }} -
                                                        {{ $rowlc->diemden }}</span> </p>
                                            </div>
                                            <div class="col-sm-4">
                                                <p class="text-right"> Số chuyển: {{ count($sochuyen) }}</p>
                                            </div>
                                        </div>
                                        <div class="div-dropdown-loca-detail">
                                            @php
                                                $location_detail = detailLocationModel::where('idlocation', $rowlc->id)->get();
                                            @endphp
                                            @foreach ($location_detail as $rowlcd)
                                            @php
                                                $hdv = tourGuideModel::where("id",$rowlcd->idhdv)->first("tenhdv");
                                            @endphp
                                                <div class="w-100 div-ticket-cols">
                                                    <div class="row location-detail-row">
                                                        <div class="col-sm-4">
                                                            <p>Ngày đi: <span>{{ $rowlcd->ngaykhoihanh }} - {{$rowlcd->giokhoihanh}}</span></p> 
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <p>Hướng dẫn viên: <span>{{$hdv->tenhdv}}</span></p> 
                                                        </div>
                                                        {{-- <div class="col-sm-4">
                                                            <p>Số khách lớn: <span>33</span></p>
                                                            <p>Số khách trẻ em: <span>22</span></p>
                                                        </div> --}}
                                                        <div class="col-sm-4 div-btn-detail">
                                                            <button class="btn btn-dark btn-view-ticket">Chi tiết đặt
                                                                vé</button>
                                                        </div>
                                                    </div>
    
                                                    <div class="div-ticket-detail">
    
                                                        @php
                                                            $stt = 0;
                                                            $data = OrderTicketModel::where('idlocation_detail', $rowlcd->id)->get();
                                                        @endphp
                                                        @if (count($data) != 0)
                                                            <table id="example1" class="table table-bordered table-round ">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="stt text-center">STT</th>
                                                                        <th width="150px">Mã QR</th>
                                                                        <th width="200px">Người dùng</th>
                                                                        <th width="200px">Thanh toán</th>
                                                                        <th width="150px" class="text-center">Trạng thái thanh toán</th>
                                                                        <th width="160px" class="text-center">Trạng thái vé</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
    
                                                                    @foreach ($data as $row)
                                                                        @php
                                                                            $stt++;
                                                                            $idlocation = detailLocationModel::find($row->idlocation_detail);
                                                                            
                                                                            $location = Location_Model::find($idlocation->idlocation);
                                                                            $user = User::find($row->iduser);
                                                                            $coupou = magiamgia::find($row->idmagiamgia);
                                                                            
                                                                        @endphp
    
                                                                        <tr class="location-tr tr-bg-hv">
                                                                            <td class="text-center">{{ $stt }}</td>
    
                                                                            <td>
    
                                                                                <p>Mã QR: <span class="data-span">khong có
                                                                                    </span> </p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Họ tên: <span
                                                                                        class="data-span">{{ $user->name }}
                                                                                    </span> </p>
                                                                                <p>Ngày đặt: <span
                                                                                        class="data-span">{{ $row->ngatdatve }}
                                                                                    </span> </p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Hình thức: <span
                                                                                        class="data-span">{{ $row->thanhtoan ? 'Tại quầy' : 'Trực tuyến' }}</span>
                                                                                </p>
                                                                                <p>Mã giảm giá: <span
                                                                                        class="data-span">{{ $coupou->magiamgia }}</span>
                                                                                </p>
    
    
                                                                            </td>
    
    
                                                                            <td class="text-center">
                                                                                @if ($row->thanhtoan == 0 ) 
                                                                                    @if ($row->trangthai_thanhtoan !=1)
                                                                                    {{-- <p class="badge badge-primary"><a href="{{ route('orderticket.updatepayment', ['id'=>$row->idve, 'act'=>1]) }}"><span class="  a-link"> Xác nhận thanh toán</span></a></p> --}}
                                                                                    <p class="" id="btn-payment-confirm"><a href="{{ route('orderticket.updatepayment', ['id'=>$row->idve, 'act'=>1]) }}"><span class="badge badge-primary a-link py-2 px-3"  > Xác nhận thanh toán</span></a></p>
                                                                                    
                                                                                    @endif
                                                                                @endif
                                                                                @if($row->thanhtoan !="" && $row->trangthai_thanhtoan == 1)
                                                                                    <p class=" text- "> <span class="text-success ">Đã xác nhận thanh toán</span> </p>
    
                                                                                @endif 
    
    
    
                                                                            </td>
                                                                            <td class="text-center" id="tdstatus">
                                                                                <p class="badge badge-primary a-link" id="btn-ticket-confirm" style="display: none" >
                                                                                    <a href="{{ route('orderticket.updateticket', ['id' => $row->idve, 'act' => 1]) }}" class="text-light font-weight-normal">
                                                                                         Xác nhận vé 
                                                                                    </a>
                                                                                </p>
                                                                                @if ($row->trangthaive == 0 && $row->trangthai_thanhtoan == 1) 
                                                                                    <p class="badge badge-primary a-link "  id="btn-ticket-confirm">
                                                                                        <a href="{{ route('orderticket.updateticket', ['id' => $row->idve, 'act' => 1]) }}" class="text-light font-weight-normal">
                                                                                             Xác nhận vé 
                                                                                        </a>
                                                                                    </p>
                                                                                    
                                                                                @endif
                                                                                @if($row->trangthaive == 2)
                                                                                    <p class="badge badge-primary" id="btn-ticket-confirm">
                                                                                        <a href="{{ route('orderticket.updateticket', ['id' => $row->idve, 'act' => 3]) }}">
                                                                                            <span class="a-link"> Xác nhận huỷ vé</span>
                                                                                        </a>
                                                                                    </p>
                                                                                
                                                                                @elseif($row->trangthaive == 3 && $row->trangthai_thanhtoan == 1)
                                                                                    <p class=" text- "> <span
                                                                                            class="text-danger font-weight-bold">Đã
                                                                                            huỷ vé - hoàn tiền</span> </p>
                                                                                @endif 
                                                                                @if($row->trangthaive ==1)
                                                                                    <p class="text-success font-weight-bold"> Đã xác nhận vé </p>
                                                                                 
                                                                                @endif
    
    
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
    
                                                                </tbody>
                                                                <tfoot>
    
                                                                </tfoot>
                                                            </table>
                                                        @else
                                                            <h3>Không có vé</h3>
                                                        @endif
    
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach


                            </div>

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
    <script>
        $(document).ready(function() {

            $("#div-dropdown").on('click', '.location-name', (function(e) {
                var node = $(this).parent();
                var nut = $(node).children()[1]; 
                $(nut).toggle(100);
            }));


            $("#div-dropdown").on('click', '.btn-view-ticket', (function(e) {
                var node = $(this).parent().parent().parent(); 
                var nut = $(node).children()[1]; 
                $(nut).toggle(50);
            }));

            $("#div-dropdown").on('click', '#btn-payment-confirm', (function(e) {
                e.preventDefault();
                var node = $(this).children();
                var a = $(this).children();
                var url = $(node).attr("href");

                var tr = $(this).parent().parent();
                var td = $(tr).children()[5];
                var p = $(td).children();
                $.get(url, function(data, status){
                    $(a).html(data);
                    $(p).show();

                });
            }));

            $("#div-dropdown").on('click', '#btn-ticket-confirm', (function(e) {
                e.preventDefault();
                var node = $(this).children();
                 var p = $(this).parent() ;
                var url = $(node).attr("href");

                // var tr = $(this).parent().parent();
                // var td = $(tr).children()[5];
                // var p = $(td).children();
                $.get(url, function(data, status){
                    $(p).html(data); 

                });
            }));

            // xac nhan ve
            // $("#btn-payment-confirm").click(function(e){
                
            //     $.get("demo_test.asp", function(data, status){
            //         alert("Data: " + data + "\nStatus: " + status);
            //     });
            // });

        });
    </script>
@endsection
