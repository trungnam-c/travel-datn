@extends('layouts.admin_layout')

@section('web-title', 'Chỉnh sửa hồ sơ')

@section('page-title','Chỉnh sửa hồ sơ')

@section('main')
    <div class="container-fluid">
        <form action="/admin/cap-nhat-profile" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group" style="max-width: 300px; margin: auto;">
                            <div class="image-upload-wrap" @if (Auth::user()->avatar) style="display:none;" @endif>
                                <input class="file-upload-input" type='file' name="avatar" onchange="readURL(this);" accept="image/*" />
                                <div class="drag-text">
                                    <h4>Avatar</h4>
                                </div>
                            </div>
                            <div class="file-upload-content" @if (Auth::user()->avatar) style="display:block;" @endif>
                                <img class="file-upload-image" src="@if(Auth::user()->avatar){{asset('dist/img/'. Auth::user()->avatar)}} @endif"/>
                                <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Xoá
                                        <span class="image-title">@if(Auth::user()->avatar){{Auth::user()->avatar}}@endif</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="menu">Tên đăng nhập</label>
                                    <input type="text" name="name" class="form-control @error('name') border border-danger @enderror"
                                            value="@if($errors->any()){{old('name')}}@else{{Auth::user()->name}}@endif">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="menu">Email</label>
                                    <input type="text" name="email" class="form-control @error('email') border border-danger @enderror"
                                            value="@if($errors->any()){{old('email')}}@else{{Auth::user()->email}}@endif">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                            </div>
                            @if (\Session::has('success'))
                                <div class="col-md-12 text-success font-weight-bold">
                                    {!! \Session::get('success') !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

        </form>
    </div>
@endsection

@section('custom-scripts')
<script>
    // Drag & drop image profile
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                $('.image-upload-wrap').hide();
                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
// End Drag & drop image profile

</script>
@endsection
