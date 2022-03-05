@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Thêm địa điểm')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="card card-primary col-sm-12">
                    <div class="card-header">
                        <h3 class="card-title">Thêm địa điểm mới</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('location.store') }}" method="post" class="dropzone" id="dropzone" enctype="multipart/form-data">
                        @csrf
                        @method("post")
                        <input type="hidden" name="images" value="{{old('images')}}" id="images">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="diemdi">Điểm đi</label>
                                        <input type="text" class="form-control" value="{{old("diemdi")}}" id="diemdi" name="diemdi"
                                            placeholder="Nhập điểm đi">
                                    </div>
                                    <div class="form-group">
                                        <label for="phuongtien">Phương tiện</label>
                                        <input type="text" class="form- " data-role="tagsinput" value="{{old("diemdi")}}" id="phuongtien"
                                            name="phuongtien" placeholder="Nhập Phương tiện">
                                    </div>



                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Điểm đến">Điểm đến</label>
                                        <input type="text" class="form-control" id="diemden" value="{{old("diemdi")}}" name="diemden" placeholder="Nhập điểm đến">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control select2bs4" name="category" style="width: 100%;">
                                           @foreach ($data as $item)
                                           <option  value="{{$item->id}}">{{$item->name}}</option>
                                           
                                           @endforeach

                                        </select>
                                    </div>

                                </div>
                                {{-- col-6 --}}
                                <div class="col-sm-2"></div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="giavetb">Giá</label>
                                        <input type="number" class="form-control" id="giavetb"  value="{{old("diemdi")}}" name="giavetb"
                                            placeholder="Nhập giá">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="top">Vị trí xuất hiện</label>
                                        <input type="number" class="form-control" id="top" value="{{old("top")}}" name="top"
                                            placeholder="Nhập vị trí xuất hiện">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">

                                <div class="col-sm-6 mb-5">
                                    <div class="form-group">
                                        <label>Thời gian:</label>

                                        <div class="input-group">
                                            
                                            <input type="text" class="form-control float-right" value="{{old("time")}}" name="time"  >
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-5">
                                    
                                    <label for=""></label>
                                    <div class="custom-control custom-switch  mt-3">
                                        <input type="checkbox" class="custom-control-input" id="anhien" name="anhien">
                                        <label class="custom-control-label" for="anhien"> Chọn để ẩn </label>
                                      </div>
                                  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="form-control" rows="3" name="mota" placeholder="Nhập mô tả"
                                            style="height: 100px;">{{old("diemdi")}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title"> Chọn hình ảnh</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="actions" class="row">
                                                <div class="col-lg-6">
                                                    <div class="btn-group w-100">
                                                        <span class="btn btn-success col fileinput-button">
                                                            <i class="fas fa-plus"></i>
                                                            <span>Thêm Ảnh</span>
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
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <p class="text-danger font-weight-bold" id="tb-btn"></p>

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
