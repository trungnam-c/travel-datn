@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Sửa mã giảm giá')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="card card-primary col-sm-12">
                    <div class="card-header">
                        <h3 class="card-title">Sửa mã giảm giá</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('magiamgia.update',['id'=>$data->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("post")
                        <!-- <input type="hidden" name="images" value="{{$data->image}}" id="images"> -->
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="diemdi">Mã giảm giá</label>
                                        <input type="text" class="form-control" value="{{$data->magiamgia}}" id="magiamgia" name="magiamgia"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker"
                                    inline="true">
                                    <input placeholder="Select date" type="date" value="{{date('yy-m-d',strtotime($data->ngaybatdau))}}" id="ngaybatdau" name="ngaybatdau"
                                        class="form-control">
                                    <label for="example">Ngày bắt đầu</label>
                                    <i class="fas fa-calendar input-prefix"></i>
                                    @if ($errors->has('ngaybatdau'))
                                    <span class="badge badge-danger">{{ $errors->first('ngaybatdau') }}</span>
                                    @endif
                                </div>
                                    </div>



                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Điểm đến">Chi tiết</label>
                                        <input type="text" class="form-control" id="chitiet" value="{{$data->chitiet}}" name="chitiet" placeholder="">
                                    </div>
                                    <div class="form-group">
                                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker"
                                    inline="true">
                                    <input placeholder="Select date" type="date" value="{{date('yy-m-d',strtotime($data->ngayketthuc))}}" id="ngayketthuc" name="ngayketthuc"
                                        class="form-control">
                                    <label for="example">Ngày kết thúc</label>
                                    <i class="fas fa-calendar input-prefix"></i>
                                    @if ($errors->has('ngayketthuc'))
                                    <span class="badge badge-danger">{{ $errors->first('ngayketthuc') }}</span>
                                    @endif

                                </div>
                                    </div>
                                </div>
                                {{-- col-6 --}}
                                <div class="col-sm-2"></div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="giavetb">Giá trị</label>
                                        <input type="number" class="form-control" id="giatri"  value="{{$data->giatri}}" name="giatri"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">

                                <label for="Điểm đến">Loại mã</label>
                                        <input type="text" class="form-control" id="loaima" value="{{$data->loaima}}" name="loaima" placeholder="">
                                        </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">

                                    <label for=""></label>
                                    <div class="custom-control custom-switch  mt-3">
                                        <!-- {{-- <input class="form-check-input" type="checkbox" role="switch" id="anhien" checked> --}} -->
                                        @if($data->anhien === 0)
                                        <input type="checkbox" class="custom-control-input"  value="0"  id="anhien" name="anhien">
                                        @else
                                        <input type="checkbox" class="custom-control-input" checked value="0"  id="anhien" name="anhien">
                                        @endif
                                        <label class="custom-control-label" for="anhien"> Chọn để ẩn </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <p class="text-danger font-weight-bold" id="tb-btn"></p>
                            <button type="submit" class="btn btn-primary" id="btn-submit-loca" >Cập nhật</button>
                        </div>

                    </form>
                </div>

            </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>


@endsection
