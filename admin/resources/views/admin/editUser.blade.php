@extends('admin.master')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{ url('/profile_setting') }}">Profile</a></li>
                        <li class="breadcrumb-item active">Edit Profile</li>
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
                            <h3 class="card-title">User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('users/edit/'.$user->id)}}" method="POST" enctype="multipart/form-data" name="adduser" id="addUser">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="card-body">

                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>

                                <div class="form-group  col-sm-12 row">

                                    <!-- <label for="photo" class="col-sm-2 mt-1 ">Photo:</label> -->
                                    <label class="col-sm-1">Photo</label>

                                    <label><input type="file" style="display:none" name="photo" class="fileUpload" data-row="0">

                                        <img class="img-thumbnail" id="userImg1" src="{{asset('public/images/users/'.$user->photo)}}" alt="" title="" data-placeholder="" style="height: 110px; width: 110px;"></label>
                                    <input type="hidden" name="hidden_image" value="{{$user->photo}}">

                                </div>


                                <div class="form-group row">

                                    <label for="name" class="col-sm-1 col-form-label"> First Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="name" id="name" value="{{old('name',$user->name)}}" autocomplete="off" class="form-control {{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }} " placeholder="Enter Name">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('name')}}</p>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">



                                    <label for="lname" class="col-sm-1 col-form-label "> Last Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="lname" id="lname" value="{{old('lname',$user->lname)}}" autocomplete="off" class="form-control {{ ($errors->any() && $errors->first('lname')) ? 'is-invalid' : '' }} " placeholder="Enter Name">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('lname')}}</p>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="email" class="col-sm-1 col-form-label">E-mail:</label>
                                    <div class="col-sm-4">
                                        <input type="email" name="email" id="email" value="{{old('email',$user->email)}}" class="form-control {{ ($errors->any() && $errors->first('email')) ? 'is-invalid' : '' }} " placeholder="Enter E-mail">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('email')}}</p>
                                        @endif
                                    </div>




                                </div>

                                <div class="form-group row">

                                    <label for="gender" class="col-sm-1 col-form-label ">Gender:</label>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="custom-select {{ ($errors->any() && $errors->first('gender')) ? 'is-invalid' : '' }}" name="gender">
                                                <option value=""> Select Gender </option>

                                                <option value="Male" {{ $user->gender == 'Male'  ? 'selected' : ''}}> Male </option>
                                                <option value="Female" {{ $user->gender == 'Female'  ? 'selected' : ''}}> Female </option>

                                            </select>
                                            @if($errors->any())
                                            <p class="invalid-feedback">{{$errors->first('gender')}}</p>
                                            @endif
                                        </div>
                                    </div>



                          
                                </div>

                                <div class="form-group row">



                                <label for="contact" class="col-sm-1 col-form-label">Contact No:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="contact_no" id="contact_no" value="{{old('contact_no',$user->contact_no)}}" class="form-control {{ ($errors->any() && $errors->first('contact_no')) ? 'is-invalid' : '' }}  " placeholder="Enter Contact No:">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('contact_no')}}</p>
                                        @endif
                                    </div>

                                    </div>

                                    <div class="form-group row">



<label for="contact" class="col-sm-1 col-form-label">WhatsApp  No:</label>
    <div class="col-sm-4">
        <input type="text" name="whatsapp" id="whatsapp" value="{{old('whatsapp',$user->whatsapp)}}" class="form-control {{ ($errors->any() && $errors->first('whatsapp')) ? 'is-invalid' : '' }}  " placeholder="Enter Contact No:">
        @if($errors->any())
        <p class="invalid-feedback">{{$errors->first('whatsapp')}}</p>
        @endif
    </div>

    </div>



                                <div class="form-group row">
                                    <label for="address" class="col-sm-1 col-form-label">Location:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="location" id="location" value="{{old('location',$user->location)}}" class="form-control {{ ($errors->any() && $errors->first('location')) ? 'is-invalid' : '' }} " placeholder="Enter location">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('location')}}</p>
                                        @endif
                                    </div>
                                </div>


                                
                                <div class="form-group row">
                                    <label for="address" class="col-sm-1 col-form-label">Lecture Subject:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="lec_subject" id="lec_subject" value="{{old('lec_subject',$user->lec_subject)}}" class="form-control {{ ($errors->any() && $errors->first('lec_subject')) ? 'is-invalid' : '' }} " placeholder="Enter lec_subject">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('lec_subject')}}</p>
                                        @endif
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="address" class="col-sm-1 col-form-label">Lecture place:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="lec_place" id="lec_place" value="{{old('lec_place',$user->lec_place)}}" class="form-control {{ ($errors->any() && $errors->first('lec_place')) ? 'is-invalid' : '' }} " placeholder="Enter lec_place">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('lec_place')}}</p>
                                        @endif
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="address" class="col-sm-1 col-form-label">DOB:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="bday" id="bday" value="{{old('bday',$user->bday)}}" class="form-control {{ ($errors->any() && $errors->first('bday')) ? 'is-invalid' : '' }} " placeholder="Enter bday">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('bday')}}</p>
                                        @endif
                                    </div>

                                </div>


                                <!-- <div class="form-group row">

                                    <label for="password" class="col-sm-1 col-form-label">About: </label>
                                    <div class="col-sm-4 ">
                                        <input type="text" name="about" id="about" value="{{old('name',$user->about)}}" class="form-control {{ ($errors->any() && $errors->first('about')) ? 'is-invalid' : '' }} " placeholder="Enter about">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('about')}}</p>
                                        @endif
                                    </div>

                                    </div> -->


                                    <div class="form-group  col-sm-12 row">
                                    <label for="about" class="col-sm-1 col-form-label">About: </label>
                                    <br>
<div class="card-body pad">


  <div class="mb-0">
    <!-- <input type="hidden" name="cms_id" value=""> -->
    <textarea name="about" class=" {{ ($errors->any() && $errors->first('about')) ? 'is-invalid' : '' }}" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{old('about',$user->about)}} </textarea>
    @if($errors->any())
    <p class="invalid-feedback">{{$errors->first('about')}}</p>
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
</script>
@endsection