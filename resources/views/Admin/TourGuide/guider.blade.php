@extends('layouts.admin_layout')
@section('guider-active', 'active')
@section('page-title', 'Quản lý hướng dẫn viên')

@section('main')
@php
use Illuminate\Support\Facades\DB;


@endphp
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="{{ route('guider.form_add') }}" class="btn btn-block btn-primary">Thêm hướng dẫn viên</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="stt">STT</th>
                                        <th width="200px">Hướng dẫn viên</th>
                                        <th width="200px">Giới tính</th>
                                        <th width="150px">Địa chỉ</th>
                                        <th width="200px">SDT</th>
                                        <th width="150px">Trạng thái</th>
                                        <th width="150px ">Thay đổi</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 0;
                                    @endphp
                                    @foreach ($items as $row)
                                        @php
                                            $stt++;
                                            $image = explode(',', $row->image);
                                            $anhien = $row->anhien;
                                        @endphp

                                        <tr class="location-tr">
                                            <td>{{ $stt }}</td>
                                            <td>
                                                <p>
                                                    <span class="data-span">{{ $row->tenhdv }}</span>
                                                </p>
                                            </td>
                                            <td>
                                                <p>
                                                    <span class="data-span">{{ $row->phai === 1 ? 'Nam' : 'Nữ' }}</span>
                                                </p>
                                            </td>
                                            <td>
                                                <p><span class="data-span">{{ $row->diachi }}</span></p>
                                            </td>
                                            <td>
                                                <p><span class="data-span">{{ $row->sdt }}</span></p>
                                            </td>
                                            <td>
                                                @if ($anhien === 1)
                                                    <p><span class="text-success font-weight-bold">Đang Hiện</span></p>
                                                @else
                                                    <p><span class="text-danger font-weight-bold">Đang Ẩn</span></p>
                                                @endif
                                                <p>Thứ tự: <span class="font-weight-bold">{{ $row->anhien }}</span> </p>
                                            </td>
                                            <td>
                                                <p class="edit-p">
                                                    <a href="{{ route('guider.edit', ['id'=>$row->id]) }}"><span class="edit-span" alt="Chỉnh sửa dòng này"><i
                                                        class="bi bi-pencil-square"></i></span></a>
                                                    --
                                                    <a onClick="return alert()->info('InfoAlert','Lorem ipsum dolor sit amet.')" href="{{ route('guider.delete', ['id'=>$row->id]) }}"><span class="delete-span" alt="Xoá dòng này"><i
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
                            {{ $items->links('vendor.pagination.bootstrap-4') }}
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
