@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Add Service</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('service') }}">Service</a></li>
            <li class="breadcrumb-item active">Service Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section> 

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Add Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" id="addService" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="card-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                  <ul></ul>
                </div>

    
                <div class="form-group row ">
                  <div class="col-sm-2 mt-1">
                    <label for="txtName"> Service Name </label>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" id="txtName" name="service" value="{{old('service')}}" class="form-control {{ ($errors->any() && $errors->first('service')) ? 'is-invalid' : '' }}" placeholder="Enter Category Name" onkeyup="ToLower(this)">

                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('service')}}</p>
                    @endif
                  </div>
                </div>

                <div class="form-group row ">
                  <div class="col-sm-2 mt-1">
                    <label for="txtName"> Description </label>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" id="txtName" name="description" value="{{old('description')}}" class="form-control {{ ($errors->any() && $errors->first('description')) ? 'is-invalid' : '' }}" placeholder="Enter Category Name" onkeyup="ToLower(this)">

                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('description')}}</p>
                    @endif
                  </div>
                </div>







              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" class="btn btn-primary " onclick="add_service()">Save</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@endsection


@section('scripts')
<script>
  function add_service() {
    $.ajax({
      url: '{{url("saveService")}}',
      type: 'POST',
      data: $("#addService").serialize(),
      success: function(data) {
        if (data.error) {
          swal("Error !", "Please Input the required field or enter Valid data", "warning")
          printErrorMsg(data.error);
        } else {
          swal("Add!", "Your Data Added successfully!", "success")
            .then((value) => {
              window.location.href = "../service";
            });

        }
      }

    });
  }

  function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display', 'block');
    $(".print-success-msg").css('display', 'none');
    $.each(msg, function(key, value) {
      $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
    });
  }
</script>


@endsection