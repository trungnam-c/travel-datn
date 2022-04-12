@extends('layouts.admin_layout')
@section('location-active', 'active')
@section('page-title', 'Sửa bài viết')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="card card-primary col-sm-12">
                    <div class="card-header">
                        <h3 class="card-title">Sửa bài viết</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('baiviet.update',['id'=>$data->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("post")
                        <input type="hidden" name="images" value="{{$data->image}}" id="images">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                <div class="form-group">
                                        <label>Chọn danh mục</label>
                                        <select class="form-control select2bs4" name="iddm" style="width: 100%;">
                                           @foreach ($cate as $item)
                                           @if ($data -> iddm === $item->id)
                                           <option selected value="{{$item->id}}">{{$item->name}}</option>
                                           @else
                                           <option value="{{$item->id}}">{{$item->name}}</option>
                                           @endif
                                           @endforeach

                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="tieude">Tiêu đề</label>
                                        <input type="text" class="form-control" value="{{$data->tieude}}" id="tieude" name="tieude"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                <label> Nhập nội dung :</label>
                                <textarea id="default" name="noidung">{{$data->noidung}}</textarea>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">

                                    <label for=""></label>
                                    <div class="custom-control custom-switch  mt-3">
                                        <!-- {{-- <input class="form-check-input" type="checkbox" role="switch" id="anhien" checked> --}} -->
                                        @if($data->anhien === 1)
                                        <input type="checkbox" class="custom-control-input"  value="0"  id="anhien" name="anhien">
                                        @else
                                        <input type="checkbox" class="custom-control-input" checked value="0"  id="anhien" name="anhien">
                                        @endif
                                        <label class="custom-control-label" for="anhien"> Chọn để ẩn </label>
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
                                        <div class="row image-preview" id="image-preview">
                                            @if ($data->image != null)
                                            @php
                                            $index=0;
                                            $images = explode(",",$data->image);
                                            @endphp
                                            @foreach ($images as $img)

                                            @if ($img!="")
                                            <div class="col-md-2 mt-2">
                                                <div class="img-div-pre">
                                                    <div class="nano-div"></div>
                                                    <div class="delete-js-btn" id-data="{{$index}}" id="delete-js-btn">
                                                        <i class="bi bi-trash3"></i></div>
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
                                                        <button data-dz-remove type="button"
                                                            class="btn btn-warning cancel" id="cancel">
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
                            <!-- @error('images')
                                                <p class="alert alert-danger">{{ $message }}</p>
                                            @enderror -->
                        </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <p class="text-danger font-weight-bold" id="tb-btn"></p>
                            <button type="submit" class="btn btn-primary" id="btn-submit-loca" >Cập nhật</button>
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
    document.getElementById("btn-submit-loca").disabled = true;
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
    var id = iddata;

    input.value = args[1];
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
    iddata++;
    node.innerHTML = e;
    document.getElementById("image-preview").appendChild(node);

});
// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
    document.getElementById("btn-submit-loca").disabled = false;
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
