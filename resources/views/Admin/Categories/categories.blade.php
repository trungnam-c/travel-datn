@extends('layouts.admin_layout')
@section('categories-active', 'active')
@section('page-title', 'Quản lý danh mục')

@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="{{ route('categories.add_form') }}" class="btn btn-block btn-primary">Thêm danh mục mới</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="stt">STT</th>
                                        <th width="200px">Tên danh mục</th>
                                        <th width="200px">Hình ảnh</th>
                                        <th width="150px">Ẩn/Hiện</th>
                                        <th width="200px">Tùy chỉnh</th>


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
                                        @endphp

                                        <tr class="location-tr">
                                            <td>{{ $stt }}</td>
                                            <td>
                                            <p>
                                                    Đến: <span class="data-span">{{ $row->name }} </span>
                                                </p>
                                            </td>
                                            <td>
                                                
                                                        <img src="{{$row->image}}" width="150px" alt="">
                                                 

                                            </td>
                                            <td>
                                                @if ($anhien === 1)
                                                    <p><span class="text-success font-weight-bold">Đang Hiện</span></p>
                                                @else
                                                    <p><span class="text-danger font-weight-bold">Đang Ẩn</span></p>
                                                @endif
                                                <p>Thứ tự: <span class="font-weight-bold">{{ $row->anhien }}</span> </p>
                                            </td>
                                            <td>
                                                <p class="edit-p">
                                                    <a href="{{ route('categories.edit', ['id'=>$row->id]) }}"><span class="edit-span" alt="Chỉnh sửa dòng này"><i
                                                        class="bi bi-pencil-square"></i></span></a>
                                                    --
                                                    <a class="delete" href="/categories/delete/{{$row->id}}"><span class="delete-span" alt="Xoá dòng này"><i
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
        text: "Muốn xóa danh mục này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Vâng, Xóa nó!',
        cancelButtonText: 'Hủy',
    }).then((result) => {
        if (result.isConfirmed === true) {
            location.href = self.attr('href');
        }
    })
})
</script>
@endsection
