<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Online Teacher</title>

    <link rel="shortcut icon" href="{{asset('public/images/favicon.png')}}" type="image/png">

    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/LineIcons.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/default.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <script>
    var BASE_URL = "{{ url('') }}";
  </script>
</head>

<body>

    <div class="preloader"> 
        <div class="loader_34">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <header id="home" class="header-area">
        <div class="navigation fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{url('/')}}">
                                <img src="{{asset('public//images/logo.png')}}" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active"><a class="page-scroll" href="#home">Home</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#about">About</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#service">Services</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#work">Portfolio</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#blog">Blog</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#contact">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div id="parallax" class="header-content d-flex align-items-center">
            <div class="header-shape shape-one layer" data-depth="0.10">
                <img src="{{asset('public/images/banner/shape/shape-1.png')}}" alt="Shape">
            </div>
            <div class="header-shape shape-tow layer" data-depth="0.30">
                <img src="{{asset('public/images/banner/shape/shape-2.png')}}" alt="Shape">
            </div>
            <div class="header-shape shape-three layer" data-depth="0.40">
                <img src="{{asset('public/images/banner/shape/shape-3.png')}}" alt="Shape">
            </div>
            <div class="header-shape shape-fore layer" data-depth="0.60">
                <img src="{{asset('public/images/banner/shape/shape-2.png')}}" alt="Shape">
            </div>
            <div class="header-shape shape-five layer" data-depth="0.20">
                <img src="{{asset('public/images/banner/shape/shape-1.png')}}" alt="Shape">
            </div>
            <div class="header-shape shape-six layer" data-depth="0.15">
                <img src="{{asset('public/images/banner/shape/shape-4.png')}}" alt="Shape">
            </div>
            <div class="header-shape shape-seven layer" data-depth="0.50">
                <img src="{{asset('public/images/banner/shape/shape-5.png')}}" alt="Shape">
            </div>
            <div class="header-shape shape-eight layer" data-depth="0.40">
                <img src="{{asset('public/images/banner/shape/shape-3.png')}}" alt="Shape">
            </div>
            <div class="header-shape shape-nine layer" data-depth="0.20">
                <img src="{{asset('public/images/banner/shape/shape-6.png')}}" alt="Shape">
            </div>
            <div class="header-shape shape-ten layer" data-depth="0.30">
                <img src="{{asset('public/images/banner/shape/shape-3.png')}}" alt="Shape">
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="header-content-right">
                            <h4 class="sub-title">Hello, I’m</h4>
                            <h1 class="title">{{$user[0]->name}} {{$user[0]->lname}} </h1>
                            <p>Lecturer of {{$user[0]->lec_subject}}  in {{$user[0]->lec_place}}</p>
                            <a class="main-btn" href="#work">View my Work</a>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-xl-1">
                        <div class="header-image d-none d-lg-block">
                            <img src="{{asset('admin/public/images/users/'.$user[0]->photo)}}" alt="hero">
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-social">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header-social-icon">
                                <ul> 
                                @if($footer->facebook != '')
                                    <li><a href="{{$footer->facebook}}"><i class="lni-facebook-filled"></i></a></li>@endif

                                    @if($footer->twitter != '')
                                    <li><a href="{{$footer->twitter}}"><i class="lni-twitter-original"></i></a></li>@endif
                                    @if($footer->behance != '')
                                    <li><a href="{{$footer->behance}}"><i class="lni-behance-original"></i></a></li>@endif
                                    @if($footer->linked_in != '')
                                    <li><a href="{{$footer->linked_in}}"><i class="lni-linkedin-original"></i></a></li>@endif
                                    
                                    @if($footer->youtube != '')
                                    <li><a href="{{$footer->youtube}}"><i class="lni-youtube"></i></a></li>@endif
                                    @if($footer->instagram != '')
                                    <li><a href="{{$footer->instagram}}"><i class="lni-instagram-original"></i></a></li>@endif
                              
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <section id="about" class="about-area pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h2 class="title">About Me</h2>
                        <!-- <p>Nunc id dui at sapien faucibus fermentum ut vel diam. Nullam tempus, nunc id efficitur sagittis, urna est ultricies eros, ac porta sem turpis quis leo.</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50">
                        <h5 class="about-title">Hi There! I'm {{$user[0]->name}} {{$user[0]->lname}}  </h5>
                        <!-- <p>Lecturer of {{$user[0]->lec_subject}}  in {{$user[0]->lec_place}} </p> -->
                        <p>{{ $user[0]->about }} </p> 
                        <ul class="clearfix">
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-calendar"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Date of birth:</span>&nbsp;{{$user[0]->bday}} </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-envelope"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Email:</span> &nbsp;{{$user[0]->email}} </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-phone-handset"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Phone:</span>&nbsp; {{$user[0]->contact_no}} </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-map-marker"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Location:</span>&nbsp; {{$user[0]->location}} </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">

                    <div class="about-skills pt-25">
                    @foreach($subject as $subjects)
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <h6 class="skill-title">{{$subjects->name}}</h6>
                                <div class="skill-percentage">
                                    <div class="count-box counted">
                                        <span class="counter">{{$subjects->percentage}}</span>
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="{{$subjects->percentage}}"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                        <!-- <div class="skill-item mt-25">
                            <div class="skill-header">
                                <h6 class="skill-title">Mathematics</h6>
                                <div class="skill-percentage">
                                    <div class="count-box counted">
                                        <span class="counter">60</span>
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="60"></div>
                                </div>
                            </div>
                        </div>
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <h6 class="skill-title">Statistics</h6>
                                <div class="skill-percentage">
                                    <div class="count-box counted">
                                        <span class="counter">50</span>
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="50"></div>
                                </div>
                            </div>
                        </div>
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <h6 class="skill-title">Finance</h6>
                                <div class="skill-percentage">
                                    <div class="count-box counted">
                                        <span class="counter">90</span>
                                    </div>
                                    %
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="90"></div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="service" class="services-area gray-bg pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-30">
                        <h2 class="title">My Services</h2>
                        <!-- <p>Nunc id dui at sapien faucibus fermentum ut vel diam. Nullam tempus, nunc id efficitur sagittis, urna est ultricies eros, ac porta sem turpis quis leo.</p> -->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

