<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    {{-- <title>{{ 'Cửa Hàng Điện Thoại QTV' }}</title> --}}
    <title>@yield('title')</title>
    <title>@yield('meta_keyword')</title>
    <title>@yield('meta_description')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('./frontend_assets/imgs/theme/qtvmobie.ico')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/custom.css')}}">
    <!-- AlertifyJS CDN-->
    <!-- CSS -->
    <script src="{{ asset('frontend_assets/alertify/js/alertify.min.js')}}"></script>

    {{-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/> --}}
    <link rel="stylesheet" href="{{asset('frontend_assets/alertify/css/alertify.min.css')}}">

    <!-- Default theme -->
    <link rel="stylesheet" href="{{asset('frontend_assets/alertify/css/themes/default.min.css')}}">

    {{-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/> --}}
    <!-- AlertifyJS CDN-->

</head>
@livewireStyles

<body>
    <header class="header-area header-style-1 header-height-2">

        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-xl-12 col-lg-12">
                        <div class="header-info header-info-right">
                            @auth
                            <ul>
                                <li><i class="fi-rs-user"></i>{{Auth::user()->name}} /
                                    <form method="POST" action="{{route('logout')}}">
                                        @csrf
                                        <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                                </li>
                                </form>
                            </ul>
                            @else
                            <ul>
                                <li><i class="fi-rs-user"></i>
                                    <a href="{{route('login')}}">Log In </a>/<a href="{{url('register')}}">Sign Up</a>
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- header 2 --}}
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    {{-- logo Shop --}}
                    <div class="logo logo-width-1">
                        <a href="{{url('/home')}}"><img src="{{asset('/frontend_assets/imgs/logo/qtvshop.png')}}" alt="logo"></a>
                    </div>
                    {{-- logo Shop --}}
                    <div class="header-right">
                        {{--search --}}
                        <div class="search-style-1">
                            <form action="{{ url('search') }}" method="GET" role="search">
                                <input name="search_txt" value="{{ Request::get('search_txt') }}" type="text" placeholder="Search for items...">
                                <button class="btn bg-white" type="submit">Search</button>
                            </form>
                        </div>
                        {{--search --}}
                        {{--card and whilst list--}}
                        <div class="header-action-right">
                            <div class="header-action-2">
                                {{-- Check Login first show wishlist and cart --}}
                                @auth
                                {{--whislt list --}}
                                <div class="header-action-icon-2">
                                    @csrf
                                    <a href="{{ url('/Whistlist') }}">
                                        {{-- <a href="#" wire:click="showwishlist()"> --}}
                                        <img class="svgInject" alt="Surfside Media" src="{{asset('frontend_assets/imgs/theme/icons/icon-heart.svg')}}">
                                        <span class="pro-count blue">
                                            <livewire:frontend.wishlist-count>
                                        </span>
                                    </a>


                                </div>
                                {{--whislt list --}}
                                {{-- Cart shop --}}
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{ url('/Cart') }}">
                                        <img alt="Surfside Media" src="{{asset('frontend_assets/imgs/theme/icons/icon-cart.svg')}}">
                                        <span class="pro-count blue">
                                            <livewire:front-end.cart.cart-count>
                                        </span>
                                    </a>

                                </div>
                                {{-- Cart shop --}}
                                @endif
                                {{-- Check Login first show wishlist and cart --}}
                            </div>
                        </div>
                        {{--card and whilst list--}}
                    </div>
                </div>
            </div>
        </div>
        {{-- header 2 --}}
        {{-- header 3 --}}
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="home"><img src="{{asset('/frontend_assets/imgs/logo/qtvshop.png')}}" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">


                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="{{url('/home')}}">Home</a></li>
                                    <li><a href="news">News</a></li>
                                    <li><a href="{{url('/collections')}}">All collections</a></li>
                                    {{-- <li><a href="shop">Shop</a></li> --}}
                                    <li><a href="{{url('/Blog')}}">Blog </a></li>
                                    <li><a href="{{url('/Contact')}}">Contact</a></li>
                                    @auth
                                    <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/Orders/')}}">My Order</a></li>
                                            <li><a href="{{url('/Profile/')}}">My Profile</a></li>
                                        </ul>
                                    </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-smartphone"></i><span>Hot Line</span><a href="tel:">0383334195</a></p>
                    </div>
                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%
                    </p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.php">
                                    <img alt="Surfside Media" src="frontend_assets/imgs/theme/icons/icon-heart.svg">
                                    <span class="pro-count white">1</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="cart">
                                    <img alt="Surfside Media" src="frontend_assets/imgs/theme/icons/icon-cart.svg">
                                    <span class="pro-count white">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media" src="frontend_assets/imgs/shop/thumbnail-3.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                                <h3><span>1 × </span>$800.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media" src="frontend_assets/imgs/shop/thumbnail-4.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                                <h3><span>1 × </span>$3500.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$383.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="cart">View cart</a>
                                            <a href="shop-checkout.php">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- header 3 --}}
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="home"><img src="{{asset('frontend_assets/imgs/logo/qtvshop.png')}}" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    {{-- <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form> --}}

                    <form action="{{ url('search') }}" method="GET" role="search">
                        <input name="search_txt" value="{{ Request::get('search_txt') }}" type="text" placeholder="Search for items...">
                        <button class="btn bg-white" type="submit" class="fi-rs-search">Search</button>
                    </form>

                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a href=" {{url('/home')}}"> Home </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="news">New</a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="{{url('/collections')}}">All collections</a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="{{url('/Blog')}}">Blog</a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="{{url('/Contact')}}">Contact</a>
                    </div>
                    @auth
                    <div class="mobile-menu-wrap mobile-header-border">
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="#">My Account</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="{{url('/Orders/')}}">My order</a>

                                        </li>
                                        <li class="menu-item-has-children">

                                            <a href="{{url('/Profile/')}}">My Profile</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    @endif
                    <div class="single-mobile-header-info">
                        <a href="tel:">0383334195</a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="https://www.facebook.com/nhqkz95/"><img src="frontend_assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    @yield('contentHome')

    <footer class="main">
        <section class="newsletter p-30 text-white wow fadeIn animated">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-md-3 mb-lg-0">
                        <div class="row align-items-center">
                            <div class="col flex-horizontal-center">
                                <img class="icon-email" src="frontend_assets/imgs/theme/icons/icon-email.svg" alt="">
                                <h5 class="font-size-20 mb-0 ml-3">Đăng Ký để Nhận Thông Tin Mới</h5>
                            </div>
                            <div class="col my-4 my-md-0 des">
                                <h5 class="font-size-15 ml-4 mb-0">...và nhận <strong>Phiếu giảm giá 5% cho lần đầu mua
                                        hàng.</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Subscribe Form -->
                        <form class="form-subcriber d-flex wow fadeIn animated">
                            <input type="email" class="form-control bg-white font-small" placeholder="Enter your email">
                            <button class="btn bg-dark text-white" type="submit">Theo Dõi</button>
                        </form>
                        <!-- End Subscribe Form -->
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="home"><img src="{{asset('frontend_assets/imgs/logo/qtvshop.png')}}" alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                            <p class="wow fadeIn animated">
                                <strong>Địa Chỉ: </strong>Chung Cư Prosper Plaza
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Phone: </strong><a href="tel:">0383334195</a>
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Email: </strong> <a href="email:">quannhts2201011@fpt.edu.vn</a>
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href="https://www.facebook.com/nhqkz95"><img src="frontend_assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                                <a href="https://github.com/hongquan12345"><img src="frontend_assets/imgs/theme/icons/icon-githubt.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">About</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="{{ url('Blog') }}">Blog</a></li>
                            <li><a href="{{ url('news') }}">New</a></li>
                            <li><a href="{{ url('Contact') }}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">My Account</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="{{ url('Profile') }}">My Account</a></li>
                            <li><a href="{{ url('Cart') }}">View Cart</a></li>
                            <li><a href="{{ url('Whistlist') }}">My Wishlist</a></li>
                            <li><a href="{{ url('Orders') }}">Track My Order</a></li>

                        </ul>
                    </div>
                    <div class="col-lg-4 mob-center">
                        <h5 class="widget-title wow fadeIn animated">Cài Đặt Ứng Dụng Mua Hàng</h5>
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <p class="wow fadeIn animated">Từ App Store và Google Play</p>
                                <p class="wow fadeIn animated alert-danger">Coming soon</p>
                                <div class="download-app wow fadeIn animated mob-app">
                                    <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="frontend_assets/imgs/theme/app-store.jpg" alt=""></a>
                                    <a href="#" class="hover-up"><img src="frontend_assets/imgs/theme/google-play.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">Cổng Thanh Toán An Toàn</p>
                                <img class="wow fadeIn animated" src="frontend_assets/imgs/theme/payment-method.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">
                        <a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-conditions.html">Terms &
                            Conditions</a>
                    </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">QTV</strong> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend_assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/slick.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/wow.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/counterup.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/isotope.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/plugins/jquery.elevatezoom.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend_assets/js/main.js?v=3.3')}}"></script>
    <script src="{{ asset('frontend_assets/js/shop.js?v=3.3')}}"></script>

    <!-- AlertifyJS CDN-->
    <!-- JavaScript -->
    <script src="{{ asset('frontend_assets/alertify/js/alertify.min.js')}}"></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> --}}
    <script>
        window.addEventListener('message', event => {


            alertify.set('notifier', 'position', 'top-right');
            alertify.notify(event.detail.text, event.detail.type);
        });
    </script>

    <!-- AlertifyJS CDN-->

    @livewireScripts
</body>

</html>
