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
    {{-- <link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">



    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{asset('/quantri')}}" class="nav-link">Trang chủ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Liên hệ</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{asset('/')}}dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{asset('/')}}dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{asset('/')}}dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{asset('/quantri')}}" class="brand-link">
                <img src="{{asset('/')}}dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">VIETTRAVEL</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('/')}}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Quang Đạt</a>
                    </div>
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
                            <a href="{{ route('location.index') }}"
                                class="nav-link {{ request()->segment(2) == 'quan-ly-dia-diem' ? 'active' : '' }}">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Quản lý địa điểm
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('detailLocation.index') }}"
                                class="nav-link {{ request()->segment(2) == 'chi-tiet-dia-diem' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>
                                    Chi tiết địa điểm
                                    <span class="badge badge-info right">{{ DB::table("detail_location")->count(); }}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('guider.huong-dan-vien') }}"
                                class="nav-link {{ request()->segment(2) == 'huong-dan-vien' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                                <p>
                                    Hướng dẫn viên
                                    <span class="badge badge-info right">{{ DB::table("huongdanvien")->count(); }}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('categories.list') }}"
                                class="nav-link {{ request()->segment(2) == 'list' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-bars" aria-hidden="true"></i>
                                <p>
                                    Danh mục
                                    <span class="badge badge-info right">{{ DB::table("categories")->count(); }}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('magiamgia.index') }}"
                                class="nav-link {{ request()->segment(2) == 'ma-giam-gia' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>
                                    Quản lý mã giảm giá
                                    <span class="badge badge-info right">{{ DB::table("magiamgia")->count(); }}</span>
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
                            <h1>@yield('page-title')</h1>
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
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

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
                           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
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
             var id = input.value ;

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
            document.querySelector("input[name='images']").value = "";
        }
        // DropzoneJS Demo Code End




    </script>
</body>

</html>
