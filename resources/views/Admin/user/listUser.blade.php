@extends('admin.dashboard')

@section('content')
    <table class="table">
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
        @foreach($users as $key => $user)
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

    {!! $users->links() !!}
@endsection


