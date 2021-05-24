@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard </h1>
          <!-- <h1 class="m-0 text-dark">Dashboard </h1> -->
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $UserCount - 1; ?></h3>

              <p> Total Users </p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-users"></i>
            </div>
            <a href="{{ url('/users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php echo $CategoryCount; ?></h3>
              <p> Total Categories </p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-th"></i>
            </div>
            <a href="{{ url('/category') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3><?php echo $BannerCount; ?></h3>
              <p> Total Banners </p>
            </div>
            <div class="icon">
              <!-- <i class="nav-icon fas fa-tasks"></i> -->
              <i class="nav-icon fa fa-image "></i>
            </div>
            <a href="{{ url('/banner') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box" style="background-color: #fd7e17;">
            <div class="inner">
              <h3><?php echo $SliderCount; ?></h3>
              <p> Total Sliders </p>
            </div>
            <div class="icon">
              <!-- <i class="nav-icon fas fa-tasks"></i> -->
              <i class="nav-icon fas fa-list"></i>
              <!-- <i class="nav-icon fa fa-sliders"></i> -->
            </div>
            <a href="{{ url('/slider') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $ProductCount; ?></h3>
              <p> Total Products </p>
            </div>
            <div class="icon">
              <!-- <i class="nav-icon fas fa-tasks"></i> -->
              <i class=" nav-icon fa fa-briefcase"></i>
            </div>
            <a href="{{ url('/product') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box " style="background-color: #e83e8c;">
            <div class="inner">
              <h3><?php echo $CouponCount; ?></h3>
              <p> Total Coupons </p>
            </div>
            <div class="icon">
              <i class=" nav-icon fab fa-buffer"></i>
            </div>
            <a href="{{ url('/coupons') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->



        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box " style="background-color: #7266BB;">
            <div class="inner">
              <h3><?php echo $OrderCount; ?></h3>
              <p> Total Orders </p>
            </div>
            <div class="icon">

              <i class="nav-icon fas fa-shopping-bag"></i>
            </div>
            <a href="{{ url('/orders') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $SubscriberCount; ?></h3>
              <p> Total Subscribers </p>
            </div>
            <div class="icon">

              <i class="nav-icon fas  fa-envelope"></i>
            </div>
            <a href="{{ url('/subscribers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box " style="background-color: #e83e8c;">
            <div class="inner">
              <h3><?php echo $ContactUsCount; ?></h3>
              <p> Total Contacts </p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-phone-alt"></i>
            </div>
            <a href="{{ url('/contact-us') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->




      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

</div>
<style>
  .bg-success {
    background-color: #405645 !important;
  }
</style>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@endsection