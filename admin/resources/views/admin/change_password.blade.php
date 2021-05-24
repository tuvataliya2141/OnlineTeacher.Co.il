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
            <li class="breadcrumb-item active">change password</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
    

        <!-- Right column -->
        <div class="col-md-5">
          <!-- general form elements -->
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Change Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{url('update_password1')}}" method="POST">
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