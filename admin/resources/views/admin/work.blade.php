@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Work</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Work</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-12 text-right">
          <a href="{{ url('work/add') }}" class="btn btn-primary text-right">Add</a>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered table-hover " id="laravel_work_datatable">
        <thead>
          <tr class="bg-dark">
            <th>Id</th>
            <th>Title</th>
            <!-- <th>SubTitle</th> -->
            <!-- <th>Images</th> -->
            <!-- <th>Link</th> -->
            <th>Status</th>
            <th>Created Date Time</th>
            <th>Action</th>
          </tr>
        </thead>

      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<style>
  .odd td {
    text-align: center;
  }

  .even td {
    text-align: center;
  }

  .bg-dark th.sorting {
    text-align: center;
  }

  .bg-dark th.sorting_desc {
    text-align: center;
  }

  th.sorting_disabled {
    text-align: center;
  }

  button.btn.btn-danger.btn-sm {
    margin-left: 30px;
  }
</style>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@endsection