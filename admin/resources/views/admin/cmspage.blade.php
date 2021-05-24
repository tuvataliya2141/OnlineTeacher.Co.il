@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>CMS</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">CMS Page</li>
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
              <h3 class="card-title">CMS Pages</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <!-- <form role="form" action="{{url('homework/assign-homework')}}" method="POST" name="addHomework" id="addHomework" enctype="multipart/form-data" > -->
            <!-- {{ csrf_field() }} -->
            <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
            <div class="card-body">
              <!-- Main content -->
              <section class="content">

                <form role="form" action="{{url('cmspage/about')}}" method="POST" name="editAbout" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card card-outline card-info">
                        <div class="card-header">
                          <h3 class="card-title">
                            About Us Page

                          </h3>
                          <!-- tools box -->
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" style="color:#ccc;" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                              <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" style="color:#ccc;" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                              <i class="fas fa-times"></i></button>
                          </div>
                          <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                          <div class="mb-0">
                            <input type="hidden" name="cms_id" value="{{ $cmsData[0]->id }}">
                            <textarea name="about" class="textarea {{ ($errors->any() && $errors->first('about')) ? 'is-invalid' : '' }}" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{ $cmsData[0]->description }} </textarea>
                            @if($errors->any())
                            <p class="invalid-feedback">{{$errors->first('about')}}</p>
                            @endif
                          </div>
                          <p class="text-sm mb-0 text-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                          </p>
                        </div>
                      </div>
                    </div>
                    <!-- /.col-->
                  </div>
                  <!-- ./row -->
                </form>


                <form role="form" action="{{url('cmspage/help')}}" method="POST" name="editHelp" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card card-outline card-info">
                        <div class="card-header">
                          <h3 class="card-title">
                            Help Page
                          </h3>
                          <!-- tools box -->
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" style="color:#ccc;" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                              <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" style="color:#ccc;" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                              <i class="fas fa-times"></i></button>
                          </div>
                          <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                          <div class="mb-0">
                            <input type="hidden" name="cms_id" value="{{ $cmsData[1]->id }}">
                            <textarea name="help" class="textarea {{ ($errors->any() && $errors->first('help')) ? 'is-invalid' : '' }}" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{ $cmsData[1]->description }} </textarea>
                            @if($errors->any())
                            <p class="invalid-feedback">{{$errors->first('help')}}</p>
                            @endif
                          </div>
                          <p class="text-sm mb-0 text-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                          </p>
                        </div>
                      </div>
                    </div>
                    <!-- /.col-->
                  </div>
                  <!-- ./row -->
                </form>


                <form role="form" action="{{url('cmspage/privacy_policies')}}" method="POST" name="editPrivacy_policies" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card card-outline card-info">
                        <div class="card-header">
                          <h3 class="card-title">
                            Privacy Policies Page
                          </h3>
                          <!-- tools box -->
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" style="color:#ccc;" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                              <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" style="color:#ccc;" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                              <i class="fas fa-times"></i></button>
                          </div>
                          <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                          <div class="mb-0">
                            <input type="hidden" name="cms_id" value="{{ $cmsData[2]->id }}">
                            <textarea name="privacy_policies" class="textarea {{ ($errors->any() && $errors->first('privacy_policies')) ? 'is-invalid' : '' }}" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{ $cmsData[2]->description }} </textarea>
                            @if($errors->any())
                            <p class="invalid-feedback">{{$errors->first('privacy_policies')}}</p>
                            @endif
                          </div>
                          <p class="text-sm mb-0 text-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                          </p>
                        </div>
                      </div>
                    </div>
                    <!-- /.col-->
                  </div>
                  <!-- ./row -->
                </form>


              </section>
              <!-- /.content -->

            </div>
            <!-- /.card-body -->

            <div class="card-footer">

            </div>
            <!-- </form> -->
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