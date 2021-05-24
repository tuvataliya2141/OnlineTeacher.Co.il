@extends('admin.master')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Service</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item "><a href="{{ url('/service') }}">service</a></li>
            <li class="breadcrumb-item active">Edit service</li>
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
              <h3 class="card-title">service</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="#" id="updateService" method="POST" enctype="multipart/form-data" name="serviceEdit" id="serviceEdit">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{$service->id}}">
              <div class="card-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                  <ul></ul>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">service Title</label>
                  <div class="col-sm-3">
                    <input type="text" name="title" id="title" value="{{old('title',$service->title)}}" autocomplete="off" class="form-control {{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }} " placeholder="Enter title">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('title')}}</p>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Descriprion</label>
                  <div class="col-sm-3">
                    <input type="text" name="description" id="description" value="{{old('description',$service->description)}}" autocomplete="off" class="form-control {{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }} " placeholder="Enter description">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('description')}}</p>
                    @endif
                  </div>
                </div>








              </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-primary " onclick="history.go(-1);">Cancel </button>
          </div>
          </form>
        </div>
        <!-- /.card -->

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection 
@section('scripts')
<script>
  $('#updateService').on('submit', function(event) {

    event.preventDefault();
    $.ajax({
      url: BASE_URL + '/updateService',

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
              window.location.href = BASE_URL + '/service';
            });

        }
      }

    });
  });
  // Product Image Preview
  $(document).on("change", ".fileUpload", function() {
    //     alert(row);
    // var row = $(this).data("row");
    // console.log("row", row);
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#serviceImg1').attr('src', e.target.result).height(100).width(100);
      }
      reader.readAsDataURL(this.files[0]);
    }
  });
</script>
@endsection