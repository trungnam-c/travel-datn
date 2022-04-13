<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('web-title')</title>
    <base href="{{ asset('/') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/daterangepicker/daterangepicker.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    --}}
    {{-- <link rel="stylesheet" href="{{ asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">



    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/kqgk64h8a77zbey6oxepy6jum8jnsa87q6msbkwgbl7knbl9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/kqgk64h8a77zbey6oxepy6jum8jnsa87q6msbkwgbl7knbl9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script>
   tinymce.init({
     selector: 'textarea#default', // Replace this CSS selector to match the placeholder element for TinyMCE
     plugins: 'code table lists',
     toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
   });
 </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{asset('/quantri')}}" class="nav-link">Trang chủ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Liên hệ</a>
                </li> -->
            </ul>

            <!-- Right navbar links -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{asset('/admin')}}" class="brand-link">
                <img src="{{asset('/')}}dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">VIETTRAVEL</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="pt-3 pb-3">
                    @if(Auth::user()->name)
                        <div class="dropdown">
                            <button class="border-0 bg-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{Auth::user()->avatar}}" class="img-circle elevation-2" width="40px" height="40px">
                                &nbsp;
                                <span class="text-white">{{Auth::user()->name}}</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <!-- <li><a class="dropdown-item text-dark" href="/admin/profile">Chỉnh sửa hồ sơ</a></li> -->
                                <li><a class="dropdown-item text-danger font-weight-bold" href="/thoat">Đăng xuất</a></li>
                            </ul>
                        </div>
                    @else
                        <a class="nav-link" href="/login" role="button">Đăng nhập</a>
                        <a class="nav-link" href="/register" role="button">Đăng ký</a>
                    @endif
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item ">
                            <a href="/admin"
                                class="nav-link {{ request()->segment(2) == '' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-home" aria-hidden="true"></i>
                                <p>
                                    Trang chủ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('location.index') }}"
                                class="nav-link {{ request()->segment(2) == 'quan-ly-dia-diem' ? 'active' : '' }}">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Địa điểm
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('detailLocation.index') }}"
                                class="nav-link {{ request()->segment(2) == 'chi-tiet-dia-diem' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>
                                    Chi tiết địa điểm

                                </p>
                            </a>
                        </li>


                        <li class="nav-item ">
                            <a href="admin/user/danh-sach-khach-hang"
                                class="nav-link {{ request()->segment(3) == 'danh-sach-khach-hang' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Khách hàng

                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ route('guider.huong-dan-vien') }}"
                                class="nav-link {{ request()->segment(2) == 'huong-dan-vien' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                                <p>
                                    Hướng dẫn viên

                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('categories.list') }}"
                                class="nav-link {{ request()->segment(2) == 'list' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-bars" aria-hidden="true"></i>
                                <p>
                                    Danh mục

                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('magiamgia.index') }}"
                                class="nav-link {{ request()->segment(2) == 'ma-giam-gia' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-window-maximize"></i>
                                <p>
                                    Mã giảm giá


                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ route('orderticket.index') }}"
                                class="nav-link {{ request()->segment(2) == 'quan-ly-dat-ve' ? 'active' : '' }}">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                   Đặt vé

                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('danhmucbaiviet.index') }}"
                                class="nav-link {{ request()->segment(2) == 'danh-muc-bai-viet' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-clipboard"></i>
                                <p>
                                    Danh mục bài viết


                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('baiviet.index') }}"
                                class="nav-link {{ request()->segment(2) == 'bai-viet' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-envelope-open"></i>
                                <p>Bài viết


                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('rate.index') }}"
                                class="nav-link {{ request()->segment(2) == 'rate' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>
                                    Bình luận
                                    <!-- <span class="badge badge-info right">{{ DB::table("rate")->count(); }}</span> -->

                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('page-title', 'Viettravel trang quản lý')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">@yield('page-title')</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            @yield('main')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('/')}}plugins/jquery/jquery.min.js"></script>



    <!-- DataTables  & Plugins -->
    <script src="{{asset('/')}}plugins/moment/moment.min.js"></script>

    <script src="{{asset('/')}}plugins/select2/js/select2.full.min.js"></script>
    <script src="{{asset('/')}}plugins/daterangepicker/daterangepicker.js"></script>

    <script src="{{asset('/')}}plugins/inputmask/jquery.inputmask.min.js"></script>
    {{-- <script src="{{asset('/')}}plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{asset('/')}}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> --}}
    {{-- <script src="{{asset('/')}}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('/')}}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('/')}}plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> --}}
    <script src="{{asset('/')}}plugins/jszip/jszip.min.js"></script>
    <script src="{{asset('/')}}plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('/')}}plugins/pdfmake/vfs_fonts.js"></script>
    {{-- <script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.html5.min.js"></script> --}}
    {{-- <script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.print.min.js"></script> --}}
    {{-- <script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.colVis.min.js"></script> --}}
    <script src="{{asset('/')}}plugins/dropzone/min/dropzone.min.js"></script>

    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
    <script>
    // The DOM element you wish to replace with Tagify
    var input = document.querySelector('input[name=phuongtien]');

    // initialize Tagify on the above input node reference
    new Tagify(input)
    </script>
    <!-- AdminLTE App -->
    <script src="{{asset('/')}}dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/')}}dist/js/demo.js"></script>
    <script src="{{asset('/')}}js/custom-js.js"></script>
    <!-- Page specific script -->

    <script>
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )
    </script>

    <!-- Page specific script -->
    <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


        //Money Euro
        $('[data-mask]').inputmask()



        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'))
            }
        )







    })
    </script>
    @yield('location-js')
    @yield('custom-scripts')
</body>

</html>
