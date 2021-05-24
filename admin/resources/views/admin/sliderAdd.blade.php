@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Add Slider</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('slider') }}">slider</a></li>
            <li class="breadcrumb-item active">Add Slider </li>
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
              <h3 class="card-title">Add Slider</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="#" id="addslider" method="POST" enctype="multipart/form-data" name="addSlider" id="addSlider">
              {{ csrf_field() }}

              <div class="card-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                  <ul></ul>
                </div>
                <div class="form-group row ">
                  <div class="col-sm-2 mt-1">
                    <label for="txtName"> Slider Title </label>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" id="txtName" name="title" value="{{old('title')}}" class="form-control {{ ($errors->any() && $errors->first('title')) ? 'is-invalid' : '' }}" placeholder="Enter Slider Title">

                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('title')}}</p>
                    @endif
                  </div>
                </div>

                <div class="form-group col-sm-12 row">

                  <label for="Subtitle" class="col-sm-2 mt-1 col-form-label ">Subtitle</label>
                  <div class="col-sm-3">
                    <input type="text" name="subtitle" id="subtitle" value="" class="form-control {{ ($errors->any() && $errors->first('subtitle')) ? 'is-invalid' : '' }}  " placeholder="Enter subtitle">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('subtitle')}}</p>
                    @endif
                  </div>


                </div>


                <div class="form-group col-sm-12 row">
                  <label for="txtCategory" class="col-sm-2 mt-1 col-form-label ">Category </label>
                  <div class="col-sm-3">
                    <div class="form-group"> 
                      <select class="custom-select {{ ($errors->any() && $errors->first('category')) ? 'is-invalid' : '' }}" name="category"> 
                        <option value> Select Category </option> 
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ old('category') == $category->id  ? 'selected' : ''}}> {{$category->name}} </option>
                        @endforeach
                      </select>
                      @if($errors->any())
                      <p class="invalid-feedback">{{$errors->first('category')}}</p>
                      @endif
                    </div>
                  </div>

                </div>
                


                <div class="form-group  col-sm-12 row">

                  <label for="Link" class="col-sm-2 col-form-label  ">Link</label>
                  <div class="col-sm-3">
                    <input type="text" name="link" id="link" value="" class="form-control {{ ($errors->any() && $errors->first('link')) ? 'is-invalid' : '' }}  " placeholder="Enter link">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('link')}}</p>
                    @endif
                  </div>
                </div>

                <!-- <div class="form-group  col-sm-12 row">
                  <label for="photo" class="col-sm-2 mt-1 ">Photo:</label>
                  <div class="input-group col-sm-8">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input " name="images" id="photo">
                      <label class="custom-file-label">
                        @if($errors->has('images'))
                        <p class="invalid-feedback1" style="color:#dc3545;font-size:13px;">{{$errors->first('images')}}</p>
                        @else
                        Choose File
                        @endif
                      </label>

                    </div>

                  </div>
                  <div class="col-sm-2">
                    <div class="input-group">
                      <img id="preview_img" src="" style="height:100px;" />
                    </div>
                  </div>
                </div> -->

                <div class="form-group  col-sm-12 row">

                  <!-- <label for="photo" class="col-sm-2 mt-1 ">Photo:</label> -->
                  <label class="col-sm-2">Photo</label>

                  <label><input type="file" style="display:none" name="images" class="fileUpload" data-row="0">

                    <img class="img-thumbnail" id="sliderImg0" src="{{asset('public/images/no_image-100x100.png')}}" alt="" title="" data-placeholder="" style="height: 110px; width: 110px;"></label>




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
  $(document).on("change", ".fileUpload", function() {
    // var row = $(this).data("row");
    // console.log("row", row);
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#sliderImg0').attr('src', e.target.result).height(100).width(100);
      }
      reader.readAsDataURL(this.files[0]);
    }
  });


  $('#addslider').on('submit', function(event) {

    event.preventDefault();
    $.ajax({
      url: BASE_URL + '/saveSlider',

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
              window.location.href = BASE_URL + '/slider';
            });

        }
      }

    });
  });

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