@extends('layouts.admin_layout')

@section('web-title', 'Chỉnh sửa khách hàng')

@section('page-title','Chỉnh sửa khách hàng')

@section('main')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên khách hàng</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') border border-danger @enderror">
                        @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>

                <input type="hidden" name="password" value="{{ $user->password }}">

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Mật khẩu</label>
                        <input type="text" name="password" value="{{ $user->password }}" class="form-control">
                        @error('password')
                                            <p class="alert alert-danger">{{ $message }}</p>
                                            @enderror
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Gmail</label>
                        <input type="text" name="gmail" value="{{ $user->gmail }}" class="form-control @error('gmail') border border-danger @enderror" >
                        @error('gmail')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>

            </div>
            <input type="hidden" name="images" value="{{$user->avatar}}" id="images">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Hình ảnh</h3>
                        </div>
                        <div class="card-body">
                            <div class="row image-preview" id="image-preview">
                                @php
                                $index=0;
                                $images = explode(",",$user->avatar);
                                @endphp
                                @foreach ($images as $img)

                                @if ($img!="")
                                <div class="col-md-2 mt-2">
                                    <div class="img-div-pre">
                                        <div class="nano-div"></div>
                                        <div class="delete-js-btn" id-data="{{$index}}" id="delete-js-btn">
                                            <i class="bi bi-trash3"></i>
                                        </div>
                                        <img src="{{$img}}" width="100%" height="100%" alt="">
                                    </div>
                                </div>
                                @endif
                                @php
                                $index++;
                                @endphp
                                @endforeach

                            </div>


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
                    @error('avatar')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <label>Vai trò</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="isAdmin" name="isAdmin"
                        {{ $user->isAdmin == 1 ? 'checked' : '' }}>
                    <label for="isAdmin" class="custom-control-label">Admin</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_admin" name="isAdmin"
                        {{ $user->isAdmin == 0 ? 'checked' : '' }}>
                    <label for="no_admin" class="custom-control-label">Khách hàng</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <p class="text-danger font-weight-bold" id="tb-btn"></p>
            <button type="submit" id="btn-submit-user" class="btn btn-primary">Cập nhật</button>
        </div>
        @csrf
    </form>
@endsection

@section('custom-scripts')
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
        document.getElementById("btn-submit-user").disabled = true;
        document.getElementById("tb-btn").innerText = "Vui lòng bấm tải ảnh lên trước!";

        // Hookup the start button
        file.previewElement.querySelector(".cancel").onclick = function() {

            myDropzone.enqueueFile(file)
        }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })
    var dataid = $("#image-preview").children().last().children().children()[1];
    var id = $(dataid).attr("id-data");
    id++;
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

        input.value += args[1] + ",";
        var node = document.createElement('div');
        var attr = document.createAttribute("class");
        attr.value = "col-md-2 mt-2";
        var e = '<div class="img-div-pre">' +
            '<div class="nano-div"></div>' +
            '<div class="delete-js-btn" id-data="' + id +
            '" id="delete-js-btn"><i class="bi bi-trash3"></i></div>' +
            '<img src="' + args[1] + '" width="100%" height="100%" alt="">' +
            '</div>';

        node.setAttributeNode(attr);
        id++;
        node.innerHTML = e;
        document.getElementById("image-preview").appendChild(node);

    });
    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
        document.getElementById("btn-submit-user").disabled = false;
        document.getElementById("tb-btn").innerText = "";
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
