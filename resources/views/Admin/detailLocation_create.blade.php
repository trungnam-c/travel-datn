@extends('layouts.admin_layout')

@section('web-title', 'Thêm chi tiết địa điểm mới')

@section('page-title','Thêm chi tiết địa điểm')

@section('main')
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thêm chi tiết địa điểm mới</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('detailLocation.add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="diadiem">Địa điểm</label>
                                        <select name="idlocation" id="idlocation" class="form-control select2bs4">
                                            <option value="0" disabled selected>-- Chọn địa điểm --</option>
                                            @foreach ($location as $r)
                                            <option value="{{$r->id}}">Đi: {{$r->diemdi}} | Đến: {{$r->diemden}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('idlocation')
                                        <span class="badge badge-danger">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="ngaykhoihanh">Ngày khởi hành</label>
                                        <input type="date" class="form-control" id="ngaykhoihanh" name="ngaykhoihanh"
                                            min="2022-02-01">
                                        @error('ngaykhoihanh')
                                        <span class="badge badge-danger">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="giokhoihanh">Giờ khởi hành</label>
                                        <input type="text" class="form-control" id="giokhoihanh" name="giokhoihanh"
                                            placeholder="14h50">
                                        @error('giokhoihanh')
                                        <span class="badge badge-danger">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="socho">Số chỗ</label>
                                        <input type="number" class="form-control" min="0" id="socho" name="socho"
                                            placeholder="Số chỗ ngồi"
                                            oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                                        @error('socho')
                                        <span class="badge badge-danger">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="idhdv">Hướng dẫn viên</label>
                                        <select name="idhdv" id="idhdv" class="form-control select2bs4">
                                            <option value="0" disabled selected>-- Chọn hướng dẫn viên --</option>
                                            @foreach ($hdv as $r)
                                            <option value="{{$r->id}}">{{$r->tenhdv}}</option>
                                            @endforeach
                                        </select>
                                        @error('idhdv')
                                        <span class="badge badge-danger">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">

                                        <label for=""></label>
                                        <div class="custom-control custom-switch  mt-3">
                                            <!-- {{-- <input class="form-check-input" type="checkbox" role="switch" id="anhien" checked> --}} -->

                                            @if($location[0]->anhien === 0)
                                            <input type="checkbox" class="custom-control-input" checked value="0"
                                                id="anhien" name="anhien">
                                            @else
                                            <input type="checkbox" class="custom-control-input" value="0" id="anhien"
                                                name="anhien">
                                            @endif
                                            <label class="custom-control-label" for="anhien"> Chọn để ẩn </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="giokhoihanh">Vé người lớn</label>
                                    <input type="number" class="form-control" id="venguoilon" name="venguoilon"
                                        placeholder="1000000">
                                    @error('venguoilon')
                                    <span class="badge badge-danger">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label for="giokhoihanh">Vé trẻ em</label>
                                    <input type="number" class="form-control" id="vetreem" name="vetreem"
                                        placeholder="700000">
                                    @error('vetreem')
                                    <span class="badge badge-danger">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>


                                @if (\Session::has('success'))
                                <div class="col-sm-12 alert alert-success" id="success">
                                    {!! \Session::get('success') !!}
                                </div>
                                @endif

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <p class="text-danger font-weight-bold" id="tb-btn"></p>

                            <button type="submit" class="btn btn-primary" id="btn-submit-loca">Thêm mới</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>

        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<script>
$(document).ready(function() {
    $("#success").delay(3000).fadeOut(500);
});
document.getElementById("socho").min = 0;
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
var yyyy = today.getFullYear();
if (dd < 10) {
    dd = '0' + dd
}
if (mm < 10) {
    mm = '0' + mm
}
today = yyyy + '-' + mm + '-' + dd;
document.getElementById("ngaykhoihanh").setAttribute("min", today);
</script>


@endsection