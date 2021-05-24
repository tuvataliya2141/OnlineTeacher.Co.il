<!DOCTYPE html>
<html lang="en">

<head>
  <!-- =====  BASIC PAGE NEEDS  ===== -->
  <meta charset="utf-8">
  <title>Flower Shop</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- =====  SEO MATE  ===== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="distribution" content="global">
  <meta name="revisit-after" content="2 Days">
  <meta name="robots" content="ALL">
  <meta name="rating" content="8 YEARS">
  <meta name="Language" content="en-us">
  <meta name="GOOGLEBOT" content="NOARCHIVE">
  <!-- =====  MOBILE SPECIFICATION  ===== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="viewport" content="width=device-width">
  <!-- =====  CSS  ===== -->
  <link rel="stylesheet" type="text/css" href="{{asset('public/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('public/css/bootstrap.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/css/magnific-popup.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/css/owl.carousel.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/css/jquery-ui.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/css/custom.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/css/rating.css')}}">
  <link rel=”stylesheet” href=" https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <link rel="shortcut icon" href="{{asset('public/images/favicon.png')}}">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.html">
  <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.html">
  <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.html">

  <style>
    td#total_amount {
      width: 15%;
    }

    .header-right.pull-right.mtb_50 {
      margin-top: 27px !important;
      margin-bottom: unset !important;
    }

    .page-wrapper span i.fa.fa-angle-down.show-r {
      display: none;
    }

    span p {
      /* float: left; */
      display: inline;
      /* bottom: 30px; */
      left: 73.6%;
      right: 7px;
      position: absolute;
      background: #000;
      border-radius: 50%;
      width: 16px;
      height: 16px;
      top: 5px;
      color: #fff;
      padding-right: 3px;
      padding-top: 4px;
      font-weight: 600;
    }

    .navbar-brand {
      padding: 5px 0 !important;

    }

    .mtb_20 {
      margin-top: unset !important;
      margin-bottom: 0;
    }

    .product-grid img.img-responsive {
      height: 200px;
      width: 223px;
    }

    #featu-pro img.img-responsive {
      height: 64.43px !important;
    }

    #new-pro img.img-responsive {
      height: 64.43px !important;
    }

    #bests-pro img.img-responsive {
      height: 64.43px !important;
    }

    #left-special img.img-responsive {
      height: 64px !important;
    }

    /* #special img.img-responsive {
    height: 304.96px;
} */

    /* #special .product-thumb:hover a img {
    display: none;
    height: 304px !important;
} */

    .panel-login a.active {
      color: #e74c3c;
      font-weight: 600;

    }

    #wish_table thead {
      font-weight: bold;
    }

    #cart_table thead {
      font-weight: bold;
    }

    #category-menu a.active {
      font-weight: bold;
    }

    #menu>li>a.active {
      background: #e74c3c;
      color: white;
    }

    .rates.write-review {
      position: absolute;
      left: 68px;
      top: 10px;
    }

    .write-review span.fa.fa-star-o {
      color: #e74c3c;
    }

    .write-review span.fa.fa-star-o:hover {
      color: #e74c3c;
    }

    .write-review .fa {
      color: #e74c3c;
      font-size: 20px;
    }

    .cms_banner #subbanner1 img.img-responsive {
      height: 220px;
      width: 465px;
    }

    .main-banner .owl-item img.img-responsive {
      height: 580px;
      width: 980px;
    }

    .bannertext {
      background: #ec0808;
      opacity: 0.8;
      text-align: center;
    }




    .col-xs-6.col-sm-12.col-md-6.mt_20:last-child {
      padding-right: 0;
    }


    .col-xs-6.col-sm-12.col-md-6.mt_20:first-child {
      padding-left: 0;
    }

    .cms_banner .col-xs-12 #subbanner3 {
      padding: 0;
    }

    .owl-item .product-list .product-thumb img.img-responsive {
      width: 425px;
      height: 257px;
    }


    /* 
    span#wishlist-item {
      background: #000000;
      border-radius: 50%;
      font-weight: bold;
      color: #ffffff;
      /* width: 10px; */
    /* } */

    /* */
    /* #cart-dropdown span {
    text-align: center;
    position: absolute;
    top: 11px;
    left: 32%;
}  */


