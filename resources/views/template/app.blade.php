@php
use App\About;
//dd(About::get()->first());
@endphp
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>News HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('themes/assets/img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('themes/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('themes/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('themes/assets/css/ticker-style.css')}}">
    <link rel="stylesheet" href="{{asset('themes/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('themes/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('themes/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('themes/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('themes/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('themes/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('themes/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('themes/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('themes/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('themes/assets/img/logo/logo.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-mid gray-bg">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                                <div class="logo">
                                    <a href="{{url('/')}}"><img src="{{asset('themes/assets/img/logo/logo.png')}}" alt=""></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="index.html"><img src="{{asset('themes/assets/img/logo/logo.png')}}" alt=""></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation">
                                            @include('template.menu.menu1')
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="header-right f-right d-none d-lg-block">
                                    <!-- Heder social -->
                                    <ul class="header-social">
                                        @if(Auth::check())
                                        <!-- <li> <a href="#"><i class="fas fa-user"></i>{{Auth::user()->name}}</a></li> -->

                                        <button style="padding:0px" type="button" class="btn btn-outline-primary nohover dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-user"></i>{{Auth::user()->name}}
                                        </button>
                                        <div class="dropdown-menu">
                                            <!-- route panel dashboard  -->
                                            <a class="dropdown-item" href="{{route('dashboard')}}">Panel</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{url('/logout')}}">Log out</a>
                                        </div>


                                        @else
                                        <li> <a href="{{route('creator.register')}}"><i class="fas fa-sign-in-alt"></i>Register</a></li>
                                        <li> <a href="{{route('login')}}"><i class="fas fa-sign-in-alt"></i>Login</a></li>
                                        @endif
                                    </ul>
                                    <!-- Search Nav -->
                                    <div class="nav-search search-switch">
                                        <i class="fa fa-search"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-main footer-bg">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo">
                                        <a href="{{url('/')}}"><img src="{{asset('themes/assets/img/logo/logo2_footer.png')}}" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            @if(About::get()->first() != null)
                                            <p class="info1">{{About::get()->first()->description}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- footer-bottom aera -->
            <div class="footer-bottom-area footer-bg">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy;<script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Search model Begin -->
    <div class="search-model-box">
        <div class="d-flex align-items-center h-100 justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form" action="{{route('user.search')}}" method="get">@csrf
                <input type="text" id="search-input" name="keyword" placeholder="Searching key....." autofocus>
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->

    <script src="{{asset('themes/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('themes/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('themes/assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('themes/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/slick.min.js')}}"></script>
    <!-- Date Picker -->
    <script src="{{asset('themes/assets/js/gijgo.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('themes/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/animated.headline.js')}}"></script>
    <script src="{{asset('themes/assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{asset('themes/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/jquery.sticky.js')}}"></script>

    <!-- contact js -->
    <script src="{{asset('themes/assets/js/contact.js')}}"></script>
    <script src="{{asset('themes/assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('themes/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('themes/assets/js/mail-script.js')}}"></script>
    <script src="{{asset('themes/assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{asset('themes/assets/js/plugins.js')}}"></script>
    <script src="{{asset('themes/assets/js/main.js')}}"></script>

</body>

</html>