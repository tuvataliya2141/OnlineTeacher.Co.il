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
                  <!-- <a href="#" class="active" id="login-form-link">Forget Password</a> -->
                  <h4 class="text-center">Forget Password</h4>
                </div>
           
              </div>
              <hr>
            </div>
            <span id="msg"></span>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form id="forget_pass_form" action="#" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="email" name="email" id="username1" tabindex="1" class="form-control {{ ($errors->any() && $errors->first('email')) ? 'is-invalid' : '' }}" placeholder="Enter Email" value="">
                      @if($errors->any())
                      <p class="invalid-feedback">{{$errors->first('email')}}</p>
                      @endif

                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6">
                          <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Submit">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row"> 
                        <div class="col-lg-12">
                          <div class="text-right">
                            <a href="{{url('/login')}}" tabindex="5" class="forgot-password">Login</a>
                          </div>
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
  $('#forget_pass_form').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
      url: BASE_URL + '/reset_password_without_token',
      method: "POST",
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData: false,

      success: function(data) {
        if (data.success == true) {

                  var success_msg = `<div class="alert alert-success" role="alert">

               <h6 align="center">${data.msg}</h6>
           </div>`;
                  $(success_msg).insertAfter("#msg");

                  setTimeout(function() {
                    $(".alert").fadeOut("slow");

                  }, 2000);

      //   swal("Success!", "You are login   successfully!", "success")
            // .then((value) => {
            //   window.location.href = BASE_URL;
            // });
        } else {
          if (data.success == false) {
            $('.alert').hide();

                              var error_msg = `<div class="alert alert-danger" role="alert">

               <h6 align="center">${data.msg}</h6>
           </div>`;
                  $(error_msg).insertAfter("#msg");
                  setTimeout(function() {
                    $(".alert").fadeOut("slow");

                  }, 2000);


            // swal("Warning!", "Invalid UserName  Or Password !", "warning")

          }

          if (data.error) {
            printErrorMsg(data.error);
          } else {

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