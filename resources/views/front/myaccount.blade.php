@include('front.layout.header')
<!-- =====  CONTAINER START  ===== -->
<div class="container">
  <div class="row ">
    <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs">

      @include('front.layout.category_menu')

      <div class="left_banner left-sidebar-widget mb_50 mt_30"> <a href="#"><img src="{{asset('public/images/left1.jpg')}}" alt="Left Banner" class="img-responsive" /></a> </div>

      @include('front.layout.top_product_left')

    </div>

    <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">


      <div class="row">
        <div class="col-sm-8">



          <h3 class="text-left">Account Details </h3>
          <br>
          <br>
          <form class="form-horizontal" action="{{url('myaccount/update')}}">

            <div>
              <div class="form-group required">
                <label for="input-payment-firstname" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control {{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }}" id="input-payment-firstname" placeholder="First Name" value="{{old('name',$user_detail->name)}}" name="name">
                  @if($errors->any())
                  <p class="invalid-feedback">{{$errors->first('name')}}</p>
                  @endif
                </div>
              </div>
              <div class="form-group required">
                <label for="input-payment-lastname" class="col-sm-2 control-label ">Last Name</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control {{ ($errors->any() && $errors->first('lname')) ? 'is-invalid' : '' }}" id="input-payment-lastname" placeholder="Last Name" value="{{old('lname',$user_detail->lname)}}" name="lname">
                  @if($errors->any())
                  <p class="invalid-feedback">{{$errors->first('lname')}}</p>
                  @endif
                </div>
              </div>



              <div class="form-group required">
                <label for="input-payment-address-1" class="col-sm-2 control-label ">Address </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control {{ ($errors->any() && $errors->first('address')) ? 'is-invalid' : '' }}" id="input-payment-address-1" placeholder="Address" value="{{old('address',$user_detail->address)}}" name="address">
                  @if($errors->any())
                  <p class="invalid-feedback">{{$errors->first('address')}}</p>
                  @endif

                </div>
              </div>

              <div class="form-group required">
                <label for="input-payment-city" class="col-sm-2 control-label">City</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control {{ ($errors->any() && $errors->first('city')) ? 'is-invalid' : '' }}" id="input-payment-city" placeholder="City" value="{{old('name',$user_detail->city)}}" name="city">
                  @if($errors->any())
                  <p class="invalid-feedback">{{$errors->first('city')}}</p>
                  @endif
                </div>
              </div>

              <div class="form-group required">
                <label for="input-payment-zone" class="col-sm-2 control-label">State</label>
                <div class="col-sm-6">
                  <select class="form-control {{ ($errors->any() && $errors->first('state')) ? 'is-invalid' : '' }} " id="input-payment-zone" name="state">


                    @foreach($states as $state)
                    <option value="{{$state->name}}" {{ old('state',$user_detail->state) == $state->name  ? 'selected' : ''}}> {{$state->name}} </option>
                    @endforeach

                    @if($errors->any())
                    <p class="invalid-feedback">{{$errors->first('state')}}</p>
                    @endif

                  </select>
                </div>
              </div>



              <div class="form-group ">
                <label for="input-payment-country" class="col-sm-2 control-label">Country</label>
                <div class="col-sm-6">
                  <select class="form-control" name="country">
                    <option value="India" selected>India</option>
                    <option value>Select Country</option>
                  </select>
                </div>
              </div>


              <div class="form-group">
                <label for="input-payment-postcode" class="col-sm-2 control-label">Post Code</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control {{ ($errors->any() && $errors->first('postal_code')) ? 'is-invalid' : '' }} " id="input-payment-postcode" placeholder="Post Code" value="{{old('postal_code',$user_detail->postal_code)}}" name="postal_code">
                  @if($errors->any())
                  <p class="invalid-feedback">{{$errors->first('postal_code')}}</p>
                  @endif
                </div>
              </div>

              <div class="buttons form-group">

                <div class="myaccount_btn">
                  <input type="submit" class="btn" data-loading-text="Loading..." id="button-payment-address" value="Update">
                </div>
              </div>
            </div>


          </form>




        </div>






      </div>
      <div class="row">
        <div class="col-sm-6">
          <h3 class="text-center">Change Password </h3>
          <br>

          <form action="{{url('/update-password')}}" method="POST">
            <div class="form-group">
              <label for="input-email" class="control-label {{$errors->has('password')?'has-error':''}}">Old Password</label>
              <input type="password" class="form-control" id="input-email" placeholder="Old Password" value="" name="password">
              @if(Session::has('oldpassword'))
              <span class="text-danger">{{Session::get('oldpassword')}}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="input-password" class="control-label"> New Password</label>
              <input type="password" class="form-control {{$errors->has('newPassword')?'has-error':''}}" id="input-password" placeholder="New Password" value="" name="newPassword">
              <span class="text-danger">{{$errors->first('newPassword')}}</span>

            </div>
            <div class="form-group">
              <label for="input-password" class="control-label"> Confirm Password</label>
              <input type="password" class="form-control" id="input-password" placeholder="Confirm Password" value="" name="newPassword_confirmation">
              <span class="text-danger">{{$errors->first('newPassword_confirmation')}}</span>

            </div>
            <div class="myaccount_login_btn">
              <input type="submit" class="btn mt_20" data-loading-text="Loading..." id="button-login" value="Update">

            </div>
        </div>

      </div>
    </div>



  </div>
</div>
</div>

@include('front.layout.brand_logo')

</div>
<!-- =====  CONTAINER END  ===== -->
@include('front.layout.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous">
</script>