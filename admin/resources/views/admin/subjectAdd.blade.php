@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>subject Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('subject') }}">subject</a></li>
            <li class="breadcrumb-item active">subject Add</li>
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
              <h3 class="card-title">Add subject</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="#" id="addsubject" method="POST" enctype="multipart/form-data" name="addsubject" id="addsubject">
              {{ csrf_field() }}

              <div class="card-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                  <ul></ul>
                </div>


                <div class="form-group row ">
                  <div class="col-sm-2 mt-1">
                    <label for="txtName"> subject Title </label>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" id="txtName" name="name" value="{{old('name')}}" class="form-control {{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }}" placeholder="Enter subject name">

                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('name')}}</p>
                    @endif
                  </div>
                </div>




                <div class="form-group row ">
                  <div class="col-sm-2 mt-1">
                    <label for="txtName"> Subject Percentage </label>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" id="txtName" name="percentage" value="{{old('percentage')}}" class="form-control {{ ($errors->any() && $errors->first('percentage')) ? 'is-invalid' : '' }}" placeholder="Enter subject percentage">

                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('percentage')}}</p>
                    @endif
                  </div>
                </div>


     

        

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
        $('#subjectImg0').attr('src', e.target.result).height(100).width(100);
      }
      reader.readAsDataURL(this.files[0]);
    }
  });


  $('#addsubject').on('submit', function(event) {

    event.preventDefault();
    $.ajax({
      url: BASE_URL + '/saveSubject',

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
              window.location.href = BASE_URL + '/subject';
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