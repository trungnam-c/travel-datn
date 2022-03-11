@extends('layouts.admin_layout')
@section('magiamgia-active', 'active')
@section('page-title', 'Quản lý mã giảm giá')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="{{ route('magiamgia.create') }}" class="btn btn-block btn-primary">Thêm mã giảm giá mới</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="stt">STT</th>
                                        <th width="200px">Mã giảm giá</th>
                                        <th width="200px">Chi tiết</th>
                                        <th width="150px">Ngày bắt đầu</th>
                                        <th width="200px">Ngày kết thúc</th>
                                        <th width="150px">Loại mã</th>
                                        <th width="150px">Giá trị</th>
                                        <th width="150px ">Ẩn hiện</th>
                                        <th width="150px ">Thay đổi</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 0;
                                    @endphp
                                    @foreach ($data as $row)
                                        @php
                                            $stt++;
                                            $anhien = $row->anhien;
                                        @endphp

                                        <tr class="location-tr">
                                            <td>{{ $stt }}</td>
                                            <td>
                                                
                                                    <span class="data-span">{{ $row->magiamgia }}</span>
                                            </td>
                                            <td>
                                                    <span class="data-span">{{ $row->chitiet }} </span>
                                               
                                            </td>
                                            <td>
                                            <span class="data-span">{{ $row->ngaybatdau }} </span>

                                            </td>
                                            <td>
                                            <span class="data-span">{{ $row->ngayketthuc }} </span>

                                            </td>
                                            <td>
                                                @if ($row->loaima == 1)
                                            <span class="data-span"> Đang hiện</span>
                                                @else
                                                <span class="data-span"> Đang ẩn</span>
                                            @endif
                                            </td>

                                            <td>
                                            <span class="data-span">{{ $row->giatri }} </span>

                                            </td>
                                            <td>
                                                @if ($anhien)
                                                    <p><span class="text-success font-weight-bold">Đang Hiện</span></p>
                                                @else
                                                    <p><span class="text-danger font-weight-bold">Đang Ẩn</span></p>
                                                @endif
                                                <!-- <p>Thứ tự: <span class="font-weight-bold">{{ $row->top }}</span> </p> -->
                                            </td>         
                                            <td>
                                            <p class="edit-p">
                                                    <a href="{{ route('magiamgia.edit', ['id'=>$row->id]) }}"><span class="edit-span" alt="Chỉnh sửa dòng này"><i
                                                        class="bi bi-pencil-square"></i></span></a>
                                                    --
                                                    <a href="{{ route('magiamgia.delete', ['id'=>$row->id]) }}"><span class="delete-span" alt="Xoá dòng này"><i
                                                        class="bi bi-x-square"></i></span></a>
                                                </p>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>

                        </div>

                        <div class="div-paginate">
                            {{ $data->links('vendor.pagination.bootstrap-4') }}
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
