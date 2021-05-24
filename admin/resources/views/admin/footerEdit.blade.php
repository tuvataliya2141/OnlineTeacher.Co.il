@extends('admin.master')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Footer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{ url('footer_setting') }}">Footer Setting</a></li>
                        <li class="breadcrumb-item active">Edit Footer</li>
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
                            <h3 class="card-title">Footer Setting</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('footer_update')}}" method="POST" enctype="multipart/form-data" name="adduser" id="footer_update">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="1">
                            <div class="card-body">

                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>

                                <div class="form-group row">

                                    <label for="name" class="col-sm-1 col-form-label"> Facebook Link:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="facebook" id="facebook" value="{{old('facebook',$footer->facebook)}}" autocomplete="off" class="form-control {{ ($errors->any() && $errors->first('facebook')) ? 'is-invalid' : '' }} " placeholder="Enter facebook">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('facebook')}}</p>
                                        @endif
                                    </div>

                                </div>

  



                                <div class="form-group row">
                                    <label for="address" class="col-sm-1 col-form-label">Twitter:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="twitter" id="twitter" value="{{old('twitter',$footer->twitter)}}" class="form-control {{ ($errors->any() && $errors->first('twitter')) ? 'is-invalid' : '' }} " placeholder="Enter twitter">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('twitter')}}</p>
                                        @endif
                                    </div>
                                </div>


                                
                                <div class="form-group row">
                                    <label for="address" class="col-sm-1 col-form-label">Behance:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="behance" id="behance" value="{{old('behance',$footer->behance)}}" class="form-control {{ ($errors->any() && $errors->first('behance')) ? 'is-invalid' : '' }} " placeholder="Enter behance">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('behance')}}</p>
                                        @endif
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="address" class="col-sm-1 col-form-label">Linked in:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="linked_in" id="linked_in" value="{{old('linked_in',$footer->linked_in)}}" class="form-control {{ ($errors->any() && $errors->first('linked_in')) ? 'is-invalid' : '' }} " placeholder="Enter linked_in">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('linked_in')}}</p>
                                        @endif
                                    </div>
                                </div>

                                
    

                                <div class="form-group row">
                                    <label for="address" class="col-sm-1 col-form-label">Pinterest:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="pinterest" id="pinterest" value="{{old('pinterest',$footer->pinterest)}}" class="form-control {{ ($errors->any() && $errors->first('pinterest')) ? 'is-invalid' : '' }} " placeholder="Enter pinterest">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('pinterest')}}</p>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-sm-1 col-form-label">Youtube:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="youtube" id="youtube" value="{{old('youtube',$footer->youtube)}}" class="form-control {{ ($errors->any() && $errors->first('youtube')) ? 'is-invalid' : '' }} " placeholder="Enter youtube">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('youtube')}}</p>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-sm-1 col-form-label">Instagram:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="instagram" id="instagram" value="{{old('instagram',$footer->instagram)}}" class="form-control {{ ($errors->any() && $errors->first('instagram')) ? 'is-invalid' : '' }} " placeholder="Enter instagram">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('instagram')}}</p>
                                        @endif
                                    </div>

                                </div>


           


                                    <div class="form-group  col-sm-12 row">
                                    <label for="about" class="col-sm-2 col-form-label">Footer Content </label>
                                    <br>
<div class="card-body pad">


  <div class="mb-0">
    <!-- <input type="hidden" name="cms_id" value=""> -->
    <textarea name="content" class=" {{ ($errors->any() && $errors->first('content')) ? 'is-invalid' : '' }}" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{old('content',$footer->content)}} </textarea>
    @if($errors->any())
    <p class="invalid-feedback">{{$errors->first('content')}}</p>
    @endif
  </div>

</div>
</div>



                            </div>








                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
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
    // User Image Preview
    $(document).on("change", ".fileUpload", function() {
        // var row = $(this).data("row");
        // console.log("row", row);
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#userImg1').attr('src', e.target.result).height(100).width(100);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

//     $('#footer_update').on('submit', function(event) {

// event.preventDefault();
// $.ajax({
//   url: BASE_URL + '/footer_update',

//   method: "POST",
//   data: new FormData(this),
//   dataType: 'JSON',
//   contentType: false,
//   cache: false,
//   processData: false,

//   success: function(data) {

//     if (data.error) {
//       swal("Error !", "Please Input the required field or enter Valid data", "warning")
//       printErrorMsg(data.error);

//     } else {
//       swal("Success!", "Your Data inserted  successfully!", "success")
//         .then((value) => {
//           window.location.href = BASE_URL + '/footer_update';
//         });

//     }
//   }

// });
// });


</script>
@endsection