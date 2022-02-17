@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title','Quản lý địa điểm') 
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
                                        <th width="200px">Địa điểm</th>
                                        <th width="200px">Giá vé</th>
                                        <th width="150px">Mô tả</th>
                                        <th width="200px">Phương tiện</th>
                                        <th width="150px">Hình ảnh</th>
                                        <th width="150px">Trạng thái</th>
                                        <th width="150px ">Thay đổi</th>


                                    </tr>
                                </thead>
                                <tbody>
                                   @php
                                       $stt = 0;
                                   @endphp
                                    @foreach ($data as $row)

                                    @php
                                    $stt ++;
                                        $image = explode(",",$row->image);
                                        $anhien = $row->anhien; 
                                    @endphp

                                    <tr class="location-tr">
                                        <td>{{$stt}}</td>
                                        <td>
                                            <p>
                                                Đi: <span class="data-span">{{$row->diemdi}}</span>
                                            </p>
                                            <p>
                                                Đến: <span class="data-span">{{$row->diemden}} </span>
                                            </p>
                                        </td>
                                        <td>
                                            <p>Giá: <span class="data-span text-danger">{{number_format($row->giavetb)}}đ</span></p>
                                            <p>Tgian: <span class="data-span">{{$row->time}} </span> </p>
                                        </td>
                                        <td>
                                            <textarea  class="mota" id="" readonly cols="30" rows="4">{{$row->mota}}</textarea>
                                        </td>
                                        <td>
                                            <p>PT: <span class="data-span">{{$row->phuongtien}}</span></p>
                                            <p>Loại: <span class="data-span">Bãi biển</span></p>
                                        </td>
                                        <td>
                                            <img src="{{$image[0]}}"
                                                width="150px" alt="">
                                        </td>
                                        <td>
                                            @if ($anhien)
                                            <p><span class="text-success font-weight-bold">Đang Hiện</span></p>
                                            @else
                                            <p><span class="text-danger font-weight-bold">Đang Ẩn</span></p>
                                            @endif
                                            <p>Thứ tự: <span class="font-weight-bold">{{$row->top}}</span> </p>
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
                         
                            <div class="div-paginate">
                                {{$data->links('vendor.pagination.bootstrap-4')}}
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
