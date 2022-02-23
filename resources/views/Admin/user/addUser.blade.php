@extends('admin.dashboard')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="text" name="password" value="{{ old('password') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gmail</label>
                        <input type="text" name="gmail" value="{{ old('gmail') }}" class="form-control">
                    </div>
                </div>
                
            </div>

            <div class="form-group">
                <label for="menu">Ảnh đại diện</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="avatar" id="avatar">
            </div>



            <div class="form-group">
                <label>Vai trò</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="isAdmin" name="isAdmin" checked="">
                    <label for="isAdmin" class="custom-control-label">Admin</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_admin" name="isAdmin" >
                    <label for="no_admin" class="custom-control-label">Khách hàng</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm User</button>
        </div>
        @csrf
    </form>
@endsection

