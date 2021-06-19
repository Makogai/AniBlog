<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AniBlog | Admin</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{asset("adminlte/plugins/select2/css/select2.min.css")}}">
        <link rel="stylesheet" href="{{asset("adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
        <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("adminlte/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset("adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")}}">
  <!-- Tempusdominus Bootstrap 4 -->
  {{-- <link rel="stylesheet" href="{{asset("adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}"> --}}
  <!-- iCheck -->
  {{-- <link rel="stylesheet" href="{{asset("adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}"> --}}
  <!-- JQVMap -->
  {{-- <link rel="stylesheet" href="{{asset("adminlte/plugins/jqvmap/jqvmap.min.css")}}"> --}}
    <!-- Select2 -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("adminlte/dist/css/adminlte.min.css")}}">
  <!-- overlayScrollbars -->
  {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.minNe@x.x.x/dist/select2-bootstrap4.min.css"> --}}
  {{-- <link rel="stylesheet" href="{{asset("adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}"> --}}
  <!-- Daterange picker -->
  {{-- <link rel="stylesheet" href="{{asset("adminlte/plugins/daterangepicker/daterangepicker.css")}}"> --}}
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset("adminlte/plugins/summernote/summernote-bs4.min.css")}}">

  <link rel="stylesheet" href="{{ asset("https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css") }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
          <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset("adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css")}}">
<style>
    .btn-main{
        color: #fff!important;
    background: rgb(0,131,226);
background: linear-gradient(90deg, rgba(0,131,226,1) 0%, rgba(1,169,156,1) 100%);
    /* border-color: #4183D7; */
    border-color: rgb(var(--color-foreground));
    transition: 0.2s ease all;
    }

    .bg-main{
        color: #fff!important;
    background: rgb(0,131,226);
background: linear-gradient(90deg, rgba(0,131,226,1) 0%, rgba(1,169,156,1) 100%);
    }
    .bg-red{
        color: #fff!important;
        background: rgb(226,0,85);
background: linear-gradient(90deg, rgba(226,0,85,1) 0%, rgba(169,1,1,1) 100%);
    }
    .bg-green{
        color: #fff!important;
        background: rgb(1,169,105);
background: linear-gradient(90deg, rgba(1,169,105,1) 0%, rgba(2,169,1,1) 100%);
    }
    .bg-yellownew{
        color: rgb(31, 31, 31)!important;
        background: rgb(225,162,0);
background: linear-gradient(90deg, rgba(225,162,0,1) 0%, rgba(232,255,58,1) 100%);
    }
    .btn-main:hover{
        opacity: 0.7;
    }
    .btn-main-red{
        color: #fff!important;
        background: rgb(226,0,85);
background: linear-gradient(90deg, rgba(226,0,85,1) 0%, rgba(169,1,1,1) 100%);
    /* border-color: #4183D7; */
    border-color: rgb(var(--color-foreground));
    transition: 0.2s ease all;

    }
    .btn-main-red:hover{
        opacity: 0.7;
    }
    .btn-main-yellow{
        color: rgb(46, 46, 46)!important;
        background: rgb(225,162,0);
background: linear-gradient(90deg, rgba(225,162,0,1) 0%, rgba(232,255,58,1) 100%);
    border-color: white;
    border-color: rgb(var(--color-foreground));
    transition: 0.2s ease all;

    }
    .btn-main-yellow:hover{
        opacity: 0.7;
    }

    .btn-main-green{
        color: #fff!important;
        background: rgb(1,169,105);
background: linear-gradient(90deg, rgba(1,169,105,1) 0%, rgba(2,169,1,1) 100%);
    /* border-color: #4183D7; */
    border-color: rgb(var(--color-foreground));
    transition: 0.2s ease all;

    }
    .logout-btn{
        transition: 0.5s ease all;
    }
    .logout-btn:hover{
        text-shadow: 2px 2px 2px rgba(0,0,0,0.2);
    }
    .btn-main-green:hover{
        opacity: 0.7;
    }
    .content-wrapper{
        background-image: url("/images/bg.svg");
        background-position: top;
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset("images/logo.svg")}}" alt="AniBlog Logo" height="60" width="60">
  </div>


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" style="padding: .8rem 1rem" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <li class="nav-item">
        <form action="{{ route("logout") }}" style="margin:0;padding:0;" method="post">
            @csrf
            <button class="nav-link logout-btn" style="background:none;border:none;">
                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sign-out-alt" height="15" width="15" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sign-out-alt fa-w-16"><path fill="currentColor" d="M160 217.1c0-8.8 7.2-16 16-16h144v-93.9c0-7.1 8.6-10.7 13.6-5.7l141.6 143.1c6.3 6.3 6.3 16.4 0 22.7L333.6 410.4c-5 5-13.6 1.5-13.6-5.7v-93.9H176c-8.8 0-16-7.2-16-16v-77.7m-32 0v77.7c0 26.5 21.5 48 48 48h112v61.9c0 35.5 43 53.5 68.2 28.3l141.7-143c18.8-18.8 18.8-49.2 0-68L356.2 78.9c-25.1-25.1-68.2-7.3-68.2 28.3v61.9H176c-26.5 0-48 21.6-48 48zM0 112v288c0 26.5 21.5 48 48 48h132c6.6 0 12-5.4 12-12v-8c0-6.6-5.4-12-12-12H48c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16h132c6.6 0 12-5.4 12-12v-8c0-6.6-5.4-12-12-12H48C21.5 64 0 85.5 0 112z" class=""></path></svg> Logout
            </button>


        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
@include('layouts.admin-sidebar')
  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>@yield('header')</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section

    <!-- /.content-header -->

    <!-- Main content -->
   @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  {{-- <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://adminlte.io">AniBlog</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer> --}}

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset("adminlte/plugins/jquery/jquery.min.js")}}"></script>
<!-- jQuery UI 1.11.4 -->
{{-- <script src="{{asset("adminlte/plugins/jquery-ui/jquery-ui.min.js")}}"></script> --}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
{{-- <script>
    $.widget.bridge('uibutton', $.ui.button)
</script> --}}
<!-- Bootstrap 4 -->
<script src="{{asset("adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{ asset("adminlte/plugins/select2/js/select2.full.min.js") }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset("adminlte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{asset("adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("adminlte/plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{asset("adminlte/plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{asset("adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>

{{-- <script src="{{asset("adminlte/plugins/moment/moment.min.js")}}"></script> --}}
{{-- <script src="{{asset("adminlte/plugins/daterangepicker/daterangepicker.js")}}"></script> --}}
<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src="{{asset("adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script> --}}
<!-- Summernote -->
<script src="{{asset("adminlte/plugins/summernote/summernote-bs4.min.js")}}"></script>
<!-- overlayScrollbars -->
{{-- <script src="{{asset("adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script> --}}
<!-- AdminLTE App -->
<script src="{{asset("adminlte/dist/js/adminlte.js")}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset("adminlte/dist/js/demo.js")}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('adminlte/ajaxFormSubmit.js') }}"></script>
<script src="{{ asset('adminlte/delete.js') }}"></script>
<script src="{{ asset('adminlte/ajaxFetch.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
@yield('script')
</body>
</html>
