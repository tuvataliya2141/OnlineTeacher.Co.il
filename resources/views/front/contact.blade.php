@include('front.layout.header')
<!-- =====  CONTAINER START  ===== -->
<div class="container">
  <div class="row ">
    <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs">
      @include('front.layout.category_menu')
      <div class="left_banner left-sidebar-widget mt_30 mb_40"> <a href="#"><img src="{{asset('public/images/left1.jpg')}}" alt="Left Banner" class="img-responsive" /></a> </div>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-9 mtb_30">
      <!-- contact  -->
      <div class="row">
        <div class="col-md-4 col-xs-12 contact">
          <div class="location mb_50">
            <h5 class="capitalize mb_20">Our Location</h5>
            <div class="address">Office address
              <br> 124,Lorem Ipsum has been
              <br> text ever since the 1500</div>
            <div class="call mt_10"><i class="fa fa-phone" aria-hidden="true"></i>+91-9987-654-321</div>
          </div>
          <div class="Career mb_50">
            <h5 class="capitalize mb_20">Careers</h5>
            <div class="address">dummy text ever since the 1500s, simply dummy text of the typesetting industry. </div>
            <div class="email mt_10"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:careers@yourdomain.com" target="_top">careers@yourdomain.com</a></div>
          </div>
          <div class="Hello mb_50">
            <h5 class="capitalize mb_20">Say Hello</h5>
            <div class="address">simply dummy text of the printing and typesetting industry.</div>
            <div class="email mt_10"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@yourdomailname.com" target="_top">info@yourdomailname.com</a></div>
          </div>
        </div>
        <div class="col-md-8 col-xs-12 contact-form mb_50">
          
          <!-- Contact FORM -->
          <div id="contact_form">
            <form id="contact_body">
              {{ csrf_field() }}

              <input class="full-with-form " type="text" name="name" placeholder="Name" data-required="true" class="{{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }}" />
              @if($errors->any())
              <p class="invalid-feedback">{{$errors->first('name')}}</p>
              @endif

              <input class="full-with-form  mt_30" type="email" name="email" placeholder="Email Address" data-required="true" class="{{ ($errors->any() && $errors->first('email')) ? 'is-invalid' : '' }}" />
              @if($errors->any())
              <p class="invalid-feedback">{{$errors->first('email')}}</p>
              @endif

              <input class="full-with-form  mt_30" type="text" name="contact_no" placeholder="Phone Number" maxlength="15" data-required="true" class="{{ ($errors->any() && $errors->first('contact_no')) ? 'is-invalid' : '' }}" />
              @if($errors->any())
              <p class="invalid-feedback">{{$errors->first('contact_no')}}</p>
              @endif

              <input class="full-with-form  mt_30" type="text" name="subject" placeholder="Subject" data-required="true" class="{{ ($errors->any() && $errors->first('subject')) ? 'is-invalid' : '' }}">
              @if($errors->any())
              <p class="invalid-feedback">{{$errors->first('subject')}}</p>
              @endif

              <textarea class="full-with-form  mt_30" name="message" placeholder="Message" data-required="true" class="{{ ($errors->any() && $errors->first('message')) ? 'is-invalid' : '' }}"></textarea>
              @if($errors->any())
              <p class="invalid-feedback">{{$errors->first('message')}}</p>
              @endif
              <button class="btn mt_30" type="submit">Send Message</button>
            </form>
            <div id="contact_results"></div>
          </div>
          <!-- END Contact FORM -->
        </div>
      </div>
      <!-- map  -->
      <div class="row">
        <div class="col-xs-12 map mb_80">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.8612486046836!2d72.80350351482299!3d21.19767018736662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04fe692c941b5%3A0x90637a8c1f4c6857!2sTechno%20Brigade%20InfoTech%20%7C%20IT%20Company%20Surat%20%7C%20Web%20%26%20Mobile%20Application%20Development%20Company!5e0!3m2!1sen!2sin!4v1591159223534!5m2!1sen!2sin" width="930" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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

<script src="{{asset('public/js/mail.js')}}"></script>

<script>
  $('#contact_body').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
      url: BASE_URL + '/contact-us',
      method: "POST",
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        if (data.success == true) {
          swal("Success!", "Your message sent Successfully!", "success")
            .then(function() {
              $('#contact_body')[0].reset();
            })
        } else {
          swal("Error !", "Please Fill all the required field with Valid Data! ", "Error", {
            icon: "warning",
          })
        }
      }
    });
  });
</script>