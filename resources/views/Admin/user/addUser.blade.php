@extends('layouts.admin_layout')

@section('web-title', 'Thêm khách hàng mới')

@section('page-title','Thêm khách hàng')

@section('main')

    <section class="content">
        <div class="container-fluid">
            <div class="row"> 

                <div class="col-sm-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm khách hàng mới</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
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

                                {{-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Hình ảnh</h3>
                                            </div>
                                            <div class="card-body">
                                                <div   class="row image-preview" id="image-preview">
    
                                                </div>
    
    
                                            </div>
                                            <!-- /.card-body -->
    
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Chọn hình ảnh</h3>
                                            </div>
                                            <div class="card-body">
                                                <div id="actions" class="row">
                                                    <div class="col-lg-6">
                                                        <div class="btn-group w-100">
                                                            <span class="btn btn-success col fileinput-button">
                                                                <i class="fas fa-plus"></i>
                                                                <span>Thêm ảnh</span>
                                                            </span>
                                                            <button type="button" class="btn btn-primary col start">
                                                                <i class="fas fa-upload"></i>
                                                                <span>Tải ảnh lên</span>
                                                            </button>
                                                            <button type="button" class="btn btn-warning col cancel">
                                                                <i class="fas fa-times-circle"></i>
                                                                <span>Huỷ toàn bộ</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 d-flex align-items-center">
                                                        <div class="fileupload-process w-100">
                                                            <div id="total-progress" class="progress progress-striped active"
                                                                role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                                aria-valuenow="0">
                                                                <div class="progress-bar progress-bar-success" style="width:0%;"
                                                                    data-dz-uploadprogress></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table table-striped files" id="previews">
                                                    <div id="template" class="row mt-2">
                                                        <div class="col-auto">
                                                            <span class="preview"><img src="data:," alt=""
                                                                    data-dz-thumbnail /></span>
                                                        </div>
                                                        <div class="col d-flex align-items-center">
                                                            <p class="mb-0">
                                                                <span class="lead" data-dz-name></span>
                                                                <span data-dz-size></span>
                                                            </p>
                                                            <strong class="error text-danger" data-dz-errormessage></strong>
                                                        </div>
                                                        <div class="col-4 d-flex align-items-center">
                                                            <div class="progress progress-striped active w-100"
                                                                role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                                aria-valuenow="0">
                                                                <div class="progress-bar progress-bar-success" style="width:0%;"
                                                                    data-dz-uploadprogress></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto d-flex align-items-center">
                                                            <div class="btn-group">
                                                                <button data-dz-remove type="button" class="btn btn-warning cancel" id="cancel">
                                                                    <i class="fas fa-times-circle"></i>
                                                                    <span>Huỷ</span>
                                                                </button>
    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
    
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div> --}}



                                

                            </div>
                            @include('admin/user.alert')

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btn-submit-loca">Thêm</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>

            </div>

        <!-- /.row -->
        </div>
    <!-- /.container-fluid -->
    </section>
@endsection

