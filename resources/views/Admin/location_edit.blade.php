@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Sửa địa điểm')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="card card-primary col-sm-12">
                    <div class="card-header">
                        <h3 class="card-title">Sửa địa điểm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('location.update',['id'=>$data->id]) }}" method="post" class="dropzone" id="dropzone" enctype="multipart/form-data">
                        @csrf
                        @method("post")
                        <input type="hidden" name="images" value="{{$data->image}}" id="images">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="diemdi">Điểm đi</label>
                                        <input type="text" class="form-control" value="{{$data->diemdi}}" id="diemdi" name="diemdi"
                                            placeholder="Nhập điểm đi">
                                    </div>
                                    <div class="form-group">
                                        <label for="phuongtien">Phương tiện</label>
                                        <input type="text" class="form- " data-role="tagsinput" value="{{$data->phuongtien}}" id="phuongtien"
                                            name="phuongtien" placeholder="Nhập Phương tiện">
                                    </div>



                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Điểm đến">Điểm đến</label>
                                        <input type="text" class="form-control" id="diemden" value="{{$data->diemden}}" name="diemden" placeholder="Nhập điểm đến">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control select2bs4" name="category" style="width: 100%;">
                                            @foreach ($cate as $item)
                                           <option  @if ($data->category == $item->name)
                                               selected
                                           @endif value="{{$item->id}}">{{$item->name}}</option>
                                           
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
                                        <input type="number" class="form-control" id="giavetb"  value="{{$data->giavetb}}" name="giavetb"
                                            placeholder="Nhập giá">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="top">Vị trí xuất hiện</label>
                                        <input type="number" class="form-control" id="top" value="{{$data->top}}" name="top"
                                            placeholder="Nhập vị trí xuất hiện">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">

                                <div class="col-sm-6 mb-5">
                                    <div class="form-group">
                                        <label>Thời gian:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                            <input type="text" value="{{$data->time}}" class="form-control float-right" name="time" id="reservationtime">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-5">
                                    
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="form-control" rows="3" name="mota" placeholder="Nhập mô tả"
                                            style="height: 100px;">{{$data->mota}}</textarea>
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
                                                @php
                                                $index=0;
                                                    $images = explode(",",$data->image);
                                                @endphp
                                                @foreach ($images as $img)
                                                
                                                @if ($img!="")
                                                <div class="col-md-2 mt-2" >
                                                    <div class="img-div-pre">
                                                        <div class="nano-div"></div>
                                                        <div class="delete-js-btn" id-data="{{$index}}" id="delete-js-btn"><i class="bi bi-trash3"></i></div>
                                                        <img src="{{$img}}" width="100%" height="100%" alt="">
                                                    </div>
                                                </div> 
                                                @endif
                                                @php
                                                    $index++;
                                                @endphp
                                                @endforeach 
                                                 
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
