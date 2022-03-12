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
                    <form action="{{ route('location.store') }}" method="post" class="dropzone" id="dropzone" enctype="multipart/form-data">
                        @csrf
                        @method("post")
                        <input type="hidden" name="images" value="{{old('images')}}" id="images">
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="diemdi">Điểm đi</label>
                                        <input type="text" class="form-control" value="{{old("diemdi")}}" id="diemdi" name="diemdi"
                                            placeholder="Nhập điểm đi">
                                            @error('diemdi')
                                                <span class="badge badge-danger ">{{$message}}</span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phuongtien">Phương tiện</label>
                                        <input type="text" class="form- " data-role="tagsinput" value="{{old("phuongtien")}}" id="phuongtien"
                                            name="phuongtien" placeholder="Nhập Phương tiện">
                                            @error('phuongtien')
                                                <span class="badge badge-danger ">{{$message}}</span>
                                            @enderror
                                    </div>



                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Điểm đến">Điểm đến</label>
                                        <input type="text" class="form-control" id="diemden" value="{{old("diemden")}}" name="diemden" placeholder="Nhập điểm đến">
                                        @error('diemden')
                                                <span class="badge badge-danger ">{{$message}}</span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control select2bs4" name="category" style="width: 100%;">
                                           @foreach ($data as $item)
                                           <option  value="{{$item->id}}">{{$item->name}}</option>
                                           
                                           @endforeach

                                        </select>
                                    </div>

                                </div>
                                {{-- col-6 --}}
                                <div class="col-sm-2"></div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="giavetb">Giá</label>
                                        <input type="number" class="form-control" id="giavetb"  value="{{old("giavetb")}}" name="giavetb"
                                            placeholder="Nhập giá">
                                            @error('giavetb')
                                                <span class="badge badge-danger ">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-5">
                                    
                                    <label for="">Vị trí xuất hiện</label>
                                    <div class="custom-control custom-switch  mt-0">
                                        <input type="checkbox" @if(old("top")) checked @endif class="custom-control-input" id="top" name="top">
                                        <label class="custom-control-label" for="top"> Chọn để lên top </label>
                                        @error('top')
                                                <span class="badge badge-danger ">{{$message}}</span>
                                            @enderror
                                      </div>
                                  
                                </div>
                                
                            </div>
                            <div class="row">

                                <div class="col-sm-6 mb-5">
                                    <div class="form-group">
                                        <label>Thời gian:</label>

                                        <div class="form-group">
                                            
                                            <input type="text" class="form-control float-right" value="{{old("time")}}" name="time"  >
                                            @error('time')
                                                <span class="badge badge-danger ">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-5">
                                    
                                    <label for=""></label>
                                    <div class="custom-control custom-switch  mt-3">
                                        <input type="checkbox" @if(old("anhien")) checked @endif class="custom-control-input" id="anhien" name="anhien">
                                        <label class="custom-control-label" for="anhien"> Chọn để ẩn </label>
                                        @error('anhien')
                                                <span class="badge badge-danger ">{{$message}}</span>
                                            @enderror
                                      </div>
                                  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="form-control" rows="3" name="mota" placeholder="Nhập mô tả"
                                            style="height: 100px;">{{old("mota")}}</textarea>
                                            @error('mota')
                                                <span class="badge badge-danger ">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">Hình ảnh</h3>
                                        </div>
                                        <div class="card-body">
                                            <div   class="row image-preview" id="image-preview">
                                                @if (old("images") != null)
                                                @php
                                                $index=0;
                                                    $images = explode(",",old('images'));
                                                @endphp
                                                @foreach ($images as $img)
                                                
                                                @if ($img!="")
                                                <div class="col-md-2 mt-2" >
                                                    <div class="img-div-pre">
                                                        <div class="nano-div"></div>
                                                        <div class="delete-js-btn" id-data="{{$index}}" id="delete-js-btn"><i class="bi bi-trash3"></i></div>
                                                        <img src="{{$img}}" width="100%" height="100%" alt="">
                                                    </div>
                                                </div> 
                                                @endif
                                                @php
                                                    $index++;
                                                @endphp
                                                @endforeach 
                                                @endif
                                            </div>
                                                  
                                            
                                        </div>
                                        <div class="card-footer">
                                            @error('images')
                                                <span class="badge badge-danger ">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <!-- /.card-body -->

                                    </div>
                                    <!-- /.card -->
                                </div>
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
                                                            <span>Thêm Ảnh</span>
                                                        </span>
                                                        <button type="button" class="btn btn-primary col start">
                                                            <i class="fas fa-upload"></i>
                                                            <span>Tải ảnh lên</span>
                                                        </button>
                                                        <button type="button" class="btn btn-warning col cancel">
                                                            <i class="fas fa-times-circle"></i>
                                                            <span>Huỷ toàn bộ</span>
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
                                                            <span class="lead" data-dz-name></span> 
                                                            <span data-dz-size></span>
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
                                                            <button data-dz-remove type="button" class="btn btn-warning cancel" id="cancel">
                                                                <i class="fas fa-times-circle"></i>
                                                                <span>Huỷ</span>
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

                        <div class="card-footer">
                            <p class="text-danger font-weight-bold" id="tb-btn"></p>

                            <button type="submit" class="btn btn-primary" id="btn-submit-loca" >Thêm mới</button>
                        </div>

                    </form>
                </div>

            </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    

@endsection

@section('location-js')
    <script>
        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/quantri/luu-hinh-anh", // Set the url
            headers: {
                'x-csrf-token': document.querySelector('input[name="_token"]').value,
            },
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            document.getElementById("btn-submit-loca").disabled=true;
            document.getElementById("tb-btn").innerText="Vui lòng bấm tải ảnh lên trước!";

            // Hookup the start button
            file.previewElement.querySelector(".cancel").onclick = function() {

                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })
        let iddata = 0;
        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"

            // And disable the start button
            // file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })
        myDropzone.on('success', function() {
            var args = Array.prototype.slice.call(arguments);
            // Look at the output in you browser console, if there is something interesting

            var input = document.querySelector("input[name='images']");
             var id = iddata ;

            input.value += args[1]+",";
            var node = document.createElement('div');
            var attr = document.createAttribute("class");
            attr.value = "col-md-2 mt-2";
            var e =     '<div class="img-div-pre">'+
                            '<div class="nano-div"></div>'+
                            '<div class="delete-js-btn" id-data="'+id+'" id="delete-js-btn"><i class="bi bi-trash3"></i></div>'+
                            '<img src="'+args[1]+'" width="100%" height="100%" alt="">'+
                        '</div>';

            node.setAttributeNode(attr);
            iddata++;
            node.innerHTML =e;
            document.getElementById("image-preview").appendChild(node);

            });
        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
            document.getElementById("btn-submit-loca").disabled=false;
            document.getElementById("tb-btn").innerText="";
            myDropzone.removeAllFiles(true);



        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {



            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true) 
        }
        // DropzoneJS Demo Code End
    </script>
@endsection