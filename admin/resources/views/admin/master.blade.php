<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | {{ config('app.project_name') }}</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/plugins/summernote/summernote-bs4.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('public/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- bootstrap datepicker -->
  <!-- <link rel="stylesheet" href="{{asset('public/dist/css/bootstrap-datepicker.min.css ')}}"> -->
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('public/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

  <style>
    .table {
      width: 100% !important;
    }

    img#preview_img {
      float: left;
      text-align: right;
      position: absolute;
      right: 0;
      left: 60%;
    }

    #hideImgNew label {
      position: absolute;
      right: 0;
      margin-top: -7px;
    }

    .input-group.col-sm-6 {
      /* margin-bottom: 30px; */
      padding-bottom: 100px;
    }

    img#bannerImg0 {
      position: relative;
      left: 11px;
      width: 250px !important;
      height: 200px !important;
    }

    img#sliderImg0 {
      position: relative;
      left: 11px;
      width: 250px !important;
      height: 200px !important;
    }

    img#sliderImg1 {
      position: relative;
      left: 11px;
      width: 250px !important;
      height: 200px !important;
    }

    img#bannerImg1 {
      position: relative;
      left: 11px;
      width: 250px !important;
      height: 200px !important;
    }


    .img-thumbnail {
      cursor: pointer;
    }

    select.js-example-basic-multiple {
      /* width: 240px; */
      width: 100%;
    }
  </style>
  <script>
    var BASE_URL = "{{ url('') }}";
  </script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ url('/dashboard') }}" class="nav-link">Home</a>
        </li>

      </ul>


      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="mt-2"><a href="{{ url('logout') }}" title="Logout"><i class="fas fa-sign-out-alt"></i></a></li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('/dashboard') }}" class="brand-link">
        <!-- <img src="{{asset('public/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">{{ config('app.project_name' ) }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            @if(Auth::user()->photo == '' )
            <img src="{{ asset('public/images/imgPrv.png ')}}" class="img-circle elevation-2" alt="Image Not found" />
            @else
            @if(file_exists(public_path('images/'.Auth::user()->photo)))
            <img src="{{asset('public/images/'.Auth::user()->photo)}}" style="height:35px;width:35px;" class="img-circle elevation-2" alt="User Image">
            @else
            <img src="{{asset('public/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
            @endif
            @endif
          </div>
          <div class="info">
            <a href="#" class="d-block"> {{ Auth::user()->name}} </a>
          </div>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header"> Menu </li>

            <!-- <li class="nav-item">
              <a href="{{ url('dashboard') }}" <?php if (session()->get('pageName') == 'dashboardPage') {
                                                  echo "class='nav-link active'";
                                                } else {
                                                  echo "class='nav-link'";
                                                } ?>>
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li> -->

            <li class="nav-item">
              <a href="{{ url('profile_setting') }}" <?php if (session()->get('pageName') == 'usersPage') {
                                              echo "class='nav-link active'";
                                            } else {
                                              echo "class='nav-link'";
                                            } ?>>
                <i class="nav-icon fas fa-users"></i>
                <p>Profile Setting</p>
              </a>
            </li>

            <li class="nav-item">

<a href="{{ url('change_password') }}" <?php if (session()->get('pageName') == 'changepassPage') {
                                    echo "class='nav-link active'";
                                  } else {
                                    echo "class='nav-link'";
                                  } ?>>
  <i class="nav-icon fas fa-tachometer-alt"></i>
  <p>Change Password</p>
</a>
</li>



<li class="nav-item">

<a href="{{ url('subject') }}" <?php if (session()->get('pageName') == 'subjectPage') {
                                    echo "class='nav-link active'";
                                  } else {
                                    echo "class='nav-link'";
                                  } ?>>
  <i class="nav-icon fas fa-tachometer-alt"></i>
  <p>Subject</p>
</a>
</li>

<li class="nav-item">

<a href="{{ url('work') }}" <?php if (session()->get('pageName') == 'workPage') {
                                    echo "class='nav-link active'";
                                  } else {
                                    echo "class='nav-link'";
                                  } ?>>
  <i class="nav-icon fas fa-tachometer-alt"></i>
  <p>Work</p>
</a>
</li>

<!-- <li class="nav-item">
              <a href="{{ url('plan') }}" <?php if (session()->get('pageName') == 'planPage') {
                                                echo "class='nav-link active'";
                                              } else {
                                                echo "class='nav-link'";
                                              } ?>>
             
                <i class=" nav-icon fa fa-briefcase" ></i>
                <p>Plans</p>
              </a>
 </li> -->


 <li class="nav-item">
              <a href="{{ url('service') }}" <?php if (session()->get('pageName') == 'servicePage') {
                                                echo "class='nav-link active'";
                                              } else {
                                                echo "class='nav-link'";
                                              } ?>>
                <!-- <i class="nav-icon fas fa-list"></i> -->
                <i class=" nav-icon fa fa-briefcase" ></i>
                <p>Services</p>
              </a>
 </li>

 <li class="nav-item">
              <a href="{{ url('footer_setting') }}" <?php if (session()->get('pageName') == 'footerPage') {
                                                echo "class='nav-link active'";
                                              } else {
                                                echo "class='nav-link'";
                                              } ?>>
                <!-- <i class="nav-icon fas fa-list"></i> -->
                <i class=" nav-icon fa fa-briefcase" ></i>
                <p>Footer Setting</p>
              </a>
 </li>




            



            <!-- <li class="nav-item">
              <a href="{{ url('product') }}" <?php if (session()->get('pageName') == 'productPage') {
                                                echo "class='nav-link active'";
                                              } else {
                                                echo "class='nav-link'";
                                              } ?>>
           
                <i class=" nav-icon fa fa-briefcase" ></i>
                <p>Products</p>
              </a>
            </li> -->


<!-- 
            <li class="nav-item">
              <a href="{{ url('subscribers') }}" <?php if (session()->get('pageName') == 'subscriberPage') {
                                                echo "class='nav-link active'";
                                              } else {
                                                echo "class='nav-link'";
                                              } ?>>
                <i class="nav-icon fas  fa-envelope"></i>
                <p>Subscribers</p>
              </a>
            </li> -->





            <li class="nav-item">
              <a href="{{ url('contact-us') }}" <?php if (session()->get('pageName') == 'contactusPage') {
                                                echo "class='nav-link active'";
                                              } else {
                                                echo "class='nav-link'";
                                              } ?>>
                <!-- <i class="nav-icon fa fa-phone-square" aria-hidden="true"></i> -->
                <i class="nav-icon fas fa-phone-alt" ></i>
         
          

        
                <p>Contacts</p>
              </a>
            </li>



            <!-- <li class="nav-item">
              <a href="{{ url('cmspage') }}" <?php if (session()->get('pageName') == 'cmsPage') {
                                                echo "class='nav-link active'";
                                              } else {
                                                echo "class='nav-link'";
                                              } ?>>
                <i class="nav-icon fas fa-edit"></i>
                <p>CMS Pages</p>
              </a>
            </li> -->



            <li class="nav-item">
              <a href="{{ url('logout') }}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>logout</p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    @yield('content')

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2020 <a href="#">{{ config('app.project_name') }}</a>.</strong>
      All rights reserved.
      <!-- <div class="float-right d-none d-sm-inline-block">
        by : <b></b>
      </div> -->
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- jQuery -->
  <script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Select2 -->
  <script src="{{asset('public/plugins/select2/js/select2.full.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- bs-custom-file-input -->
  <script src="{{asset('public/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{asset('public/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <!-- <script src="{{asset('public/plugins/sparklines/sparkline.js')}}"></script> -->
  <!-- JQVMap -->
  <script src="{{asset('public/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('public/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{asset('public/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{asset('public/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{asset('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('public/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="{{asset('public/dist/js/pages/dashboard.js')}}"></script> -->
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('public/dist/js/demo.js')}}"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

  <!-- DataTables -->
  <script src="{{asset('public/plugins/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{asset('public/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
  <!-- page script -->

  <!-- Summernote -->
  <!-- <script src="{{asset('public/plugins/summernote/summernote-bs4.min.js') }}"></script> -->

  <!-- Custom Js -->
  <script src="{{ asset('public/dist/js/custom.js')}}"></script>

  <script>
    // Design imp script 
    $(document).ready(function() {
      bsCustomFileInput.init();
    });

    $(function() {
      $('.select2').select2()

      $('#reservationtime').datepicker({
        formate: 'd/m/Y',
        autoclose: true
      })

      // $('.textarea').summernote();



      $('.textarea').summernote({

        toolbar: [
          // ['style', ['style']],
          ['font', ['bold', 'italic', 'underline', 'clear']],
          // ['fontname', ['fontname']],
          // ['color', ['color']],
          // ['para', ['ul', 'ol', 'paragraph']],
          // ['height', ['height']],
          // ['table', ['table']],
          // ['insert', ['link', 'picture', 'hr']],
          // ['view', ['fullscreen', 'codeview']],
          // ['help', ['help']]
        ],
      });

    });
  </script>


  <script>
    $(document).ready(function() {
      $("#photo").change(function() {
        readImageData(this);
      });


    });

    /*** For Edit Student Image hide New Image portion***/
    $(document).ready(function() {
      $("#hideImgNew").hide();
    });
    /*** For Edit Student Image hide New Image portion -- Code Over***/

    function readImageData(imgData) {
      if (imgData.files && imgData.files[0]) {
        var readerObj = new FileReader();

        readerObj.onload = function(element) {
          $('#preview_img').attr('src', element.target.result);
          /*** For Edit Student Image hide & show New Image portion & Old Image***/
          $('#hideImg').hide();
          $("#hideImgNew").show();
          /*** For Edit Student Image hide & show New Image portion & Old Image --code over***/
        }

        readerObj.readAsDataURL(imgData.files[0]);
      }
    }
  </script>

  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>

  @yield('scripts')

  <!-- Image Preview For Student Module -->
  <script>
    $(document).ready(function() {
      $("#photo").change(function() {
        readImageData(this);
      });
    });

    /*** For Edit Student Image hide New Image portion***/
    $(document).ready(function() {
      $("#hideImgNew").hide();
    });
    /*** For Edit Student Image hide New Image portion -- Code Over***/

    function readImageData(imgData) {
      if (imgData.files && imgData.files[0]) {
        var readerObj = new FileReader();

        readerObj.onload = function(element) {
          $('#preview_img').attr('src', element.target.result);
          /*** For Edit Student Image hide & show New Image portion & Old Image***/
          $('#hideImg').hide();
          $("#hideImgNew").show();
          /*** For Edit Student Image hide & show New Image portion & Old Image --code over***/
        }

        readerObj.readAsDataURL(imgData.files[0]);
      }
    }
  </script>
  <!-- Image Preview For Student Module Over -->
</body>

</html>

<style>
  .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
  .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #787f86 !important;
  }
</style>
<script>
  // Get sub category 
  function get_subcategory(category_id) {
    $.ajax({
      url: BASE_URL + '/get_subcategories',
      type: 'POST',
      data: {
        'category_id': category_id
      },
      success: function(response) {
        if (response.status == "0") {
          var option = ' <option value=""  > Select Sub Category </option>';
          $.each(response.data, function(key, value) {
            option += '<option value=' + key + '>' + value + '</option>';
          });
          $("#subcategory_id").html(option);

        } else {
          //alert(response.message);
          $("#subcategory_id").html('<option selected disabled>' + response.message + '</option>');
        }

      }
    });
  }
</script>