/* Header Profile DropDown */

.dropbtn {
  /* background-color: #4CAF50; */
  background-color: #e74c3c;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 130px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

/* Header Profile Over  */
  </style>


  <script>
    var BASE_URL = "{{ url('') }}";
  </script>


</head>
<?php

use App\Http\Controllers\Controller as WishCount;

$wish = WishCount::getwishlist_count();
?>


<body>
  <!-- =====  LODER  ===== -->
  <div class="loder"></div>
  <div class="wrapper">
    <div id="subscribe-me" class="modal animated fade in" role="dialog" data-keyboard="true" tabindex="-1">
      <div class="newsletter-popup">
        <img class="offer" src="{{asset('public/images/newsbg.jpg')}}" alt="offer">
        <div class="newsletter-popup-static newsletter-popup-top">
          <div class="popup-text">
            <div class="popup-title">50% <span>off</span></div>
            <div class="popup-desc">
              <div>Sign up and get 50% off your next Order</div>
            </div>
          </div>
          <form onsubmit="return  validatpopupemail();" method="post">
            <div class="form-group required">
              <input type="email" name="email-popup" id="email-popup" placeholder="Enter Your Email" class="form-control input-lg" required />
              <button type="submit" class="btn btn-default btn-lg" id="email-popup-submit">Subscribe</button>
              <label class="checkme">
                <input type="checkbox" value="" id="checkme" />Dont show again</label>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- =====  HEADER START  ===== -->
    <header id="header">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <!-- <ul class="header-top-left">
                <li class="language dropdown"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button"> <img src="{{asset('public/images/English-icon.gif')}}" alt="img"> English <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#"><img src="{{asset('public/images/English-icon.gif')}}" alt="img"> English</a></li>
                    <li><a href="#"><img src="{{asset('public/images/French-icon.gif')}}" alt="img"> French</a></li>
                    <li><a href="#"><img src="{{asset('public/images/German-icon.gif')}}" alt="img"> German</a></li>
                  </ul>
                </li>
                <li class="currency dropdown"> <span class="dropdown-toggle" id="dropdownMenu12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button"> USD <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu12">
                    <li><a href="#">USD</a></li>
                    <li><a href="#">EUR</a></li>
                    <li><a href="#">AUD</a></li>
                  </ul>
                </li>
              </ul> -->
            </div>

            <style>

</style>



            <div class="col-sm-6">
              <ul class="header-top-right text-right">

                @if(Auth::user() != '' )
  
                <li>
                  <div class="dropdown">
                    <button class="dropbtn">Hi , &nbsp; {{ Auth::user()->name}}</button>
                    <div class="dropdown-content">
                      <a href="{{url('/myprofile')}}">My Account</a>

                      <a href="#" onclick="return goto_wishlist(this);" value="cart">Wishlist </a>
                    <a href="#" onclick="return goto_cart(this);" value="cart"> My Cart</a>
                    <a href="{{url('/myorder')}}">My Orders</a>
                   <a href="{{url('logout')}}">Logout</a>
                   
                    </div>
                  </div>
                </li>
                @else


                <li>
                  <a href="#" onclick="return goto_wishlist(this);" value="cart">

                    Wishlist

                    @if(isset($wish))
                    <span id="wishlist-item">
                      <p> {{$wish}}</p>
                    </span>

                    @else

                    @endif

                  </a>

                </li>
                |

                <a href="#" onclick="return goto_cart(this);" value="cart">My Cart</a>
                &nbsp;
                <li class="account"><a href="{{url('/login')}}">

                    Login/SignUp
                  </a></li>
                @endif

              




              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="header">
        <div class="container">
          <nav class="navbar">
            <div class="navbar-header mtb_20"> <a class="navbar-brand" href="{{url('/')}}"> <img alt="HealthCared" src="{{asset('public/images/logo.png')}}" height="60px" width="218px"> </a> </div>
            <div class="header-right pull-right mtb_50">
              <button class="navbar-toggle pull-left" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>
              <div class="shopping-icon">

                <!-- Header cart View   -->
                @include('front.layout.header_cart_view')



              </div>


              <div class="main-search pull-right">
                <div class="search-overlay">
                  <!-- Close Icon -->
                  <a href="javascript:void(0)" class="search-overlay-close"></a>
                  <!-- End Close Icon -->
                  <div class="container">
                    <!-- Search Form -->
                    <!-- <form role="search" id="searchform" action="http://html.lionode.com/search" method="get"> -->
                    <form action="{{route('topsearch')}}" method="POST" role="search">
                      {{csrf_field()}}
                      <label class="h5 normal search-input-label">Enter keywords To Search Entire Store</label>
                      <input value="" name="search_text" placeholder="Search here..." type="search">
                      <button type="submit"></button>
                    </form>

                    <!-- End Search Form -->
                  </div>
                </div>
                <div class="header-search"> <a id="search-overlay-btn"></a> </div>
              </div>
            </div>
            <div class="collapse navbar-collapse js-navbar-collapse pull-right">
              <ul id="menu" class="nav navbar-nav">
                <li> <a href="{{url('/')}}" <?php

                                            if (Session::get('pageName') == "home") {

                                              echo "class='active'";
                                            } else {
                                              echo "class=''";
                                            } ?>> Home</a></li>
                <li> <a href="{{url('/shop')}}" <?php

                                                if (Session::get('pageName') == "shop") {

                                                  echo "class='active'";
                                                } else {
                                                  echo "class=''";
                                                } ?>>Shop</a></li>

                <li> <a href="{{url('/about')}}" <?php

                                                  if (Session::get('pageName') == "about") {

                                                    echo "class='active'";
                                                  } else {
                                                    echo "class=''";
                                                  } ?>>About us</a></li>
                <li> <a href="{{url('/contact')}}" <?php

                                                    if (Session::get('pageName') == "contact") {

                                                      echo "class='active'";
                                                    } else {
                                                      echo "class=''";
                                                    } ?>>Contact Us </a></li>
              </ul>
            </div>
            <!-- /.nav-collapse -->
          </nav>
        </div>
      </div>
      <div class="header-bottom">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-3">
              <div class="category">
                <div class="menu-bar" data-target="#category-menu,#category-menu-responsive" data-toggle="collapse" aria-expanded="true" role="button">
                  <h4 class="category_text">Main category</h4>
                  <span class="i-bar"><i class="fa fa-bars"></i></span>
                </div>
              </div>
              <div id="category-menu-responsive" class="navbar collapse cat_menu " aria-expanded="true" role="button">
                <div class="nav-responsive">

                  <?php

                  use App\Http\Controllers\Controller;

                  $mainCategories =  Controller::categoryList();
                  $states =  Controller::getState();
                  ?>
                  <ul class="nav  main-navigation collapse in">
                    @foreach($mainCategories as $category)
                    <li><a href="#">{{$category->name}}</a></li>
                    @endforeach

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-9">
              <div class="header-bottom-right offers">
                <div class="marquee"><span><i class="fa fa-circle" aria-hidden="true"></i>Buy Fresh Puja Flower Online at your home comfort.</span>
                  <span><i class="fa fa-circle" aria-hidden="true"></i>Are you looking for Special Garland for Wedding?</span>
                  <span><i class="fa fa-circle" aria-hidden="true"></i>Bunch of flowers always represents peace, love and respect.</span>
                  <span><i class="fa fa-circle" aria-hidden="true"></i>When nature gets close to tradition, it's called Beauty. </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- =====  HEADER END  ===== -->