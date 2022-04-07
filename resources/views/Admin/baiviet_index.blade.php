@extends('layouts.admin_layout')
@section('baiviet-active', 'active')
@section('page-title', 'Quản lý bài viết')
@section('main')
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><a href="{{ route('baiviet.create') }}"
                                class="btn btn-block btn-primary">Thêm bài viết mới</a></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="stt">STT</th>
                                    <th width="200px">Danh mục</th>
                                    <th width="200px">Hình ảnh</th>
                                    <th width="200px">Người cập nhật cuối</th>
                                    <th width="150px">Tiêu đề</th>
                                    <th width="200px">Ngày đăng</th>
                                    <th width="150px ">Ẩn hiện</th>
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
                                $anhien = $row->anhien;
                                $image = explode(',', $row->image);
                                @endphp

                                <tr class="location-tr">
                                    <td>{{ $stt }}</td>
                                    <td>

                                        <span class="data-span">{{ $row->danhmuc }}</span>
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
                                        <span class="data-span">{{ $row->username }} </span>

                                    </td>
                                    <td>
                                        <span class="data-span">{{ $row->tieude }} </span>

                                    </td>
                                    <td>
                                        <span class="data-span">{{ $row->ngaydang }} </span>

                                    </td>
                                    <td>
                                        @if ($anhien === 0)
                                        <p><span class="text-success font-weight-bold">Đang Hiện</span></p>
                                        @elseif($anhien === 1)
                                        <p><span class="text-danger font-weight-bold">Đang Ẩn</span></p>
                                        @endif
                                    </td>
                                    <td>
                                        <p class="edit-p">
                                            <a href="{{ route('baiviet.edit', ['id'=>$row->id]) }}"><span
                                                    class="edit-span" alt="Chỉnh sửa dòng này"><i
                                                        class="bi bi-pencil-square"></i></span></a>
                                            --
                                            <a class="delete"
                                                href="{{ route('baiviet.delete', ['id'=>$row->id]) }}"><span
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
<script>
var msg = '{{Session::get('
alert ')}}';
var exist = '{{Session::has('
alert ')}}';
if (exist) {
    alert(msg);
}
</script>
@endsection
@section('location-js')
<script type="text/javascript">
$('.delete').on('click', function(e) {
    e.preventDefault();
    var self = $(this);
    Swal.fire({
        title: 'Bạn chắc chắn?',
        text: "Muốn xóa danh mục này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Văng, xóa nó!',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed === true) {
            location.href = self.attr('href');
        }
    })
})
</script>
@endsection