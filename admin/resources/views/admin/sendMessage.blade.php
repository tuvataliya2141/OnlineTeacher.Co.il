@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Send Mesaage</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Send Mesaage</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md-6 ">
          <button class="btn btn-secondary text-right" onclick="messageModel();" id="sendMessage">Send Message</button>
        </div>
        <div class="col-md-6 text-right">
          <button class="btn btn-sm btn-primary text-right deviceBtn" data-device="1" id="sendAndroid">Send to Android Only</button>
          &nbsp;&nbsp;&nbsp;
          <button class="btn btn-sm btn-primary text-right deviceBtn" data-device="2" id="sendIOS">Send to IOS Only</button>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered table-hover " id="laravel_sendMessage_datatable">
        <thead>
          <tr class="bg-dark">
            <th>Sr. No</th>
            <th>Name</th>
            <th>Device</th>
            <th>Loginned Time</th>
            <th><input type="checkbox" id="selectAll" /></th>

          </tr>
        </thead>

      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Add Rating Model -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Send Message</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="alert alert-danger" style="display:none"></div>

      <meta name="csrf-token" content="{{ csrf_token() }}">
      <div class="modal-body">

        <div class="form-group row">
          <label for="message" class="col-sm-2 col-form-label">Message : </label>
          <div class="col-sm-12">
            <textarea name="message" id="message" rows="3" class="form-control {{ ($errors->any() && $errors->first('message')) ? 'is-invalid' : '' }}" placeholder="Enter Message">{{old('message')}}</textarea>
            @if($errors->any())
            <p class="invalid-feedback errorMsg">{{$errors->first('message')}}</p>
            @endif
          </div>
        </div>

        <input type="hidden" class="{{ ($errors->any() && $errors->first('txt_tokens')) ? 'is-invalid' : '' }}" name="txt_tokens" class="" id="users" value="">
        @if($errors->any())
        <p style="color:red;font-size:13px;" class=" errorMsg">{{$errors->first('txt_tokens')}}</p>
        @endif

      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary send" id="sendMsg">Send</button>
      </div>
      <!-- </form> -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Add Rating Model /..  -->

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@endsection