@foreach($service as $services)
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-service text-center mt-30">
                        <div class="service-icon">
                            <i class="lni-pencil-alt"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="service-title"><a href="#">{{$services->title}}</a></h4>
                            <p>{{$services->description}}</p>
                        </div>
                    </div>
                </div>
@endforeach


                <!-- <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-service text-center mt-30">
                        <div class="service-icon">
                            <i class="lni-color-pallet"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="service-title"><a href="#contact">{{$service[1]->title}} </a></h4>
                            <p>{{$service[1]->description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-service text-center mt-30">
                        <div class="service-icon">
                            <i class="lni-mobile"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="service-title"><a href="#">{{$service[2]->title}}</a></h4>
                            <p>{{$service[2]->description}}.</p>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-service text-center mt-30">
                        <div class="service-icon">
                            <i class="lni-vector"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="service-title"><a href="#">Illustration Design</a></h4>
                            <p>Curabitur vitae magna felis. Nulla ac libero ornare, vestibulum lacus quis blandit enimdicta sunt.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-service text-center mt-30">
                        <div class="service-icon">
                            <i class="lni-website"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="service-title"><a href="#">Web Development</a></h4>
                            <p>Curabitur vitae magna felis. Nulla ac libero ornare, vestibulum lacus quis blandit enimdicta sunt.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-service text-center mt-30">
                        <div class="service-icon">
                            <i class="lni-support"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="service-title"><a href="#">Consultancy and Support</a></h4>
                            <p>Curabitur vitae magna felis. Nulla ac libero ornare, vestibulum lacus quis blandit enimdicta sunt.</p>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </section>


    <section id="call-to-action" class="call-to-action pt-125 pb-130 bg_cover" style="background-image: url(https://preview.uideck.com/items/unfold/assets/images/call-to-action.jpg)">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9">
                    <div class="call-action-content text-center">
                        <h2 class="action-title">Have any project on mind?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua nostrud.</p>
                        <ul>
                            <li><a class="main-btn custom" href="#">download cv</a></li>
                            <li><a class="main-btn custom-2" href="#">hire me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="work" class="work-area pt-125 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title pb-25">
                        <h2 class="title">My Recent Works</h2>
                        <p>Nunc id dui at sapien faucibus fermentum ut vel diam. Nullam tempus, nunc id efficitur sagittis, urna est ultricies eros, ac porta sem turpis quis leo.</p>
                    </div>
                </div>
            </div>
            <div class="row">

@foreach($works as $work)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="{{asset('admin/public/images/works/'.$work->images)}}" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">{{$work->title}}</h3>
                                <ul>
                                    <li><a class="image-popup" href="{{asset('admin/public/images/works/'.$work->images)}}"><i class="lni-plus"></i></a></li>
                                    <li><a href="#"><i class="lni-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


                <!-- <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="{{asset('public/images/work/w-2.jpg')}}" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">Product Design</h3>
                                <ul>
                                    <li><a class="image-popup" href="{{asset('public/images/work/w-2.jpg')}}"><i class="lni-plus"></i></a></li>
                                    <li><a href="#"><i class="lni-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="{{asset('public/images/work/w-3.jpg')}}" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">Product Design</h3>
                                <ul>
                                    <li><a class="image-popup" href="{{asset('public/images/work/w-3.jpg')}}"><i class="lni-plus"></i></a></li>
                                    <li><a href="#"><i class="lni-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="{{asset('public/images/work/w-4.jpg')}}" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">Product Design</h3>
                                <ul>
                                    <li><a class="image-popup" href="{{asset('public/images/work/w-4.jpg')}}"><i class="lni-plus"></i></a></li>
                                    <li><a href="#"><i class="lni-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="{{asset('public/images/work/w-5.jpg')}}" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">Product Design</h3>
                                <ul>
                                    <li><a class="image-popup" href="{{asset('public/images/work/w-4.jpg')}}"><i class="lni-plus"></i></a></li>
                                    <li><a href="#"><i class="lni-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="{{asset('public/images/work/w-5.jpg')}}" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">Product Design</h3>
                                <ul>
                                    <li><a class="image-popup" href="{{asset('public/images/work/w-5.jpg')}}"><i class="lni-plus"></i></a></li>
                                    <li><a href="#"><i class="lni-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-work text-center mt-30">
                        <div class="work-image">
                            <img src="{{asset('public/images/work/w-6.jpg')}}" alt="work">
                        </div>
                        <div class="work-overlay">
                            <div class="work-content">
                                <h3 class="work-title">Product Design</h3>
                                <ul>
                                    <li><a class="image-popup" href="{{asset('public/images/work/w-6.jpg')}}"><i class="lni-plus"></i></a></li>
                                    <li><a href="#"><i class="lni-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="work-more text-center mt-50">
                        <a class="main-btn" href="#">more works</a>
                    </div>
                </div>
            </div> -->
        </div>
    </section>


    <section id="pricing" class="pricing-area gray-bg pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-25">
                        <h2 class="title">My Pricing Plans</h2>
                        <!-- <p>Nunc id dui at sapien faucibus fermentum ut vel diam. Nullam tempus, nunc id efficitur sagittis, urna est ultricies eros, ac porta sem turpis quis leo.</p> -->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8 col-sm-9">
                    <div class="single-pricing text-center mt-30">
                        <div class="pricing-package">
                            <h4 class="package-title">Private Lesson</h4>
                        </div>
                        <div class="pricing-body">
                            <div class="pricing-text">
                                <p>Simple project management for teams and small businesses.</p>
                                <span class="price">100-200 INS</span>
                            </div>
                            <div class="pricing-list">
                                <ul>
                                    <li>Unlimited Tasks</li>
                                    <li>Unlimited Public</li>
                                    <li>Private Projects</li>
                                    <li>Unlimited Teams</li>
                                    <li>All Integrations</li>
                                    <li>Public API</li>
                                </ul>
                            </div>
                            <div class="pricing-btn">
                                <a class="main-btn" href="#contact">get quote</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-9">
                    <div class="single-pricing active text-center mt-30">
                        <div class="pricing-package">
                            <h4 class="package-title">Project Guidance</h4>
                        </div>
                        <div class="pricing-body">
                            <div class="pricing-text">
                                <p>Simple project management for teams and small businesses.</p>
                                <span class="price">1000-2000 INS</span>
                            </div>
                            <div class="pricing-list">
                                <ul>
                                    <li>Unlimited Tasks</li>
                                    <li>Unlimited Public</li>
                                    <li>Private Projects</li>
                                    <li>Unlimited Teams</li>
                                    <li>All Integrations</li>
                                    <li>Public API</li>
                                </ul>
                            </div>
                            <div class="pricing-btn">
                                <a class="main-btn" href="#contact">get quote</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-9">
                    <div class="single-pricing text-center mt-30">
                        <div class="pricing-package">
                            <h4 class="package-title">Full Course</h4>
                        </div>
                        <div class="pricing-body">
                            <div class="pricing-text">
                                <p>Simple project management for teams and small businesses.</p>
                                <span class="price">3500 INS</span>
                            </div>
                            <div class="pricing-list">
                                <ul>
                                    <li>Unlimited Tasks</li>
                                    <li>Unlimited Public</li>
                                    <li>Private Projects</li>
                                    <li>Unlimited Teams</li>
                                    <li>All Integrations</li>
                                    <li>Public API</li>
                                </ul>
                            </div>
                            <div class="pricing-btn">
                                <a class="main-btn" href="#contact">get quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="blog" class="blog-area pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-25">
                        <h2 class="title">From The Blog</h2>
                        <p>Nunc id dui at sapien faucibus fermentum ut vel diam. Nullam tempus, nunc id efficitur sagittis, urna est ultricies eros, ac porta sem turpis quis leo.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8 col-sm-9">
                    <div class="single-blog mt-30">
                        <div class="blog-image">
                            <img src="{{asset('public/images//blog/b-1.jpg')}}" alt="Blog">
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title"><a href="#">Hired Releases 2023 Brand Health.</a></h4>
                            <span>July 26, 2022</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-9">
                    <div class="single-blog mt-30">
                        <div class="blog-image">
                            <img src="{{asset('public/images//blog/b-2.jpg')}}" alt="Blog">
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title"><a href="#">Hired Releases 2023 Brand Health.</a></h4>
                            <span>July 26, 2022</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-9">
                    <div class="single-blog mt-30">
                        <div class="blog-image">
                            <img src="{{asset('public/images//blog/b-3.jpg')}}" alt="Blog">
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title"><a href="#">Hired Releases 2023 Brand Health.</a></h4>
                            <span>July 26, 2022</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-more text-center mt-50">
                        <a class="main-btn" href="#">More posts</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="contact" class="contact-area pt-125 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-25">
                        <h2 class="title">Get In Touch</h2>
                        <!-- <p>Nunc id dui at sapien faucibus fermentum ut vel diam. Nullam tempus, nunc id efficitur sagittis, urna est ultricies eros, ac porta sem turpis quis leo.</p> -->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-whatsapp"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">whatsapp</h6>
                            <p>{{$user[0]->whatsapp}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-phone"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Phone</h6>
                            <p>{{$user[0]->contact_no}}</p>
                            <!-- <p>+547 5554 6663</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-envelope"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Email</h6>
                            <p>{{$user[0]->email}}</p>
                            <!-- <p>info@helpline.com</p> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form pt-30">

                    <form id="contact_body">

                            {{ csrf_field() }}
                            <div class="single-form">
                                <!-- <input type="text" name="name" placeholder="Name"> -->

                                <input type="text" name="name" placeholder="Name" data-required="true" class="{{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }}" />
              @if($errors->any())
              <p class="invalid-feedback">{{$errors->first('name')}}</p>
              @endif
                            </div>
                            <div class="single-form">
                                <!-- <input type="email" name="email" placeholder="Email"> -->

                                <input  type="email" name="email" placeholder="Email Address" data-required="true" class="{{ ($errors->any() && $errors->first('email')) ? 'is-invalid' : '' }}" />
              @if($errors->any())
              <p class="invalid-feedback">{{$errors->first('email')}}</p>
              @endif
                            </div>

                            <div class="single-form">
                                <!-- <textarea name="message" placeholder="Message"></textarea> -->

                                <textarea name="message" placeholder="Message" data-required="true" class="{{ ($errors->any() && $errors->first('message')) ? 'is-invalid' : '' }}"></textarea>
              @if($errors->any())
              <p class="invalid-feedback">{{$errors->first('message')}}</p>
              @endif
                            </div>
                            <p class="form-message"></p>
                            <div class="single-form">
                                <!-- <button class="main-btn" type="submit">Send Message</button> -->
                                <button class="main-btn" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer id="footer" class="footer-area">
        <div class="footer-widget pt-130 pb-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="footer-content text-center">
                            <a href="{{url('/')}}">
                                <img src="{{asset('public/images/logo-2.jpg')}}" alt="Logo">
                            </a>
                            <p class="mt-">
                       {{$footer->content}}
                            </p>
                            <ul>

                            @if($footer->facebook != '')
                                <li><a href="{{$footer->facebook}}"><i class="lni-facebook-filled"></i></a></li>@endif
                                @if($footer->twitter != '')
                                <li><a href="{{$footer->twitter}}"><i class="lni-twitter-original"></i></a></li>@endif
                                @if($footer->pinterest != '')
                                <li><a href="{{$footer->pinterest}}"><i class="lni-pinterest"></i></a></li>@endif
                                @if($footer->linked_in != '')
                                <li><a href="{{$footer->linked_in}}"><i class="lni-linkedin-original"></i></a></li>@endif

                                     @if($footer->youtube != '')
                                    <li><a href="{{$footer->youtube}}"><i class="lni-youtube"></i></a></li>@endif
                                    @if($footer->instagram != '')
                                    <li><a href="{{$footer->instagram}}"><i class="lni-instagram-original"></i></a></li>@endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text text-center pt-20">
                            <p>Copyright © 2020. All rights reserved by Online Teacher!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>


    <script src="{{asset('public/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('public/js/vendor/jquery-1.12.4.min.js')}}"></script>

    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/popper.min.js')}}"></script>

    <script src="{{asset('public/js/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{asset('public/js/parallax.min.js')}}"></script>

    <script src="{{asset('public/js/waypoints.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.counterup.min.js')}}"></script>

    <script src="{{asset('public/js/ajax-contact.js')}}"></script>

    <script src="{{asset('public/js/jquery.appear.min.js')}}"></script>

    <script src="{{asset('public/js/scrolling-nav.js')}}"></script>
    <script src="{{asset('public/js/jquery.easing.min.js')}}"></script>

    <script src="{{asset('public/js/validator.min.js')}}"></script>

    <script src="{{asset('public/js/main.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous">
    </script>

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
</body>



</html>