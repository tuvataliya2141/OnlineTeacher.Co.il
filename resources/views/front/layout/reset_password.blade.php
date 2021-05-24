<div class="login-box">
  <div class="login-logo">
    <b>Flower</b>Shop
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <!-- <form action="login.html" method="post"  > -->
      <form class="form-horizontal" method="POST" action="{{ url('reset_password_with_token') }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
      

        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control {{ ($errors->any() && $errors->first('password')) ? 'is-invalid' : '' }}" name="password" placeholder="Password" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
            @if ($errors->has('password'))
                <p class="invalid-feedback">{{$errors->first('password')}}</p>
            @endif
        </div>
        <div class="input-group mb-3">
          <input id="password-confirm" type="password" class="form-control {{ ($errors->any() && $errors->first('password_confirmation')) ? 'is-invalid' : '' }}" name="password_confirmation" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
            @if ($errors->has('password_confirmation'))
                <p class="invalid-feedback">{{$errors->first('password_confirmation')}}</p>
            @endif
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{url('/login')}}">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>