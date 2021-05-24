@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subscribers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Subscribers</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <!-- <div class="col-md-12 text-right">
          <a href="{{ url('orders/add') }}" class="btn btn-primary text-right">Add</a>
        </div> -->

        <div class="row">
          <button class="btn btn-secondary text-right" onclick="reply();" id="replySubscriber">Send Mail</button>
      </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-hover " id="laravel_subscribers_datatable">
                <thead>
                    <tr class="bg-dark">
                        <th>Id</th>
                        <th>Email</th>
                        <th>created At</th>
                        <th><center><input type="checkbox" id="selectSubscriber" /> &nbsp; Mail</center></th>
                        <th>Action</th> 
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
<div class="modal fade" id="replyMessage">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Send Mail to Subscriber</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{url('/sendnewsletter/' )}}">
        <div class="alert alert-danger" style="display:none"></div>
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="modal-body">
          <input type="hidden" id="email_address" value="" />
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Message : </label>
            <div class="col-sm-12">
            <textarea name="message" id="message"  class="form-control textarea {{ ($errors->any() && $errors->first('message')) ? 'is-invalid' : '' }}" placeholder="Enter Message"
                style="width: 100%; height: 500px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{old('message')}} </textarea>
              <!-- <textarea name="message" id="message" rows="3" class="form-control {{ ($errors->any() && $errors->first('message')) ? 'is-invalid' : '' }}" placeholder="Enter Message">{{old('message')}}</textarea> -->
              @if($errors->any())
              <p class="invalid-feedback errorMsg">{{$errors->first('message')}}</p>
              @endif
            </div>
          </div>

          <input type="hidden" class="{{ ($errors->any() && $errors->first('txt_tokens')) ? 'is-invalid' : '' }}" name="txt_tokens" id="users_mail" value="">
          @if($errors->any())
          <p style="color:red;font-size:13px;" class=" errorMsg">{{$errors->first('txt_tokens')}}</p>
          @endif

          
        </div>

        <div class="modal-footer justify-content-between" style="  background-color: #faf5f5;">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
          <div id="loading" style="display:none">
            <p><img style="height:75px;width::75px;margin-top:-15px;margin-bottom:-10px;" src="{{ asset('public/images/loading.gif ')}}" /> Please Wait</p>
          </div>
          <button type="button" class="btn btn-primary send" id="sendMail">Send</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Add Rating Model /..  -->













<style>
    .odd td {
        text-align: left;
    }

    .even td {
        text-align: left;
    }

    .bg-dark th.sorting {
        text-align: left;
    }

    .bg-dark th.sorting_desc {
        text-align: left;
    }

    th.sorting_disabled {
        text-align: left;
    }

    button.btn.btn-danger.btn-sm {
        margin-left: 10px;
    }
</style>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@endsection