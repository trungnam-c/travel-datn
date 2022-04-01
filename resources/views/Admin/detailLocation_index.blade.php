@extends('layouts.admin_layout')

@section('web-title', 'Chi tiết địa điểm')

@section('page-title','Chi tiết địa điểm')

@section('main')
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">

                @if (\Session::has('success'))
                <div class="col-sm-12 alert alert-success" id="success">
                    {!! \Session::get('success') !!}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><a href="{{ route('detailLocation.create') }}"
                                class="btn btn-block btn-primary">Thêm chi tiết địa điểm mới</a></h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="stt">STT</th>
                                    <th width="150px">Địa điểm</th>
                                    <th width="200px">Giá vé</th>
                                    <th width="200px">Mô tả</th>
                                    <th width="200px">Phương tiện</th>
                                    <th width="200px">Hình ảnh</th>
                                    <th width="170px">Thời gian khởi hành</th>
                                    <th width="80px">Số chỗ</th>
                                    <th width="150px">Hướng dẫn viên</th>
                                    <th width="100px">Trạng thái</th>
                                    <th width="100px">Thay đổi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $stt = 0; @endphp
                                @foreach ($data as $r)

                                @php
                                $stt ++;
                                $anhien = $r->anhien;
                                @endphp

                                <tr class="location-tr">
                                    <td>{{$stt}}</td>
                                    <td>
                                        <p>
                                            Đi: <span
                                                class="data-span">{{ DB::table("location")->where("id",$r->idlocation)->first()->diemdi }}</span>
                                        </p>
                                        <p>
                                            Đến: <span
                                                class="data-span">{{ DB::table("location")->where("id",$r->idlocation)->first()->diemden }}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                            Loại vé: <span class="data-span">Người lớn</span>
                                        </p>
                                        <p>
                                            Giá: <span
                                                class="data-span text-danger">{{number_format(DB::table('chitietloaive')->where('idlocation_detail',$r->id)->where('loaive',0)->first()->giave) }}đ</span>
                                        </p>
                                        <p>
                                            Loại vé: <span class="data-span">Trẻ em</span>
                                        </p>
                                        <p>
                                            Giá: <span
                                                class="data-span text-danger">{{number_format(DB::table('chitietloaive')->where('idlocation_detail',$r->id)->where('loaive',1)->first()->giave)}}đ</span>
                                        </p>
                                        <p>
                                            Tgian: <span
                                                class="data-span">{{ DB::table("location")->where("id",$r->idlocation)->first()->time }}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <textarea class="mota" style="background-color: unset;" id="" readonly cols="30"
                                            rows="4">{{ DB::table("location")->where("id",$r->idlocation)->first()->mota }}</textarea>
                                    </td>
                                    <td>
                                        <p>
                                            PT: <span
                                                class="data-span">{{ DB::table("location")->where("id",$r->idlocation)->first()->phuongtien }}</span>
                                        </p>
                                        <p>
                                            Loại: <span
                                                class="data-span">{{ DB::table('categories')->where("id",DB::table("location")->where("id",$r->idlocation)->first()->category)->first()->name }}</span>
                                        </p>
                                    </td>
                                    <td>
                                        @php
                                        $image = explode(',',
                                        DB::table("location")->where("id",$r->idlocation)->first()->image);
                                        @endphp
                                        @foreach ($image as $item)
                                        @if ($item != "")
                                        <img src="{{$item}}" class="d-block w-100" alt="...">
                                        @break
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <p>
                                            Giờ: <span class="data-span">{{$r->giokhoihanh}}</span>
                                        </p>
                                        <p>
                                            Ngày: <span
                                                class="data-span">{{\Carbon\Carbon::parse($r->ngaykhoihanh)->format('d/m/Y')}}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <p>{{$r->socho}}</p>
                                    </td>
                                    <td>
                                        <p>{{ DB::table("huongdanvien")->where("id",$r->idhdv)->first()->tenhdv }}</p>
                                    </td>
                                    <td>
                                        @if ($anhien !== 0)
                                        <p><span class="text-success font-weight-bold">Hiện</span></p>
                                        @else
                                        <p><span class="text-danger font-weight-bold">Ẩn</span></p>
                                        @endif
                                    </td>
                                    <td>
                                        <p class="edit-p">
                                            <a href="{{ route('detailLocation.edit', ['id'=>$r->id]) }}"><span
                                                    class="edit-span" alt="Chỉnh sửa dòng này"><i
                                                        class="bi bi-pencil-square"></i></span></a>
                                            --
                                            <a class="delete"
                                                href="{{ route('detailLocation.destroy', ['id'=>$r->id]) }}"><span
                                                    class="delete-span" alt="Xoá dòng này"><i
                                                        class="bi bi-x-square"></i></span></a>
                                        </p>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

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
    $("#success").delay(3000).fadeOut(500);
});
</script>
@endsection
@section('location-js')
<script type="text/javascript">
$('.delete').on('click', function(e) {
    e.preventDefault();
    var self = $(this);
    Swal.fire({
        title: 'Bạn chắc chắn?',
        text: "Muốn xóa chi tiết địa điểm này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed === true) {
            location.href = self.attr('href');
        }
    })
})
</script>
@endsection
