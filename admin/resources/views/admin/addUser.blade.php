@extends('admin.master')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{ url('/users') }}">Users</a></li>
                        <li class="breadcrumb-item active">Add User</li>
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
                        <form role="form" action="{{url('users/add')}}" method="POST" enctype="multipart/form-data" name="adduser" id="addUser">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>

                                <div class="form-group  col-sm-12 row">

                                    <!-- <label for="photo" class="col-sm-2 mt-1 ">Photo:</label> -->
                                    <label class="col-sm-1">Photo</label>

                                    <label><input type="file" style="display:none" name="photo" class="fileUpload" data-row="0">

                                        <img class="img-thumbnail" id="userImg0" src="{{asset('public/images/no_image-100x100.png')}}" alt="" title="" data-placeholder="" style="height: 110px; width: 110px;"></label>




                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-1 col-form-label"> First Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="name" id="name" value="" autocomplete="off" class="form-control {{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }} " placeholder="Enter Name">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('name')}}</p>
                                        @endif
                                    </div>

                                    <label for="lname" class="col-sm-2 col-form-label text-right"> Last Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="lname" id="lname" value="" autocomplete="off" class="form-control {{ ($errors->any() && $errors->first('lname')) ? 'is-invalid' : '' }} " placeholder="Enter Name">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('lname')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-1 col-form-label">E-mail:</label>
                                    <div class="col-sm-4">
                                        <input type="email" name="email" id="email" value="" class="form-control {{ ($errors->any() && $errors->first('email')) ? 'is-invalid' : '' }} " placeholder="Enter E-mail">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('email')}}</p>
                                        @endif
                                    </div>

                                    <label for="password" class="col-sm-2 col-form-label text-right">Password: </label>
                                    <div class="col-sm-4 ">
                                        <input type="text" name="password" id="password" value="" class="form-control {{ ($errors->any() && $errors->first('password')) ? 'is-invalid' : '' }} " placeholder="Enter Password">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('password')}}</p>
                                        @endif
                                    </div>



                                </div>

                                <div class="form-group row">

                                    <label for="gender" class="col-sm-1 col-form-label ">Gender:</label>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="custom-select {{ ($errors->any() && $errors->first('gender')) ? 'is-invalid' : '' }}" name="gender">
                                                <option value=""> Select Gender </option>

                                                <option value="Male"> Male </option>
                                                <option value="Female"> Female </option>

                                            </select>
                                            @if($errors->any())
                                            <p class="invalid-feedback">{{$errors->first('gender')}}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- <label for="dial_code" class="col-sm-1 col-form-label ">DialCode:</label>

                     <div class="col-sm-2">
                    <input type="text" name="dial_code" id="dial_code" value="" class="form-control {{ ($errors->any() && $errors->first('dial_code')) ? 'is-invalid' : '' }}  " placeholder="Dial Code:">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('dial_code')}}</p>
                    @endif
                  </div> -->

                                    <label for="contact" class="col-sm-2 col-form-label text-right">Contact No:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="contact_no" id="contact_no" value="" class="form-control {{ ($errors->any() && $errors->first('contact_no')) ? 'is-invalid' : '' }}  " placeholder="Enter Contact No:">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('contact_no')}}</p>
                                        @endif
                                    </div>
                                </div>


                                <!-- <div class="form-group  col-sm-12 row">
                                    <label for="photo" class="col-sm-1 mt-1 ">Photo:</label>
                                    <div class="input-group col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input " name="photo" id="photo">
                                            <label class="custom-file-label">
                                                @if($errors->has('photo'))
                                                <p class="invalid-feedback1" style="color:#dc3545;font-size:13px;">{{$errors->first('photo')}}</p>
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



                                <div class="form-group row">
                                    <label for="address" class="col-sm-1 col-form-label">Address:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="address" id="address" value="" class="form-control {{ ($errors->any() && $errors->first('address')) ? 'is-invalid' : '' }} " placeholder="Enter Address">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('address')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="City" class="col-sm-1 col-form-label">City:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="city" id="city" value="" class="form-control {{ ($errors->any() && $errors->first('city')) ? 'is-invalid' : '' }} " placeholder="Enter City">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('city')}}</p>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="state" class="col-sm-1 col-form-label ">State:</label>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="custom-select {{ ($errors->any() && $errors->first('state')) ? 'is-invalid' : '' }}" name="state">
                                                <option value=""> Select State </option>

                                                @foreach($states as $state)
                                                <option value="{{$state->name}}"> {{$state->name}}</option>
                                                @endforeach

                                                @if($errors->any())
                                                <p class="invalid-feedback">{{$errors->first('state')}}</p>
                                                @endif

                                            </select>
                                            @if($errors->any())
                                            <p class="invalid-feedback">{{$errors->first('state')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="postal Code" class="col-sm-1 col-form-label">PIN Code:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="postal_code" id="postal_code" value="" class="form-control {{ ($errors->any() && $errors->first('postal_code')) ? 'is-invalid' : '' }} " placeholder="Enter PIN Code">
                                        @if($errors->any())
                                        <p class="invalid-feedback">{{$errors->first('postal_code')}}</p>
                                        @endif
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
                $('#userImg0').attr('src', e.target.result).height(100).width(100);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection