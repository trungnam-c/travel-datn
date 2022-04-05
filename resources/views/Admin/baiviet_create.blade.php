@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Thêm mã giảm giá')
@section('main')
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="card card-primary col-sm-12">
                <div class="card-header">
                    <h3 class="card-title">Thêm bài viết mới</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('baiviet.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("post")
                    <input type="hidden" name="images" value="{{old('images')}}" id="images">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Chọn danh mục</label>
                                        <select class="form-control select2bs4" name="iddm" style="width: 100%;">
                                           @foreach ($cate as $item)
                                           <option value="{{$item->id}}">{{$item->name}}</option>
                                           @endforeach

                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label for="diemdi">Tiêu đề</label>
                                    <input type="text" class="form-control" id="tieude" name="tieude"
                                        placeholder="Nhập tiêu đề">
                                    @if ($errors->has('tieude'))
                                    <span class="badge badge-danger">{{ $errors->first('tieude') }}</span>
                                    @endif
                                </div>
                                <!-- textarea -->
                                <!-- <div class="form-group">
                                    <label>Chi tiết</label>
                                    <textarea class="form-control" rows="3" placeholder="Nhập chi tiết" id="chitiet"
                                        name="chitiet" style="height: 40px;"></textarea>
                                    @if ($errors->has('chitiet'))
                                    <span class="badge badge-danger">{{ $errors->first('chitiet') }}</span>
                                    @endif

                                </div> -->
                                <label> Nhập nội dung :</label>
                                <x-forms.tinymce-editor/>
                            </div>
                            {{-- col-6 --}}
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">Hình ảnh</h3>
                                        </div>
                                        <div class="card-body">
                                            <div   class="row image-preview" id="image-preview">
                                                @if (old("images") != null)
                                                @php
                                                $index=0;
                                                    $images = explode(",",old('images'));
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
                                                @endif
                                            </div>


                                        </div>
                                        <div class="card-footer">
                                            @error('images')
                                                <span class="badge badge-danger ">{{$message}}</span>
                                            @enderror
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
                                <!-- @error('images')
                                                <p class="alert alert-danger">{{ $message }}</p>
                                            @enderror -->
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