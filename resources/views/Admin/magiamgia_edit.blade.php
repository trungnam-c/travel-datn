@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Sửa địa điểm')
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
                    <form action="{{ route('magiamgia.update',['id'=>$data->id]) }}" method="post" class="dropzone" id="dropzone" enctype="multipart/form-data">
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
                                        <label for="phuongtien">Ngày bắt đầu</label>
                                        <input type="text" class="form- " data-role="tagsinput" value="{{$data->ngaybatdau}}" id="ngaybatdau"
                                            name="ngaybatdau" placeholder="">
                                    </div>



                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Điểm đến">Chi tiết</label>
                                        <input type="text" class="form-control" id="chitiet" value="{{$data->chitiet}}" name="chitiet" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="phuongtien">Ngày kết thúc</label>
                                        <input type="text" class="form- " data-role="tagsinput" value="{{$data->ngayketthuc}}" id="ngayketthuc"
                                            name="ngayketthuc" placeholder="">
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
                                        {{-- <input class="form-check-input" type="checkbox" role="switch" id="anhien" checked> --}}
                                        <input type="checkbox" class="custom-control-input" @if ($data->anhien ==0)
                                        checked
                                    @endif  id="anhien" name="anhien">
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
