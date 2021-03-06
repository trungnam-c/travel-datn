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
                <form action="{{ route('magiamgia.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("post")
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="diemdi">Mã giảm giá</label>
                                    <input type="text" class="form-control" id="magiamgia" name="magiamgia"
                                        placeholder="Nhập mã giảm giá">
                                    @if ($errors->has('magiamgia'))
                                    <span class="badge badge-danger">{{ $errors->first('magiamgia') }}</span>
                                    @endif
                                </div>
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Chi tiết</label>
                                    <textarea class="form-control" rows="3" placeholder="Nhập chi tiết" id="chitiet"
                                        name="chitiet" style="height: 40px;"></textarea>
                                    @if ($errors->has('chitiet'))
                                    <span class="badge badge-danger">{{ $errors->first('chitiet') }}</span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label for="diemdi">Loại mã</label>
                                    <div class="card-body d-flex justify-content-start col-md-8 align-items-center">
                                        <label for="show" class=" mb-0 mr-3">Theo giá</label>
                                        <input class="form-check" type="radio" value="0" id="show" name="loaima"
                                            placeholder="..." />
                                        <label for="hide" class=" mb-0 mr-3 ml-3">Theo %</label>
                                        <input class="form-check" type="radio" value="1" id="hide" name="loaima"
                                            placeholder="..." />
                                    </div>
                                    @if ($errors->has('loaima'))
                                    <span class="badge badge-danger">{{ $errors->first('loaima') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label for="diemdi">Giá trị</label>
                                    <input type="number" class="form-control" id="giatri" name="giatri"
                                        placeholder="Nhập giá">
                                    @if ($errors->has('giatri'))
                                    <span class="badge badge-danger">{{ $errors->first('giatri') }}</span>
                                    @endif

                                </div>
                                <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker"
                                    inline="true">
                                    <input placeholder="Select date" type="date" id="ngaybatdau" name="ngaybatdau"
                                        class="form-control">
                                    <label for="example">Ngày bắt đầu</label>
                                    <i class="fas fa-calendar input-prefix"></i>
                                    @if ($errors->has('ngaybatdau'))
                                    <span class="badge badge-danger">{{ $errors->first('ngaybatdau') }}</span>
                                    @endif
                                </div>
                                <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker"
                                    inline="true">
                                    <input placeholder="Select date" type="date" id="ngayketthuc" name="ngayketthuc"
                                        class="form-control">
                                    <label for="example">Ngày kết thúc</label>
                                    <i class="fas fa-calendar input-prefix"></i>
                                    @if ($errors->has('ngayketthuc'))
                                    <span class="badge badge-danger">{{ $errors->first('ngayketthuc') }}</span>
                                    @endif

                                </div>

                            </div>
                            {{-- col-6 --}}
                            <div class="col-sm-2"></div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>

                </form>
            </div>

        </div>

        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection
