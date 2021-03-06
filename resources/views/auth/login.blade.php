@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Đăng nhập</title>
    <style>
    body {
        padding-top: 100px;
        background: #007bff;
        background-image: url('https://media.vov.vn/sites/default/files/styles/large/public/2020-09/99-thuyen_hoa.jpg');
        background-size: cover;
    }

    .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (\Session::has('thongbao'))
                <div class="col-sm-12 alert alert-danger" id="success">
                    {!! \Session::get('thongbao') !!}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Đăng nhập trang quản trị Viettravel') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="gmail"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nhập email') }}</label>

                                <div class="col-md-6">
                                    <input id="gmail" type="email"
                                        class="form-control @error('gmail') is-invalid @enderror" name="gmail"
                                        value="{{ old('gmail') }}" required autocomplete="gmail" autofocus>

                                    @error('gmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nhập mật khẩu') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Đăng nhập') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

@endsection