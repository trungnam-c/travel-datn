@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Thêm mã giảm giá')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="card card-primary col-sm-12">
                    <div class="card-header">
                        <h3 class="card-title">Thêm mã giảm giá mới</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="diemdi">Mã giảm giá</label>
                                        <input type="text" class="form-control" id="magiamgia" name="magiamgia"
                                            placeholder="Nhập mã giảm giá">
                                    </div>
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Chi tiết</label>
                                        <textarea class="form-control" rows="3" placeholder="Nhập chi tiết"
                                            style="height: 40px;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="diemdi">Giá</label>
                                        <input type="number" class="form-control" id="gia" name="gia"
                                            placeholder="Nhập giá">
                                    </div>
                                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker" inline="true">
                                    <input placeholder="Select date" type="text" id="example" class="form-control">
                                    <label for="example">Ngày bắt đầu</label>
                                    <i class="fas fa-calendar input-prefix"></i>
                                    </div>
                                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker" inline="true">
                                    <input placeholder="Select date" type="text" id="example" class="form-control">
                                    <label for="example">Ngày kết thúc</label>
                                    <i class="fas fa-calendar input-prefix"></i>
                                    </div>

                                </div>
                                {{-- col-6 --}}
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>

            </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
