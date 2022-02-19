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
                    <form>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="diemdi">Điểm đi</label>
                                        <input type="text" class="form-control" id="diemdi" name="diemdi"
                                            placeholder="Nhập điểm đi">
                                    </div>
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="form-control" rows="3" placeholder="Nhập mô tả"
                                            style="height: 40px;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="diemdi">Giá</label>
                                        <input type="number" class="form-control" id="gia" name="gia"
                                            placeholder="Nhập giá">
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Điểm đến">Điểm đến</label>
                                        <input type="text" class="form-control" id="diemden" placeholder="Nhập điểm đến">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control select2bs4" style="width: 100%;">
                                            <option selected="selected">Bãi biển</option>
                                            <option>Núi non</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="phuongtien">Phương tiện</label>
                                        <input type="text" class="form-control" data-role="tagsinput" id="phuongtien" name="phuongtien"
                                            placeholder="Nhập Phương tiện">
                                    </div>
                                </div>
                                {{-- col-6 --}}
                                <div class="col-sm-2"></div>
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
                                                            <span>Add files</span>
                                                        </span>
                                                        <button type="submit" class="btn btn-primary col start">
                                                            <i class="fas fa-upload"></i>
                                                            <span>Start upload</span>
                                                        </button>
                                                        <button type="reset" class="btn btn-warning col cancel">
                                                            <i class="fas fa-times-circle"></i>
                                                            <span>Cancel upload</span>
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
                                                            <span class="lead" data-dz-name></span> (
                                                            <span data-dz-size></span>)
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
                                                            <button class="btn btn-primary start">
                                                                <i class="fas fa-upload"></i>
                                                                <span>Start</span>
                                                            </button>
                                                            <button data-dz-remove class="btn btn-warning cancel">
                                                                <i class="fas fa-times-circle"></i>
                                                                <span>Cancel</span>
                                                            </button>
                                                            <button data-dz-remove class="btn btn-danger delete">
                                                                <i class="fas fa-trash"></i>
                                                                <span>Delete</span>
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

                        <div class="card-footer">asd
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
