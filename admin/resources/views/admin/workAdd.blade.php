@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>work Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('work') }}">work</a></li>
            <li class="breadcrumb-item active">work Add</li>
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
              <h3 class="card-title">Add work</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="#" id="addwork" method="POST" enctype="multipart/form-data" name="addwork" id="addwork">
              {{ csrf_field() }}

              <div class="card-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                  <ul></ul>
                </div>
                <div class="form-group row ">
                  <div class="col-sm-2 mt-1">
                    <label for="txtName"> Work Title </label>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" id="txtName" name="title" value="{{old('title')}}" class="form-control {{ ($errors->any() && $errors->first('title')) ? 'is-invalid' : '' }}" placeholder="Enter work Title">

                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('title')}}</p>
                    @endif
                  </div>
                </div>

     

        

                </div>

   
 


                <div class="form-group   row">

                  <!-- <label for="photo" class="col-sm-2 mt-1 ">Photo:</label> -->
                  <label class="col-sm-2 mt-1 text-center"">Photo</label>

                  <label><input type="file" style="display:none" name="images" class="fileUpload" data-row="0">

                    <img class="img-thumbnail" id="workImg0" src="{{asset('public/images/no_image-100x100.png')}}" alt="" title="" data-placeholder="" style="height: 110px; width: 110px;"></label>




                </div>





              </div>
              <!-- /.card-body -->

              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-primary " onclick="history.go(-1);">Cancel </button>
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
  // Product Image Preview
  $(document).on("change", ".fileUpload", function() {
    // var row = $(this).data("row");
    // console.log("row", row);
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#workImg0').attr('src', e.target.result).height(100).width(100);
      }
      reader.readAsDataURL(this.files[0]);
    }
  });


  $('#addwork').on('submit', function(event) {

    event.preventDefault();
    $.ajax({
      url: BASE_URL + '/saveWork',

      method: "POST",
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData: false,

      success: function(data) {

        if (data.error) {
          swal("Error !", "Please Input the required field or enter Valid data", "warning")
          printErrorMsg(data.error);

        } else {
          swal("Success!", "Your Data inserted  successfully!", "success")
            .then((value) => {
              window.location.href = BASE_URL + '/work';
            });

        }
      }

    });
  });

  // function printErrorMsg(msg) {
  //   $(".print-error-msg").find("ul").html('');
  //   $(".print-error-msg").css('display', 'block');
  //   $(".print-success-msg").css('display', 'none');
  //   $.each(msg, function(key, value) {
  //     $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
  //   });
  // }
</script>


@endsection