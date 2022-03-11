@extends('layouts.admin_layout')

@section('web-title', 'Danh sách khách hàng')

@section('page-title','Danh sách khách hàng')

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
                            <h3 class="card-title"><a href="/admin/user/add-form" class="btn btn-block btn-primary">Thêm khách hàng mới</a></h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 50px">ID</th>
                                    <th>Tên khách hàng</th>
                                    <th>Mật khẩu</th>
                                    <th>Gmail</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Vai trò</th>
                                    <th style="width: 100px">Chỉnh sửa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->password }}</td>
                                        <td>{{ $user->gmail }}</td>
                                        <td><a href="{{ $user->avatar }}" target="_blank">
                                                <img src="{{ $user->avatar }}" width="40px">
                                            </a>
                                        </td>
                                        <td>{!! \App\Helpers\Helper::isAdmin($user->isAdmin) !!}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="/admin/user/edit/{{ $user->id }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm"
                                               onclick="removeRow({{ $user->id }}, '/admin/user/destroy')">
                                                <i class="fas fa-trash"></i>
                                            </a>
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


    {!! $data->links() !!}

    <script>
        $(document).ready(function(){
            $("#success").delay(3000).fadeOut(500);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function removeRow(id, url)
        {
            if (confirm('Bạn có chắc chắn muốn xóa hay không?')) {
                $.ajax({
                    type: 'DELETE',
                    datatype: 'JSON',
                    data: { id },
                    url: url,
                    success: function (result) {
                        if (result.error === false) {
                            alert(result.message);
                            location.reload();
                        } else {
                            alert('Xóa bị lỗi! Vui lòng thử lại');
                        }
                    }
                })
            }
        }
    </script>

@endsection
