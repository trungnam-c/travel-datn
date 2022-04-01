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


                         
                                @foreach ($locations as $key=>$rowlc)
                                    @php
                                         
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
                                            @if (count($sochuyen) > 0)
                                                @php
                                                    $location_detail = detailLocationModel::where('idlocation', $rowlc->id)->get();
                                                @endphp
                                                @foreach ($location_detail as $key=>$rowlcd)
                                                    @php
                                                        $hdv = tourGuideModel::where('id', $rowlcd->idhdv)->first('tenhdv');
                                                       
                                                       
                                                        $data = OrderTicketModel::where('idlocation_detail', $rowlcd->id)->get();
                                                       
                                                    @endphp
                                                    <div class="w-100 div-ticket-cols">
                                                        <div class="row location-detail-row">
                                                            <div class="col-sm-3">
                                                                <p>Ngày đi: <span>{{ $rowlcd->ngaykhoihanh }} -
                                                                        {{ $rowlcd->giokhoihanh }}</span></p>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p>Hướng dẫn viên: <span>{{ $hdv->tenhdv }}</span></p>
                                                            </div>
                                                            {{-- <div class="col-sm-4">
                                                                <p>Số khách lớn: <span>33</span></p>
                                                                <p>Số khách trẻ em: <span>22</span></p>
                                                            </div> --}}
                                                            
                                                            <div class="col-sm-3 div-btn-detail">
                                                                <button class="btn btn-dark btn-view-ticket">Chi tiết đặt
                                                                    vé</button>
                                                            </div>
                                                            <div class="col-sm-2 div-btn-detail">
                                                                <a href="{{ route('orderticket.export', ['id'=>$rowlcd->id]) }}" class="btn btn-primary">Xuất file</a>
                                                            </div>
                                                        </div>

                                                        <div class="div-ticket-detail mt-3">
                                                            @php
                                                                 
                                                                $data = OrderTicketModel::where('idlocation_detail', $rowlcd->id)->get();
                                                            @endphp

                                                            <table class="table table-bordered table-round ">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="stt text-center">STT</th>
                                                                        <th width="200px">Người dùng</th>
                                                                        <th width="200px">Thanh toán</th>
                                                                        <th width="150px" class="text-center">Trạng thái
                                                                            thanh toán</th>
                                                                        <th width="160px" class="text-center">Trạng thái
                                                                            vé</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tbody-ticket-detail">

                                                                    @foreach ($data as $key=>$row)
                                                                        @php
                                                                            
                                                                            $idlocation = detailLocationModel::find($row->idlocation_detail);
                                                                             
                                                                            $location = Location_Model::find($idlocation->idlocation);
                                                                            $user = User::find($row->iduser);
                                                                            if ($row->idmagiamgia != null) {
                                                                                $coupou = magiamgia::find($row->idmagiamgia);
                                                                                $magiamgia = $coupou->magiamgia;
                                                                            } else {
                                                                                $magiamgia = 'Không có';
                                                                            }
                                                                            
                                                                            $sql = "SELECT ctdv.*,mgg.loaima,mgg.giatri from chitietdatve ctdv inner join datve dv on dv.idve = ctdv.idve left join magiamgia mgg on dv.idmagiamgia = mgg.id WHERE dv.idlocation_detail = $rowlcd->id and dv.idve = $row->idve;";
                                                                            $userdata = DB::select($sql);
                                                                            
                                                                        @endphp

                                                                        <tr class="location-tr tr-bg-hv">
                                                                            <td class="text-center">{{ $key }}
                                                                            </td>
                                                                            <td>
                                                                                <p>Họ tên: <span
                                                                                        class="data-span">{{ $user->name }}
                                                                                    </span> </p>
                                                                                    <p>Họ tên: <span
                                                                                        class="data-span">{{  $row->ngaydatve  }}
                                                                                    </span> </p>
                                                                                
                                                                                @if (count($userdata) > 0)
                                                                                    <p class="show-detail-user "
                                                                                        id="btn-user-dropdow"><i>Xem chi tiết ({{ count($userdata) }}) </i> </p>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                <p>Hình thức: <span
                                                                                        class="data-span">{{ $row->thanhtoan ? 'Tại quầy' : 'Trực tuyến' }}</span>
                                                                                </p>
                                                                                <p>Mã giảm giá: <span
                                                                                        class="data-span">{{ $magiamgia }}</span>
                                                                                </p>


                                                                            </td>


                                                                            <td class="text-center">
                                                                                @if ($row->trangthai_thanhtoan != 0)
                                                                                    
                                                                                    
                                                                                    @if ($row->thanhtoan == 0)
                                                                                        @if ($row->trangthai_thanhtoan != 1)
                                                                                            {{-- <p class="badge badge-primary"><a href="{{ route('orderticket.updatepayment', ['id'=>$row->idve, 'act'=>1]) }}"><span class="  a-link"> Xác nhận thanh toán</span></a></p> --}}
                                                                                            <p class=""
                                                                                                id="btn-payment-confirm"><a
                                                                                                    href="{{ route('orderticket.updatepayment', ['id' => $row->idve, 'act' => 1]) }}"><span
                                                                                                        class="badge badge-primary a-link py-2 px-3">
                                                                                                        Xác nhận thanh
                                                                                                        toán</span></a></p>
                                                                                        @endif
                                                                                    @endif
                                                                                    @if ($row->thanhtoan != '' && $row->trangthai_thanhtoan == 1)
                                                                                        <p class=" text- "> <span
                                                                                                class="text-success ">Đã xác
                                                                                                nhận thanh toán</span> </p>
                                                                                    @endif
                                                                                @else
                                                                                    <p class=" text- "> <span
                                                                                        class="text-light ">Chưa thanh toán</span> </p> 
                                                                                @endif


                                                                            </td>
                                                                            <td class="text-center" id="tdstatus">
                                                                                <p class="badge badge-primary a-link"
                                                                                    id="btn-ticket-confirm"
                                                                                    style="display: none">
                                                                                    <a href="{{ route('orderticket.updateticket', ['id' => $row->idve, 'act' => 1]) }}"
                                                                                        class="text-light font-weight-normal">
                                                                                        Xác nhận vé
                                                                                    </a>
                                                                                </p>
                                                                                @if ($row->trangthai == 0 && $row->trangthai_thanhtoan == 1)
                                                                                    <p class="badge badge-primary a-link "
                                                                                        id="btn-ticket-confirm">
                                                                                        <a href="{{ route('orderticket.updateticket', ['id' => $row->idve, 'act' => 1]) }}"
                                                                                            class="text-light font-weight-normal">
                                                                                            Xác nhận vé
                                                                                        </a>
                                                                                    </p>
                                                                                @endif
                                                                                @if ($row->trangthai == 2)
                                                                                    <p class="badge badge-primary"
                                                                                        id="btn-ticket-confirm">
                                                                                        <a
                                                                                            href="{{ route('orderticket.updateticket', ['id' => $row->idve, 'act' => 3]) }}">
                                                                                            <span class="a-link">
                                                                                                Xác nhận huỷ vé</span>
                                                                                        </a>
                                                                                    </p>
                                                                                @elseif($row->trangthai == 3 && $row->trangthai_thanhtoan == 1)
                                                                                    <p class=" text- "> <span
                                                                                            class="text-danger font-weight-bold">Đã
                                                                                            huỷ vé - hoàn tiền</span> </p>
                                                                                @endif
                                                                                @if ($row->trangthai == 1)
                                                                                    <p class="text-success font-weight-bold">
                                                                                        Đã xác nhận vé
                                                                                    </p>
                                                                                @endif


                                                                            </td>

                                                                        </tr>
                                                                        @if (count($userdata) > 0)
                                                                            <tr class="tr-user-detail-ticket">
                                                                                <td colspan="5">
                                                                                    <div class="div-user-detail-ticket">
                                                                                        <div class="row px-4">
                                                                                            @php
                                                                                                // dd($userdata[0]);
                                                                                                $tienve = 0;
                                                                                                foreach ($userdata as $key=>$value) {
                                                                                                    $tienve += $value->tienve;
                                                                                                }
                                                                                            @endphp
                                                                                            <h3
                                                                                                class="customer-info-h3 col-sm-6 text-left">
                                                                                                Thông tin khách hàng</h3>
                                                                                            <h3
                                                                                                class="customer-info-h3 col-sm-6 text-right">
                                                                                                Tổng tiền: <span
                                                                                                    class="text-danger">{{ number_format($tienve) }}</span>
                                                                                                VNĐ</h3>
                                                                                        </div>
                                                                                        <div class="w-100">
                                                                                            <table
                                                                                                class="table table-bordered table-round text-dark p-2 ">
                                                                                                <tr class="tr-user-detail">
                                                                                                    <th>STT</th>
                                                                                                    <th>Họ & Tên</th>
                                                                                                    <th>Giấy tờ tuỳ thân</th>
                                                                                                    <th>Thể loại</th>
                                                                                                    <th>Giá trị</th>
                                                                                                    <th>Tiền vé</th>
                                                                                                </tr>


                                                                                                @foreach ($userdata as $key => $us)
                                                                                                    <tr>

                                                                                                        <td
                                                                                                            class="text-center">
                                                                                                            {{ $key }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <p>Tên: <span
                                                                                                                    class="text-info">{{ $us->hotenkh }}</span>
                                                                                                            </p>
                                                                                                            <p>Giới tính:
                                                                                                                <span
                                                                                                                    class="text-info">
                                                                                                                    @if ($us->phai)
                                                                                                                        Nam
                                                                                                                    @else
                                                                                                                        Nữ
                                                                                                                    @endif
                                                                                                                </span>
                                                                                                            </p>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <p>ID: <span
                                                                                                                    class="text-info">{{ $us->giaytotuythan }}</span>
                                                                                                            </p>
                                                                                                            <p>Ngày sinh: <span
                                                                                                                    class="text-info">{{ $us->ngaysinh }}</span>
                                                                                                            </p>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <p>Loại vé:
                                                                                                                <span
                                                                                                                    class="text-info">
                                                                                                                    @if ($us->loaive)
                                                                                                                        Trẻ em
                                                                                                                    @else
                                                                                                                        Người
                                                                                                                        lớn
                                                                                                                    @endif
                                                                                                                </span>
                                                                                                            </p>
                                                                                                            @if ($us->loaima != null)
                                                                                                                <p>Loại mã:
                                                                                                                    <span
                                                                                                                        class="text-info">
                                                                                                                        @if ($us->loaima)
                                                                                                                            Phần
                                                                                                                            trăm
                                                                                                                            (%)
                                                                                                                        @else
                                                                                                                            Giá
                                                                                                                            tiền
                                                                                                                        @endif
                                                                                                                    </span>
                                                                                                                </p>
                                                                                                            @endif
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <p>SĐT: <span
                                                                                                                    class="text-info">{{ $us->sdt }}</span>
                                                                                                            </p>
                                                                                                            @if ($us->loaima != null)
                                                                                                                <p>Giá trị:
                                                                                                                    <span
                                                                                                                        class="text-info">
                                                                                                                        @if ($us->loaima)
                                                                                                                            {{ $us->giatri }}%
                                                                                                                        @else
                                                                                                                            {{ number_format($us->giatri) }}
                                                                                                                            VNĐ
                                                                                                                        @endif
                                                                                                                    </span>
                                                                                                                </p>
                                                                                                            @endif
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <span
                                                                                                                class="text-info">
                                                                                                                {{ number_format($us->tienve) }}
                                                                                                                VNĐ</span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                                {{-- <tr> 
                                                                                                            <td colspan="5" >
                                                                                                                <h3 class="font-weight-bolder" >TỔNG TIỀN: <span class="text-danger">{{number_format($tienve)}}</span> VNĐ</h3>    
                                                                                                            
                                                                                                            </td>     
                                                                                                        </tr> --}}

                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach

                                                                </tbody>
                                                                <tfoot>

                                                                </tfoot>
                                                            </table>



                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <h3>Không có vé</h3>
                                            @endif
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

            $("#div-dropdown").on('click', '#btn-user-dropdow', (function(e) {
                e.preventDefault();
                var node = $(this).parent().parent();
                var btn = $(node).next();
                console.log(btn)
                $(btn).toggle(200);


            }));

            $("#div-dropdown").on('click', '#btn-payment-confirm', (function(e) {
                e.preventDefault();
                var node = $(this).children();
                var a = $(this).children();
                var url = $(node).attr("href");

                var tr = $(this).parent().parent();
                var td = $(tr).children()[5];
                var p = $(td).children();
                $.get(url, function(data, status) {
                    $(a).html(data);
                    $(p).show();

                });
            }));

            $("#div-dropdown").on('click', '#btn-ticket-confirm', (function(e) {
                e.preventDefault();
                var node = $(this).children();
                var p = $(this).parent();
                var url = $(node).attr("href");

                // var tr = $(this).parent().parent();
                // var td = $(tr).children()[5];
                // var p = $(td).children();
                $.get(url, function(data, status) {
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
