@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Profile</li>
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
        <div class="col-md-7">
          <!-- general form elements -->
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Edit Profile</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{url('update_profile')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <input type="hidden" name="user_id_for_profile" value="{{$user->id}}">
              <div class="card-body">

                <input type="hidden" name="hidden_image" value="{{( $user->photo)}}" />
                <div class="form-group row">
                  <div class="col-sm-8">
                    <label for="photo" class="mt-0">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input {{ ($errors->any() && $errors->first('photo')) ? 'is-invalid' : '' }}" name="photo" id="photo">
                        <label class="custom-file-label">
                          @if($errors->has('photo'))
                          <p class="invalid-feedback1" style="color:#dc3545;font-size:13px;">{{$errors->first('photo')}}</p>
                          @else
                          Choose File
                          @endif
                        </label>

                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div id="hideImgNew" style="height:50px;width:80px;margin-top:-25px;">
                      <div class="form-group">
                        <label style="color:red;">New image </label><br><img id="preview_img" src="{{ asset('public/images/imgPrv.png ')}}" alt="select Image" style="height:80px;width:80px;" />
                      </div>
                    </div>

                    <div id="hideImg" style="height:50px;width:90px;margin-top:-25px;">
                      <div class="form-group">
                        @if($user->photo == '' )
                        <label>Not Inserted</label><br><img src="{{ asset('public/images/imgPrv.png ')}}" alt="Image Not found" style="height:80px;width:80px;" />
                        @else
                        @if(! file_exists(public_path('images/'.$user->photo)))
                        <label> Not Found </label><br><img src="{{ asset('public/images/imgPrv.png ')}}" alt="Image Not found" style="height:80px;width:80px;" />
                        @else
                        <label>Old image </label><br><img src="{{ asset('public/images/'.$user->photo)}}" alt="Image Not found" style="height:80px;width:80px;" />
                        <input type="hidden" name="hidden_image" value="{{( $user->photo)}}" />
                        @endif
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row ">
                  <div class="col-sm-7">
                    <label for="txtName">First Name </label>
                    <input type="text" id="txtName" name="name" value="{{old('name',$user->name)}}" class="form-control {{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }}" placeholder="Enter First Name">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('name')}}</p>
                    @endif
                  </div>

                  <div class="col-sm-5">
                    <label for="txtLastName">Last Name </label>
                    <input type="text" id="txtLastName" name="last_name" value="{{old('last_name',$user->last_name)}}" class="form-control {{ ($errors->any() && $errors->first('last_name')) ? 'is-invalid' : '' }}" placeholder="Enter Last Name">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('last_name')}}</p>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4">
                    <label for="txtEmail">Email </label>
                    <input type="text" id="txtEmail" name="email" value="{{old('email',$user->email)}}" class="form-control {{ ($errors->any() && $errors->first('email')) ? 'is-invalid' : '' }}" placeholder="Enter Email">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('email')}}</p>
                    @endif
                  </div>
                  <div class="col-sm-4">
                    <label for="txtWorkcontact">Work Contact </label>
                    <input type="text" id="txtWorkcontact" name="work_contact" value="{{old('work_contact',$user->work_contact)}}" class="form-control {{ ($errors->any() && $errors->first('work_contact')) ? 'is-invalid' : '' }}" placeholder="Enter Work Contact">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('work_contact')}}</p>
                    @endif
                  </div>
                  <div class="col-sm-4">
                    <label for="txtHomecontact">Home Contact </label>
                    <input type="text" id="txtHomecontact" name="home_contact" value="{{old('home_contact',$user->home_contact)}}" class="form-control {{ ($errors->any() && $errors->first('home_contact')) ? 'is-invalid' : '' }}" placeholder="Enter Home Contact">
                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('home_contact')}}</p>
                    @endif
                  </div>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->

        <!-- Right column -->
        <div class="col-md-5">
          <!-- general form elements -->
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Change Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{url('update_password')}}" method="POST">
              {{ csrf_field() }}

              <input type="hidden" name="user_id_for_pass" value="{{$user->id}}">
              <div class="card-body">
                <div class="form-group ">
                  <label for="oldPassword">Old Passwod </label>
                  <input type="password" id="oldPassword" name="oldPassword" value="{{old('oldPassword')}}" class="form-control {{ ($errors->any() && $errors->first('oldPassword')) ? 'is-invalid' : '' }}" placeholder="Enter old Password">
                  @if($errors->any())
                  <p class="invalid-feedback">{{$errors->first('oldPassword')}}</p>
                  @endif
                </div>
                <div class="form-group ">
                  <label for="newPassword">New Password </label>
                  <input type="password" id="newPassword" name="newPassword" value="{{old('newPassword')}}" class="form-control {{ ($errors->any() && $errors->first('newPassword')) ? 'is-invalid' : '' }}" placeholder="Enter New Password">
                  @if($errors->any())
                  <p class="invalid-feedback">{{$errors->first('newPassword')}}</p>
                  @endif
                </div>
                <div class="form-group ">
                  <label for="txtPassword">Confirm New Password</label>
                  <input type="password" id="txtPassword" name="confirmPassword" class="form-control {{ ($errors->any() && $errors->first('confirmPassword')) ? 'is-invalid' : '' }}" placeholder="Enter Confirm New Password">
                  @if($errors->any())
                  <p class="invalid-feedback">{{$errors->first('confirmPassword')}}</p>
                  @endif
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Change</button>
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
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@endsection