@include('front.layout.header')
<!-- =====  CONTAINER START  ===== -->




<div class="container">
  <div class="row ">
    <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs">
      @include('front.layout.category_menu')
      <div class="left_banner left-sidebar-widget mt_30 mb_40"> <a href="#"><img src="{{asset('public/images/left1.jpg')}}" alt="Left Banner" class="img-responsive" /></a> </div>
    </div>

    <div class="alert alert-danger print-error-msg" style="display:none">
      <ul></ul>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">
      <?php

      use Illuminate\Support\Facades\Cookie;
      // $a = Cookie::get('email');
      // dd($a);
      // echo "<pre>";
      // print_r($_COOKIE);
      // echo "</pre>";

      ?>
      <!-- contact  -->
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel-login">
            <div class="panel-heading">
              <div class="row mb_20">
                <div class="col-xs-6">
                  <a href="#" class="active" id="login-form-link">Login</a>
                </div>
                <div class="col-xs-6">
                  <a href="#" id="register-form-link">Register</a>
                </div>
              </div>
              <hr>
            </div>

            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form id="login-form" action="{{url('login')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="email" name="login_email" id="username1" tabindex="1" class="form-control {{ ($errors->any() && $errors->first('login_email')) ? 'is-invalid' : '' }}" placeholder="Username" value="">
                      @if($errors->any())
                      <p class="invalid-feedback">{{$errors->first('login_email')}}</p>
                      @endif

                    </div>
                    <div class="form-group">
                      <input type="password" name="login_password" id="password" tabindex="2" class="form-control {{ ($errors->any() && $errors->first('login_password')) ? 'is-invalid' : '' }} " placeholder="Password">
                      @if($errors->any())
                      <p class="invalid-feedback">{{$errors->first('login_password')}}</p>
                      @endif
                    </div>
                    <div class="form-group text-left">


                      <input type="checkbox" tabindex="3" class="" name="remember" id="remember" value="1">

                      <label for="remember"> Remember Me</label>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6">
                          <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row"> 
                        <div class="col-lg-12">
                          <div class="text-left">
                            <a href="{{url('forget_password')}}" tabindex="5" class="forgot-password">Forgot Password?</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <form id="register-form" action="{{url('register')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="text" name="name" id="name" class="form-control {{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }}" placeholder="First Name" value="">
                      @if($errors->any())
                      <p class="invalid-feedback">{{$errors->first('name')}}</p>
                      @endif
                    </div>

                    <div class="form-group">
                      <input type="text" name="lname" id="lname" class="form-control {{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }}" placeholder="Last Name" value="">
                      @if($errors->any())
                      <p class="invalid-feedback">{{$errors->first('lname')}}</p>
                      @endif
                    </div>


                    <div class="form-group">
                      <input type="email" name="email" id="email" class="form-control {{ ($errors->any() && $errors->first('email')) ? 'is-invalid' : '' }}" placeholder="Email Address" value="" autocomplete="off">
                      @if($errors->any())
                      <p class="invalid-feedback">{{$errors->first('email')}}</p>
                      @endif
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" id="password2" class="form-control {{ ($errors->any() && $errors->first('password')) ? 'is-invalid' : '' }} " placeholder="Password" autocomplete="off" value="">
                      @if($errors->any())
                      <p class="invalid-feedback">{{$errors->first('password')}}</p>
                      @endif
                    </div>
                    <div class="form-group">
                      <input type="password" name="confirm_password" id="confirm-password" class="form-control {{ ($errors->any() && $errors->first('confirm-password')) ? 'is-invalid' : '' }} " placeholder="Confirm Password">
                      @if($errors->any())
                      <p class="invalid-feedback">{{$errors->first('confirm_password')}}</p>
                      @endif
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6">
                          <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Single Blog  -->
<!-- End Blog   -->
<!-- =====  CONTAINER END  ===== -->
<!-- =====  FOOTER START  ===== -->
@include('front.layout.footer')

<script>
  $('#login-form').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
      url: BASE_URL + '/login',
      method: "POST",
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData: false,

      success: function(data) {
        if (data.success == true) {

          // toastr.success("You Are LogIn Successfully"); 
          // location.reload();

          swal("Success!", "You are login   successfully!", "success")

            .then((value) => {
              window.location.href = BASE_URL;
            });
        } else {
          if (data.success == false) {
            $('.alert').hide();
            // toastr.warning("Invalid UserName  Or Password "); 
            // location.reload();

            swal("Warning!", "Invalid UserName  Or Password !", "warning")
          }


          if (data.error) {
            printErrorMsg(data.error);
          } else {

          }
        }

      }

    });
  });


  $('#register-form').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
      url: BASE_URL + '/register-user',
      method: "POST",
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData: false,

      success: function(data) {
        if (data.success == true) {
          var action = data.action;
          swal("Success!", "Registered  successfully!", "success")
            .then((value) => {
              window.location.href = BASE_URL;
              // window.location.href = BASE_URL + '/' + action;
            });
        } else {
          if (data.error) {
            // swal("Error !","Please Input the required field or enter Valid data","warning")
            printErrorMsg(data.error);
          } else {
            swal("Success!", "Registered  successfully!", "success")
              .then((value) => {
                window.location.href = BASE_URL + '/login';
              });
          }
        }

      }

    });
  });

  function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display', 'block');
    $(".print-success-msg").css('display', 'none');
    $.each(msg, function(key, value) {
      $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
    });
  }
</script>