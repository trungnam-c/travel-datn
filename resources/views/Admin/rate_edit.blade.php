@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Sửa bình luận')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="card card-primary col-sm-12">
                    <div class="card-header">
                        <h3 class="card-title">Sửa bình luận</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('rate.update',['id'=>$data->idrate]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("post")
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Người bình luận</label>
                                        <input type="text" class="form-control" disabled value="{{$data->name}}" id="name" name="name"
                                            placeholder="">

                                    </div>
                                </div>                             
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                <label> Nội dung: </label>
                                <div>
                                <textarea disabled class="form-control" name="noidung">{{$data->comment}}</textarea>
                                </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lydoan">Lý do ẩn</label>
                                        <input type="text" class="form-control" value="{{$data->lydoan}}" id="lydoan" name="lydoan"
                                            placeholder="">
                                            @if ($errors->has('lydoan'))
                                    <span class="badge badge-danger">{{ $errors->first('lydoan') }}</span>
                                    @endif

                                    </div>
                                </div>                             
                            </div>

                            <div class="row">
                                <div class="col-sm-6">

                                    <label for=""></label>
                                    <div class="custom-control custom-switch  mt-3">
                                        <!-- {{-- <input class="form-check-input" type="checkbox" role="switch" id="anhien" checked> --}} -->
                                        @if($data->anhien === 1)
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
