@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Sửa Danh mục bài viết')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="card card-primary col-sm-12">
                    <div class="card-header">
                        <h3 class="card-title">Sửa Danh mục bài viết</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('danhmucbaiviet.update',['id'=>$data->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("post")
                        <!-- <input type="hidden" name="images" value="{{$data->image}}" id="images"> -->
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="diemdi">Tên danh mục bài viết</label>
                                        <input type="text" class="form-control" value="{{$data->name}}" id="name" name="name"
                                            placeholder="">
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
