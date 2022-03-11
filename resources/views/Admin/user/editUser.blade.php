@extends('layouts.admin_layout')

@section('web-title', 'Chỉnh sửa khách hàng')

@section('page-title','Chỉnh sửa khách hàng')

@section('main')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên khách hàng</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Mật khẩu</label>
                        <input type="text" name="password" value="{{ $user->password }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Gmail</label>
                        <input type="text" name="gmail" value="{{ $user->gmail }}" class="form-control" >
                    </div>
                </div>
                
            </div>

            <div class="form-group">
                <label for="menu">Ảnh đại diện</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $user->avatar }}">
                        <img src="{{ $user->avatar }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="avatar" value="{{ $user->avatar }}" id="avatar">
            </div>


            <div class="form-group">
                <label>Vai trò</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="isAdmin" name="isAdmin"
                        {{ $user->isAdmin == 1 ? 'checked' : '' }}>
                    <label for="isAdmin" class="custom-control-label">Admin</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_admin" name="isAdmin"
                        {{ $user->isAdmin == 0 ? 'checked' : '' }}>
                    <label for="no_admin" class="custom-control-label">Khách hàng</label>
                </div>
            </div>

        </div>

        @include('admin/user.alert')

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        @csrf
    </form>
@endsection

