@extends('layouts.admin_layout')
@section('guider-active', 'active')
@section('page-title', 'Thêm hướng dẫn viên')
@section('web-title', 'Thêm hướng dẫn viên')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="card card-primary col-sm-12">
                    <div class="card-header">
                        <h3 class="card-title">Thêm hướng dẫn viên</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('guider.add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("post")
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="tenhdv">Tên hướng dẫn viên</label>
                                        <input type="text" class="form-control" value="" id="tenhdv" name="guiderName"
                                            placeholder="Nhập tên hướng dẫn viên">
                                            @if ($errors->has('guiderName'))
                                            <span class="badge badge-danger">{{ $errors->first('guiderName') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="">Giới tính</label>
                                        <div class="d-flex align-items-center">
                                            <label for="nam" class="pr-2 mb-0">Nam</label>
                                            <input type="radio" class="form-check" data-role="tagsinput" value="1" id="nam"
                                            name="guiderGender">
                                            <label for="nu" class="px-2 mb-0">Nữ</label>
                                            <input type="radio" class="form-check" data-role="tagsinput" value="0" id="nu"
                                            name="guiderGender">
                                        </div>
                                        @if ($errors->has('guiderGender'))
                                            <span class="badge badge-danger">{{ $errors->first('guiderGender') }}</span>
                                            @endif
                                    </div>
                                </div>
                                {{-- col-6 --}}
                                <div class="col-sm-2"></div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="diachi">Địa chỉ</label>
                                        <input type="text" class="form-control" id="diachi"  value="" name="guiderAddress"
                                            placeholder="Nhập địa chỉ">
                                            @if ($errors->has('guiderAddress'))
                                            <span class="badge badge-danger">{{ $errors->first('guiderAddress') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="sdt">Số điện thoại</label>
                                        <input type="number" class="form-control" id="sdt" value="" name="guiderPhone"
                                            placeholder="Nhập số điện thoại">
                                            @if ($errors->has('guiderPhone'))
                                            <span class="badge badge-danger">{{ $errors->first('guiderPhone') }}</span>
                                            @endif

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                        <label class="">Ẩn / Hiện</label>
                                        <div class="d-flex align-items-center">
                                            <label for="show" class="pr-2 mb-0">Hiện</label>
                                            <input type="radio" class="form-check" data-role="tagsinput" value="1" id="show"
                                            name="guiderStatus">
                                            <label for="hide" class="px-2 mb-0">Ẩn</label>
                                            <input type="radio" class="form-check" data-role="tagsinput" value="0" id="hide"
                                            name="guiderStatus">
                                        </div>
                                        @if ($errors->has('guiderStatus'))
                                            <span class="badge badge-danger">{{ $errors->first('guiderStatus') }}</span>
                                            @endif
                                    </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">

                            <button type="submit" class="btn btn-primary" id="btn-submit-loca" >Thêm mới</button>
                        </div>

                    </form>
                </div>

            </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>


@endsection
