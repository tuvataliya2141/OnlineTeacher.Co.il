@extends('admin.master')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item "><a href="{{ url('/slider') }}">Slider</a></li>
            <li class="breadcrumb-item active">Edit Slider</li>
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
              <h3 class="card-title">Slider</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="#" method="POST" enctype="multipart/form-data" name="sliderEdit" id="updateslider">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{$slider->id}}">
              <div class="card-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                  <ul></ul>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Slider Title</label>
                  <div class="col-sm-3">
                    <input type="text" name="title" id="title" value="{{old('title',$slider->title)}}" autocomplete="off" class="form-control {{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }} " placeholder="Enter title">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('title')}}</p>
                    @endif
                  </div>
                </div>



                <div class="form-group col-sm-12 row">
                  <label for="Subtitle" class="col-sm-2 col-form-label ">Subtitle</label>
                  <div class="col-sm-3">
                    <input type="text" name="subtitle" id="subtitle" value="{{old('subtitle',$slider->subtitle)}}" autocomplete="off" class="form-control {{ ($errors->any() && $errors->first('subtitle')) ? 'is-invalid' : '' }}  " placeholder="Enter subtitle">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('subtitle')}}</p>
                    @endif
                  </div>


                </div>


                                <div class="form-group col-sm-12 row">
                  <label for="txtCategory" class="col-sm-2  mt-1 col-form-label ">Category </label>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <select class="custom-select {{ ($errors->any() && $errors->first('category')) ? 'is-invalid' : '' }}" name="category">
                        <option value> Select Category </option>
                        @foreach($categories as $master_category)

                        <option value="{{$master_category->id}}" {{ old('category',$master_category->id) == $slider->category_id  ? 'selected' : ''}}> {{$master_category->name}} </option>

                        @endforeach
                      </select>
                      @if($errors->any())
                      <p class="invalid-feedback">{{$errors->first('category')}}</p>
                      @endif
                    </div>
                  </div>

                </div>

                <div class="form-group col-sm-12 row">
                  <label for="Link" class="col-sm-2 col-form-label ">Link</label>
                  <div class="col-sm-3">
                    <input type="text" name="link" id="link" value="{{old('link',$slider->link)}}" autocomplete="off" class="form-control {{ ($errors->any() && $errors->first('link')) ? 'is-invalid' : '' }}  " placeholder="Enter link">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('link')}}</p>
                    @endif
                  </div>
                </div>

                <!-- <div class="form-group  col-sm-12 row">
                <label for="photo" class="col-sm-1 mt-1 ">Photo:</label>
                <div class="input-group col-sm-8">
                  <div class="custom-file">
                    <input type="text" name="images" id="photo" value="{{old('images',$slider->images)}}" autocomplete="off" class="form-control {{ ($errors->any() && $errors->first('images')) ? 'is-invalid' : '' }} " placeholder="Enter images">
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

                <!-- <div class="form-group col-sm-12 row">
                  <label for="photo" class="col-sm-2 mt-0">Photo</label>
                  <div class="input-group col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input {{ ($errors->any() && $errors->first('images')) ? 'is-invalid' : '' }}" name="images" id="photo">
                      <label class="custom-file-label">
                        @if($errors->has('images'))
                        <p class="invalid-feedback1" style="color:#dc3545;font-size:13px;">{{$errors->first('images')}}</p>
                        @else
                        Choose File
                        @endif
                      </label>

                    </div>
                  </div>
                  <div class="col-sm-0">
                    <input type="hidden" name="hidden_image" value="{{( $slider->images)}}" />
                  </div>

                  <div class="col-sm-3 text-right">
                    <div class="form-group">
                      <div id="hideImgNew" style="height:80px;width:80px;">
                        <div class="form-group">
                          <label style="color:red;">New image </label><br><img id="preview_img" src="images/imgPrv.png" alt="select Image" style="height:100px;width:100px;" />
                        </div>
                      </div>

                      <div id="hideImg">
                        <div class="form-group">
                          <label>Old image </label><br><img src="{{ asset('public/images/'.$slider->images)}}" alt="not found" height="100" width="100" />
                          <input type="hidden" name="hidden_image" value="{{( $slider->images)}}" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->


                <div class="form-group  col-sm-12 row">

                  <!-- <label for="photo" class="col-sm-2 mt-1 ">Photo:</label> -->
                  <label class="col-sm-2">Photo</label>
                  <input type="hidden" name="hidden_image" value="{{( $slider->images)}}" />
                  <label><input type="file" style="display:none" name="images" class="fileUpload" data-row="1">

                    <img class="img-thumbnail" id="sliderImg1" src="{{asset('public/images/sliders/'.$slider->images)}}" alt="" title="" data-placeholder="" style="height: 110px; width: 110px;"></label>




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
  $('#updateslider').on('submit', function(event) {

    event.preventDefault();
    $.ajax({
      url: BASE_URL + '/updateSlider',

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
  // Product Image Preview
  $(document).on("change", ".fileUpload", function() {
    //     alert(row);
    // var row = $(this).data("row");
    // console.log("row", row);
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#sliderImg1').attr('src', e.target.result).height(100).width(100);
      }
      reader.readAsDataURL(this.files[0]);
    }
  });
</script>
@endsection