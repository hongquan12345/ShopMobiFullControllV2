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
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('./frontend_assets/imgs/theme/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/custom.css')}}">
</head>
@livewireStyles
<body>
    <header class="header-area header-style-1 header-height-2">

        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li>
                                    <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i> English <i
                                            class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li><a href="#"><img src="frontend_assets/imgs/theme/flag-fr.png"
                                                    alt="">Français</a></li>
                                        <li><a href="#"><img src="frontend_assets/imgs/theme/flag-dt.png"
                                                    alt="">Deutsch</a></li>
                                        <li><a href="#"><img src="frontend_assets/imgs/theme/flag-ru.png"
                                                    alt="">Pусский</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                         </div>
                        <div class="col-xl-6 col-lg-4">
                            <div class="text-center">
                                <div id="news-flash" class="d-inline-block">
                                    <ul>
                                        <li>Get great devices up to 50% off <a href="shop">View details</a></li>
                                        <li>Supper Value Deals - Save more with coupons</li>
                                        <li>Trendy 25silver jewelry, save up 35% off today <a href="shop">Shop now</a></li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                    <div class="col-xl-12 col-lg-12">
                        <div class="header-info header-info-right">
                            @auth
                            <ul>
                                <li><i class="fi-rs-user"></i>{{Auth::user()->name}} /
                                    <form method="POST" action="{{route('logout')}}">
                                        @csrf
                                        <a href="{{route('logout')}}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                                </li>
                                </form>
                            </ul>
                            @else
                            <ul>
                                <li><i class="fi-rs-user"></i><a href="{{route('login')}}">Log In </a> / <a
                                        {{-- href="{{route('register')}}">Sign Up</a></li> --}}
                                        href="{{url('register')}}">Sign Up</a></li>

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
                                <form action="#">
                                    <input type="text" placeholder="Search for items...">
                                </form>
                            </div>
                            {{--search --}}
                            {{--card and whilst list--}}
                            <div class="header-action-right">
                                <div class="header-action-2">
                                    {{--whislt list --}}
                                    <div class="header-action-icon-2">
                                        <a href="shop-wishlist.php">
                                            <img class="svgInject" alt="Surfside Media"
                                                src="{{asset('frontend_assets/imgs/theme/icons/icon-heart.svg')}}">
                                            <span class="pro-count blue">4</span>
                                        </a>
                                    </div>
                                    {{--whislt list --}}
                                    {{-- Cart shop --}}
                                    <div class="header-action-icon-2">
                                        <a class="mini-cart-icon" href="cart">
                                            <img alt="Surfside Media" src="{{asset('frontend_assets/imgs/theme/icons/icon-cart.svg')}}">
                                            <span class="pro-count blue">2</span>
                                        </a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <ul>
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a href="product-details.html"><img alt="Surfside Media"
                                                        src="frontend_assets/imgs/shop/thumbnail-3.jpg"></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="product-details.html">Daisy Casual Bag</a></h4>
                                                        <h4><span>1 × </span>$800.00</h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>

                                            </ul>
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <h4>Total <span>$4000.00</span></h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="cart" class="outline">View cart</a>
                                                    <a href="checkout">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Cart shop --}}
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
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Browse Categories
                            </a>
                            {{-- Browse Categories childern --}}
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul>
                                    <li>

                                        <a href="#"><i class="surfsidemedia-font-desktop"></i><strong></strong>
                                        </a>

                                    </li>
                                </ul>
                            </div>
                            {{-- Browse Categories childern --}}
                        </div>

                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="{{url('/home')}}">Home</a></li>
                                    <li><a href="{{url('/collections')}}">All Collections</a></li>
                                    <li><a href="shop">Shop</a></li>
                                    {{-- <li class="position-static"><a href="#">Our Collections
                                        <i
                                            class="fi-rs-angle-down"></i></a>
                                            <ul class="mega-menu">
                                                <li class="sub-mega-menu sub-mega-menu-width-22">
                                                    <a class="menu-title" href="#">Women's Fashion</a>
                                                    <ul>
                                                        <li><a href="product-details.html">Dresses</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sub-mega-menu sub-mega-menu-width-34">
                                                    <div class="menu-banner-wrap">
                                                        <a href="product-details.html"><img
                                                                src="frontend_assets/imgs/banner/menu-banner.jpg"
                                                                alt="Surfside Media"></a>
                                                        <div class="menu-banner-content">
                                                            <h4>Hot deals</h4>
                                                            <h3>Don't miss<br> Trending</h3>
                                                            <div class="menu-banner-price">
                                                                <span class="new-price text-success">Save to 50%</span>
                                                            </div>
                                                            <div class="menu-banner-btn">
                                                                <a href="product-details.html">Shop now</a>
                                                            </div>
                                                        </div>
                                                        <div class="menu-banner-discount">
                                                            <h3>
                                                                <span>35%</span>
                                                                off
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                    </li> --}}
                                    <li><a href="blog.html">Blog </a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Dashboard </a></li>
                                            <li><a href="#">Products </a></li>
                                            <li><a href="#">Categories </a></li>
                                            <li><a href="#">Coupons </a></li>
                                            <li><a href="#">Orders </a></li>
                                            <li><a href="#">Customers </a></li>
                                            <li><a href="#">Logout </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-smartphone"></i><span>Hot Line</span>09383334195</p>
                    </div>

                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%
                    </p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.php">
                                    <img alt="Surfside Media" src="frontend_assets/imgs/theme/icons/icon-heart.svg">
                                    <span class="pro-count white">4</span>
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
                                                <a href="product-details.html"><img alt="Surfside Media"
                                                        src="frontend_assets/imgs/shop/thumbnail-3.jpg"></a>
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
                                                <a href="product-details.html"><img alt="Surfside Media"
                                                        src="frontend_assets/imgs/shop/thumbnail-4.jpg"></a>
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
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                <li><a href="shop"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a></li>
                                <li><a href="shop"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a></li>
                                <li> <a href="shop"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a></li>
                                <li><a href="shop"><i class="surfsidemedia-font-desktop"></i>Computer & Office</a></li>
                                <li><a href="shop"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a></li>
                                <li><a href="shop"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                                <li><a href="shop"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                                <li><a href="shop"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a></li>
                                <li><a href="shop"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="home">Home</a>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="shop">shop</a>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our
                                    Collections</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Dresses</a></li>
                                            <li><a href="product-details.html">Blouses & Shirts</a></li>
                                            <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="product-details.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Jackets</a></li>
                                            <li><a href="product-details.html">Casual Faux Leather</a></li>
                                            <li><a href="product-details.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Gaming Laptops</a></li>
                                            <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                            <li><a href="product-details.html">Tablets</a></li>
                                            <li><a href="product-details.html">Laptop Accessories</a></li>
                                            <li><a href="product-details.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="blog.html">Blog</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a href="contact.html"> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="login.html">Log In </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="register.html">Sign Up</a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#">(+1) 0000-000-000 </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="#"><img src="frontend_assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                    <a href="#"><img src="frontend_assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                    <a href="#"><img src="frontend_assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                    <a href="#"><img src="frontend_assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                    <a href="#"><img src="frontend_assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
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
                                <strong>Phone: </strong>0383334195
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Email: </strong>quannhts2201011@fpt.edu.vn
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href="#"><img src="frontend_assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                                <a href="#"><img src="frontend_assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                                <a href="#"><img src="frontend_assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                                <a href="#"><img src="frontend_assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                                <a href="#"><img src="frontend_assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">About</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">My Account</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Order</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 mob-center">
                        <h5 class="widget-title wow fadeIn animated">Cài Đặt Ứng Dụng Mua Hàng</h5>
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <p class="wow fadeIn animated">Từ App Store và Google Play</p>
                                <div class="download-app wow fadeIn animated mob-app">
                                    <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active"
                                            src="frontend_assets/imgs/theme/app-store.jpg" alt=""></a>
                                    <a href="#" class="hover-up"><img src="frontend_assets/imgs/theme/google-play.jpg"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">Cổng Thanh Toán An Toàn</p>
                                <img class="wow fadeIn animated" src="frontend_assets/imgs/theme/payment-method.png"
                                    alt="">
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
    @livewireScripts
</body>

</html>
