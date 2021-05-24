    <!-- =====  FOOTER START  ===== -->
    <div class="footer pt_60">
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-block">
            <div class="content_footercms_right">
              <div class="footer-contact">
                <div class="footer-logo mb_40"> <a href="{{url('/')}}"> <img src="{{asset('public/images/footer-logo.png')}}" height="47px" width="174px" alt="HealthCare"> </a> </div>
                <ul>
                  <li>B-14 Collins Street West Victoria 2386</li>
                  <li>(+123) 456 789 - (+024) 666 888</li>
                  <li>Contact@yourcompany.com</li>
                </ul>
                <div class="social_icon">
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2 footer-block">
            <h6 class="footer-title ptb_20">Categories</h6>
            <ul>
              <!-- <li><a href="#">Bouket</a></li>
              <li><a href="#">Loose Flowers</a></li>
              <li><a href="#">Flower Strings</a></li>
              <li><a href="#">Traditional Garlands</a></li>
              <li><a href="#">Bridal Flowers</a></li>
              <li><a href="#">Jasmine Garlands</a></li>
              <li><a href="#">Decoration</a></li> -->

              <?php

              use App\Http\Controllers\Controller;

              $mainCategories =  Controller::categoryList();
              ?>

              @foreach($mainCategories->slice(0,6) as $category) 
              <li><a href="{{url('product-categories/'.$category->id.'/'.$category->slug.'')}}">{{$category->name}}</a></li>
              @endforeach

            </ul>
          </div>
          <div class="col-md-2 footer-block">
            <h6 class="footer-title ptb_20">Information</h6>
            <ul>
              <li><a href="contact.html">Specials</a></li>
              <li><a href="#">New Products</a></li>
              <li><a href="#">Best Sellers</a></li>
              <li><a href="#">Our Stores</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">About Us</a></li>
            </ul>
          </div>
          <div class="col-md-2 footer-block">
            <h6 class="footer-title ptb_20">My Account</h6>
            <ul>
              <li><a href="#">Checkout</a></li>
              <li><a href="#">My Account</a></li>
              @if(Auth::user() == '')
              <li><a href="#" onclick="myorder();">My Orders</a></li>
              @else
              <li><a href="{{url('/myorder')}}">My Orders</a></li>
              @endif
              <li><a href="#">My Credit Slips</a></li>
              <li><a href="#">My Addresses</a></li>
              <li><a href="#">My Personal Info</a></li>
            </ul>
          </div>

          <div class="col-md-3">
            <h6 class="ptb_20">SIGN UP OUR NEWSLETTER</h6>
            <p class="mt_10 mb_20">For get offers from our favorite brands & get 20% off for next </p>
            <div class="form-group">
              <form id="subscriber_body" method="POST">
                {{ csrf_field() }}


                <input class="mb_20" type="text" name="email" id="subscriber_email" placeholder="Enter Email Address">
                <button type="submit" class="btn">Subscribe</button>
              </form>
            </div>
          </div>

        </div>
      </div>
      <div class="footer-bottom mt_60 ptb_10">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="copyright-part">@ 2020 All Rights Reserved TechnoBrigade Infotech</div>
            </div>
            <div class="col-sm-6">
              <div class="payment-icon text-right">
                <ul>
                  <li><i class="fa fa-cc-paypal "></i></li>
                  <li><i class="fa fa-cc-stripe"></i></li>
                  <li><i class="fa fa-cc-visa"></i></li>
                  <li><i class="fa fa-cc-discover"></i></li>
                  <li><i class="fa fa-cc-mastercard"></i></li>
                  <li><i class="fa fa-cc-amex"></i></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- =====  FOOTER END  ===== -->
    </div>
    <script src="{{asset('public/js/jQuery_v3.1.1.min.js')}}"></script>
    <script src="{{asset('public/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('public/js/jquery.firstVisitPopup.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous">
    </script>
    <script src="{{asset('public/js/jquery-ui.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('public/js/custom.js')}}"></script>
    <script src="{{asset('public/js/front.js')}}"></script>
    <!-- <script src="{{asset('public/js/rating.js')}}"></script> -->



    <script>
      var item = $('#header_qty').html();
      var cart_item = parseInt(item);

      function removeCartItem(target) {


        id = $(target).attr('value');
        var section = $('.cpid' + id);

        $.ajax({
          url: BASE_URL + "/remove-cart-product1/" + id,
          method: "POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            id: id
          },
          dataType: "json",
          beforeSend: function() {
            section.animate({
              'backgroundColor': '#fb6c6c'
            }, 300);
          },
          success: function(response) {
            cart_item = response.cart_item;
            if (response.success == true) {

              // $('.cpid' + id).remove();

              section.slideUp(300, function() {
                section.remove();



                if (cart_item == 0) {
                  cart_table = `              <tr>
                <td colspan="5" align="center"> No product In Cart!!</td>

              </tr>`;

              $('#cart_table tbody').append(cart_table);
                  $('#no_cart_item').hide();
                }
                $('#header_qty').html(cart_item);
                get_total();

              });
              
              if (cart_item == 0) {
                cart_html = `    <ul>
  <table class="table table-striped" id="header_cart">
        <tbody>
          <tr><h5><span id="cart-empty-msg">Cart Empty</span></h5></tr>
        </tbody>
      </table>
  </ul>`;
                $('#header_qty').html(cart_item);
                $('#cart-dropdown').html(cart_html);
              }


            } else {

            }
          }
        });

      }


      function get_total() {
        var total = 0.0;
        $('.cart_product').each(function() {

          var qty = $(this).find('.qty').val();
          var price = $(this).find("td:eq(3)").html();
          // alert(price);
          var amount1 = (qty * price);
          total += amount1;

        });
        // var total1 = total.toFixed(2);

        $('.final_total').html(total);
        var sgst = ((total * 9) / 100).toFixed(2);
        var cgst = ((total * 9) / 100).toFixed(2);
        var sub_total = (total - sgst - cgst).toFixed(2);
        $('.sub_total').html(sub_total);
        // var sgst1 = sgst.toFixed(2);
        $('.sgst_amount').html(sgst);
        $('.cgst_amount').html(cgst);

      }
    </script>



    <script>
      $('#review-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
          url: BASE_URL + '/product-review',
          method: "POST",
          data: new FormData(this),
          dataType: 'JSON',
          contentType: false,
          cache: false,
          processData: false,

          success: function(data) {
            if (data.success == true) {
              swal("Success!", "Thanks For Rating our Product  !", "success")
                .then(function() {
               
                  
                  $('.ratings span').removeClass('fa-star');
                  $('.ratings span').addClass('fa-star-o');
                  // $('#rating-value').val(0);
                  $('#review-form')[0].reset();
                })
            } else {
              // swal("Error !","Please Enter Valid Email Address to Subcribe ","Error",
              swal(data.error[0], " Error ", {
                icon: "warning",
              }).then(function() {
                // $('#review-form')[0].reset();

              })
            }
          }
        });
      });
    </script>

    <script>
      function goto_cart(target) {
        $.ajax({
          url: BASE_URL + '/cart',
          method: "GET",
          data: 1,
          dataType: "json",
          success: function(data) {

            if (data.success == false) {
              toastr.warning("Please Login First"); 

              // swal(data.msg, {
              //   icon: "warning",
              // })
            } else {
              window.location.href = BASE_URL + '/mycart';
            }
          }
        });

      }

      function goto_wishlist(target) {
        $.ajax({
          url: BASE_URL + '/wishlist',
          method: "GET",
          data: 1,
          dataType: "json",
          success: function(data) {

            if (data.success == false) {
              toastr.warning("Please Login First"); 

              // swal(data.msg, {
              //   icon: "warning",
              // })
            } else {
              window.location.href = BASE_URL + '/mywishlist';
            }
          }
        });

      }
    </script>
    <script>
      $('#subscriber_body').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
          url: BASE_URL + '/subscriber',
          method: "POST",
          data: new FormData(this),
          dataType: 'JSON',
          contentType: false,
          cache: false,
          processData: false,

          success: function(data) { 
            if (data.success == true) {
              swal("Success!", "Your Subscribtion Successfully !", "success")
                .then(function() {
                  $('#subscriber_body')[0].reset();
                })
            } else {
              // swal("Error !","Please Enter Valid Email Address to Subcribe ","Error",
              swal(data.error[0], "", {
                icon: "warning",
              }).then(function() {
                $('#subscriber_body')[0].reset();
                // window.location.href = BASE_URL + '/subscriberAutoReply';
              })
            }

          }

        });
      });

      function myorder() {
        $.ajax({
          url: BASE_URL + '/myorder',
          method: "GET",
          data: 1,
          dataType: "json",
          success: function(data) {

            if (data.success == false) {
              toastr.warning("Please Login First"); 

              // swal(data.msg, {
              //   icon: "warning",
              // })
            } else {
              window.location.href = BASE_URL + '/myorder';
            }
          }
        });

      }
       
    </script>





    </body>

    </html>