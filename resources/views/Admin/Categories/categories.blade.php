@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Quản lý danh mục')

@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="{{ route('categories.add_form') }}" class="btn btn-block btn-primary">Thêm địa điểm mới</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="stt">STT</th>
                                        <th width="200px">Tên danh mục</th>
                                        <th width="200px">Hình ảnh</th>
                                        <th width="150px">Ẩn/Hiện</th>
                                        <th width="200px">Tùy chỉnh</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 0;
                                    @endphp
                                    @foreach ($data as $row)
                                        @php
                                            $stt++;
                                            $image = explode(',', $row->image);
                                            $anhien = $row->anhien;
                                        @endphp

                                        <tr class="location-tr">
                                            <td>{{ $stt }}</td>
                                            <td>
                                            <p>
                                                    Đến: <span class="data-span">{{ $row->name }} </span>
                                                </p>
                                            </td>
                                            <td>
                                                @foreach ($image as $item)
                                                    @if ($item != "")
                                                        <img src="{{$item}}" width="150px" alt="">
                                                        @break
                                                    @endif
                                                @endforeach

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
                                                    <a href="{{ route('categories.edit', ['id'=>$row->id]) }}"><span class="edit-span" alt="Chỉnh sửa dòng này"><i
                                                        class="bi bi-pencil-square"></i></span></a>
                                                    --
                                                    <a href="{{ route('categories.delete', ['id'=>$row->id]) }}"><span class="delete-span" alt="Xoá dòng này"><i
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
