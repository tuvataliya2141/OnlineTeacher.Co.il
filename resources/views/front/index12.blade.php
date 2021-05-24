@include('front.layout.header')
<!-- =====  CONTAINER START  ===== -->
<div class="container">
  <div class="row ">
    <div id="column-left" class="col-sm-4 col-md-4 col-lg-3 ">
      @include('front.layout.category_menu')
      <div class="left_banner left-sidebar-widget mt_30 mb_50"> <a href="#"><img src="{{asset('public/images/left1.jpg')}}" alt="Left Banner" class="img-responsive" /></a> </div>
      <div class="left-cms left-sidebar-widget mb_50">
        <ul>
          <li>
            <div class="feature-i-left ptb_40">
              <div class="icon-right Shipping"></div>
              <h6>Free Shipping</h6>
              <p>Free delivery worldwide</p>
            </div>
          </li>
          <li>
            <div class="feature-i-left ptb_40">
              <div class="icon-right Order"></div>
              <h6>Order Online</h6>
              <p>Hours : 8am - 11pm</p>
            </div>
          </li>
          <li>
            <div class="feature-i-left ptb_40">
              <div class="icon-right Save"></div>
              <h6>Shop And Save</h6>
              <p>For All Spices & Herbs</p>
            </div>
          </li>
          <li>
            <div class="feature-i-left ptb_40">
              <div class="icon-right Safe"></div>
              <h6>Safe Shoping</h6>
              <p>Ensure genuine 100%</p>
            </div>
          </li>
        </ul>
      </div>

      @include('front.layout.top_product_left')

      <div class="left_banner left-sidebar-widget mb_50"> <a href="#"><img src="{{asset('public/images/left2.jpg')}}" alt="Left Banner" class="img-responsive" /></a> </div>

      <div class="Testimonial left-sidebar-widget mb_50">
        <div class="heading-part mb_20 ">
          <h2 class="main_title">Testimonial</h2>
        </div>
        <div class="client owl-carousel text-center pt_10">
          <div class="item client-detail">
            <div class="client-avatar"> <img alt="" src="{{asset('public/images/user1.jpg')}}"> </div>
            <div class="client-title  mt_30"><strong>joseph Lui</strong></div>
            <div class="client-designation mb_10">php Developer</div>
            <p><i class="fa fa-quote-left" aria-hidden="true"></i>Lorem ipsum dolor sit amet, volumus oporteat his at sea in Rem ipsum dolor sit amet, sea in odio ..</p>
          </div>
          <div class="item client-detail">
            <div class="client-avatar"> <img alt="" src="{{asset('public/images/user2.jpg')}}"> </div>
            <div class="client-title  mt_30"><strong>joseph Lui</strong></div>
            <div class="client-designation mb_10">php Developer</div>
            <p><i class="fa fa-quote-left" aria-hidden="true"></i>Lorem ipsum dolor sit amet, volumus oporteat his at sea in Rem ipsum dolor sit amet, sea in odio ..</p>
          </div>
          <div class="item client-detail">
            <div class="client-avatar"> <img alt="" src="{{asset('public/images/user3.jpg')}}"> </div>
            <div class="client-title  mt_30"><strong>joseph Lui</strong></div>
            <div class="client-designation mb_10">php Developer</div>
            <p><i class="fa fa-quote-left" aria-hidden="true"></i>Lorem ipsum dolor sit amet, volumus oporteat his at sea in Rem ipsum dolor sit amet, sea in odio ..</p>
          </div>
        </div>
      </div>
      <div class="Tags left-sidebar-widget mb_50">
        <div class="heading-part mb_20 ">
          <h2 class="main_title">Tags</h2>
        </div>
        <ul>
          <li><a href="#">business</a></li>
          <li><a href="#">clean</a></li>
          <li><a href="#">corporate</a></li>
          <li><a href="#">blog</a></li>
          <li><a href="#">creative</a></li>
          <li><a href="#">ecommerce</a></li>
          <li><a href="#">modern</a></li>
          <li><a href="#">portfolio</a></li>
          <li><a href="#">retina</a></li>
          <li><a href="#">multipurpose</a></li>
          <li><a href="#">photography</a></li>
          <li><a href="#">responsive</a></li>
        </ul>
      </div>
    </div>
    <div id="column-right" class="col-sm-8 col-md-8 col-lg-9 mtb_30">
      <!-- =====  BANNER STRAT  ===== -->
      <div class="banner">
        <div class="main-banner owl-carousel">

          @foreach($sliders as $slider)


          <div class="item">

            <a href="{{url('product-categories/'.$slider->category_id.'/'.$slider->slug.'')}}">

              <img src="{{asset('admin/public/images/sliders/'.$slider->images)}}" alt="Main Banner" class="img-responsive" /></a>
          </div>

          @endforeach



        </div>
      </div>
      <!-- =====  BANNER END  ===== -->


      <!-- =====  SUB BANNER  STRAT ===== -->
      <div class="row">
        <div class="cms_banner mt_10">
          @foreach($banners as $banner)
          <div class="col-xs-6 col-sm-12 col-md-6 mt_20">
            <div id="subbanner1" class="sub-hover">
              <a href="{{url('product-categories/'.$banner->category_id.'/'.$banner->slug.'')}}">
                <img src="{{asset('admin/public/images/banners/'.$banner->images)}}" alt="Sub Banner1" class="img-responsive">
              </a>
              <div class="bannertext">
                <h2>{{$banner->title}}</h2>
                <p class="mt_10">{{$banner->subtitle}}</p>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
      <!-- =====  SUB BANNER END  ===== -->
      <!-- =====  PRODUCT TAB  ===== -->
      <div id="product-tab" class="mt_40">
        <div class="heading-part mb_20 ">
          <h2 class="main_title">Beautiful Flowers</h2>
        </div>
        <ul class="nav text-right">
          <li class="active"> <a href="#nArrivals" data-toggle="tab">New Arrivals</a> </li>
          <li><a href="#Bestsellers" data-toggle="tab">Bestsellers</a> </li>
          <li><a href="#Featured" data-toggle="tab">Featured</a> </li>
        </ul>
        <div class="tab-content clearfix box">
          <div class="tab-pane active" id="nArrivals">

            @include('front.top_new_items')

          </div>
          <div class="tab-pane" id="Bestsellers">
            @include('front.top_best_items')
          </div>
          <div class="tab-pane" id="Featured">
            @include('front.top_featured_items')
          </div>
        </div>
      </div>
      <!-- =====  PRODUCT TAB  END ===== -->
      <!-- =====  SUB BANNER  STRAT ===== -->
      <div class="row">
        <div class="cms_banner mt_40 mb_50">
          <div class="col-xs-12">
            <div id="subbanner3" class="banner sub-hover"> <a href="#"><img src="{{asset('public/images/sub3.jpg')}}" alt="Sub Banner3" class="img-responsive"></a> </div>
          </div>
        </div>
      </div>
      <!-- =====  SUB BANNER END  ===== -->
      <!-- =====  sale product  ===== -->
      <div id="sale-product">
        <div class="heading-part mb_20 ">
          <h2 class="main_title">Beautiful Flowers</h2>
        </div>
        <div class="Specials owl-carousel">
          @include('front.special_product')


        </div>
      </div>
      <!-- =====  sale product end ===== -->
      <!-- =====  SUB BANNER  STRAT ===== -->
      <div class="row">
        <div class="cms_banner mt_60 mb_50">
          <div class="col-xs-12">
            <div id="subbanner4" class="banner sub-hover"> <a href="#"><img src="{{asset('public/images/sub4.jpg')}}" alt="Sub Banner4" class="img-responsive"></a>
              <div class="bannertext"> </div>
            </div>
          </div>
        </div>
      </div>
      <!-- =====  SUB BANNER END  ===== -->
      <!-- =====  product ===== -->
      <div class="row">
        <div class="col-md-4">
          <div class="heading-part mb_20 ">
            <h2 class="main_title">Featured</h2>
          </div>
          <div id="featu-pro" class="owl-carousel">

            @include('front.bottom_featured_items')

          </div>
        </div>
        <div class="col-md-4">
          <div class="heading-part mb_20 ">
            <h2 class="main_title">Best Seller</h2>
          </div>
          <div id="bests-pro" class="owl-carousel">
            @include('front.bottom_best_items')
          </div>
        </div>
        <div class="col-md-4">
          <div class="heading-part mb_20 ">
            <h2 class="main_title">New Item’s</h2>
          </div>
          <div id="new-pro" class="owl-carousel">
            @include('front.bottom_new_items')
          </div>
        </div>
      </div>
      <!-- =====  product end  ===== -->
      <!-- =====  Blog ===== -->
      <div id="Blog" class="mt_40">
        <!-- <div class="heading-part mb_20 ">
          <h2 class="main_title">Latest from the Blog</h2>
        </div>
        <div class="blog-contain box">
          <div class="blog owl-carousel ">
            <div class="item">
              <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="{{asset('public/images/blog/blog_img_01.jpg')}}" alt="HealthCare"> </a> </div>
                <div class="post-info mtb_20 ">
                  <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Unknown printer took a galley book.</a> </h6>
                  <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                  <div class="date-time">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="{{asset('public/images/blog/blog_img_02.jpg')}}" alt="HealthCare"> </a></div>
                <div class="post-info mtb_20 ">
                  <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Unknown printer took a galley book.</a> </h6>
                  <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                  <div class="date-time">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="{{asset('public/images/blog/blog_img_03.jpg')}}" alt="HealthCare"> </a></div>
                <div class="post-info mtb_20 ">
                  <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Unknown printer took a galley book.</a> </h6>
                  <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                  <div class="date-time">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="{{asset('public/images/blog/blog_img_04.jpg')}}" alt="HealthCare"> </a></div>
                <div class="post-info mtb_20 ">
                  <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Unknown printer took a galley book.</a> </h6>
                  <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                  <div class="date-time">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="{{asset('public/images/blog/blog_img_05.jpg')}}" alt="HealthCare"> </a></div>
                <div class="post-info mtb_20 ">
                  <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Unknown printer took a galley book.</a> </h6>
                  <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                  <div class="date-time">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="{{asset('public/images/blog/blog_img_06.jpg')}}" alt="HealthCare"> </a></div>
                <div class="post-info mtb_20 ">
                  <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Unknown printer took a galley book.</a> </h6>
                  <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                  <div class="date-time">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- =====  Blog end ===== -->
      </div>
    </div>
  </div>
</div>
<!-- =====  CONTAINER END  ===== -->
<!-- =====  FOOTER START  ===== -->

@include('front.layout.footer')