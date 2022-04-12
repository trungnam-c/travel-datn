@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Thêm danh mục bài viết')
@section('main')
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="card card-primary col-sm-12">
                <div class="card-header">
                    <h3 class="card-title">Thêm danh mục bài viết mới</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('danhmucbaiviet.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("post")
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="diemdi">Tên danh mục bài viết</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Nhập danh mục">
                                    @if ($errors->has('name'))
                                    <span class="badge badge-danger">{{ $errors->first('name') }}</span>
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