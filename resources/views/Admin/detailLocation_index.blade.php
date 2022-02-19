@extends('layouts.admin_layout')
@section('page-title','Chi tiết địa điểm')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="" class="btn btn-block btn-primary">Thêm địa điểm mới</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="stt">STT</th>
                                        <th width="200px">idlocation</th>
                                        <th width="200px">Thời gian khởi hành</th>
                                        <th width="150px">Số chỗ</th>
                                        <th width="200px">idhdv</th>
                                        <th width="150px">Trạng thái</th>
                                        <th width="150px">Thay đổi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $r)

                                    @php
                                    $stt = 0;
                                    $stt ++;
                                        $anhien = $r->anhien;
                                    @endphp

                                    <tr class="location-tr">
                                        <td>{{$stt}}</td>
                                        <td>{{$r->idlocation}}</td>
                                        <td>
                                            <p>{{$r->giokhoihanh}} - {{\Carbon\Carbon::parse($r->ngaykhoihanh)->format('d/m/Y')}}</p>
                                        </td>
                                        <td>
                                            <p>{{$r->socho}}</p>
                                        </td>
                                        <td>
                                            <p>{{$r->idhdv}}</p>
                                        </td>
                                        <td>
                                            @if ($anhien)
                                            <p><span class="text-success font-weight-bold">Đang Hiện</span></p>
                                            @else
                                            <p><span class="text-danger font-weight-bold">Đang Ẩn</span></p>
                                            @endif
                                        </td>
                                        <td>
                                            <p class="edit-p">
                                                <span class="edit-span" alt="Chỉnh sửa dòng này" ><i class="bi bi-pencil-square"></i></span>
                                                --
                                                <span class="delete-span" alt="Xoá dòng này"><i class="bi bi-x-square"></i></span>
                                            </p>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>

                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

            </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
