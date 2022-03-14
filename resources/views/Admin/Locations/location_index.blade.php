@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Quản lý địa điểm')

@section('main')
@php
use Illuminate\Support\Facades\DB;


@endphp
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><a href="{{ route('location.create') }}"
                                class="btn btn-block btn-primary">Thêm địa điểm mới</a></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="stt">STT</th>
                                    <th width="200px">Địa điểm</th>
                                    <th width="200px">Giá vé</th>
                                    <th width="150px">Mô tả</th>
                                    <th width="200px">Phương tiện</th>
                                    <th width="150px">Hình ảnh</th>
                                    <th width="150px">Trạng thái</th>
                                    <th width="150px ">Thay đổi</th>


                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $stt = 0;
                                @endphp
                                @foreach ($data as $row)
                                @php
                                $stt++;
                                $image = explode(',', $row->image);
                                $anhien = $row->anhien;
                                @endphp

                                <tr class="location-tr">
                                    <td>{{ $stt }}</td>
                                    <td>
                                        <p>
                                            Đi: <span class="data-span">{{ $row->diemdi }}</span>
                                        </p>
                                        <p>
                                            Đến: <span class="data-span">{{ $row->diemden }} </span>
                                        </p>
                                    </td>
                                    <td>
                                        <p>Giá: <span
                                                class="data-span text-danger">{{ number_format($row->giavetb) }}đ</span>
                                        </p>
                                        <p>Tgian: <span class="data-span">{{ $row->time }} </span> </p>
                                    </td>
                                    <td>
                                        <textarea class="mota" id="" readonly cols="30"
                                            rows="4">{{ $row->mota }}</textarea>
                                    </td>
                                    <td>
                                        <p>PT: <span class="data-span">{{ $row->phuongtien }}</span></p>
                                        <p>Loại: <span
                                                class="data-span">{{   DB::table("categories")->where("id",$row->category)->first()->name}}</span>
                                        </p>
                                        <p class="btn btn-secondary"><i class="fa fa-car" aria-hidden="true"></i></p>
                                    </td>
                                    <td>
                                        @foreach ($image as $item)
                                        @if ($item != "")
                                        <img src="{{$item}}" width="150px" alt="">
                                        @break
                                        @endif
                                        @endforeach

                                    </td>
                                    <td>
                                        @if ($anhien)
                                        <p><span class="text-success font-weight-bold">Đang Hiện</span></p>
                                        @else
                                        <p><span class="text-danger font-weight-bold">Đang Ẩn</span></p>
                                        @endif
                                        <p>Thứ tự: <span class="font-weight-bold">{{ $row->top }}</span> </p>
                                    </td>
                                    <td>
                                        <p class="edit-p">
                                            <a href="{{ route('location.edit', ['id'=>$row->id]) }}"><span
                                                    class="edit-span" alt="Chỉnh sửa dòng này"><i
                                                        class="bi bi-pencil-square"></i></span></a>
                                            --
                                            <a class="delete"
                                                href="{{ route('location.destroy', ['id'=>$row->id]) }}"><span
                                                    class="delete-span" alt="Xoá dòng này"><i
                                                        class="bi bi-x-square"></i></span></a>
                                        </p>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>

                    </div>

                    <div class="div-paginate">
                        {{ $data->links('vendor.pagination.bootstrap-4') }}
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
@section('location-js')
<script type="text/javascript">
$('.delete').on('click', function(e) {
    e.preventDefault();
    var self = $(this);
    Swal.fire({
        title: 'Bạn chắc chắn?',
        text: "Muốn xóa địa điểm này!",
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