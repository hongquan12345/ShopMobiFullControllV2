@extends('layouts.index')
@section('contentHome')
<main class="main">
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            {{-- @foreach ($sliders as $key => $slidersItem)
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">{{$slidersItem->title}}</h4>
                                <h1 class="animated fw-900 text-brand">{{$slidersItem->description}}</h1>                                
                                <a class="animated btn btn-brush btn-brush-3" href="#">Shop Now
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                @if ($slidersItem->image)
                                    <img class="animated slider-1-1" src="{{$slidersItem->image}}" style="width: 800px;height: 540px;" alt="">
                                @else
                                    <img class="animated slider-1-1" src="{{asset('emptyimage.jpg')}}" alt="">
                                @endif
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach --}}
            @forelse ($sliders as $key => $slidersItem )
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated fw-900 text-brand">{{$slidersItem->title}}</h4>
                                <h1 class="animated ">{{$slidersItem->description}}</h1>                                
                                <a class="animated btn btn-brush btn-brush-3" href="#">Shop Now
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                @if ($slidersItem->image)
                                    <img class="animated slider-1-1" src="{{$slidersItem->image}}" style="width: 800px;height: 540px;" alt="">
                                @else
                                    <img class="animated slider-1-1" src="{{asset('emptyimage.jpg')}}" alt="">
                                @endif
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Empty</h4>
                                <h1 class="animated fw-900 text-brand">Empty</h1>                                
                                <a class="animated btn btn-brush btn-brush-3" href="#">Empty
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">   
                                <img class="animated slider-1-1" src="{{asset('/emptyimage.jpg')}}" style="width: 800px;height: 540px;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
            

        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>

    {{-- Category --}}
        <section class="popular-categories section-padding mt-15 mb-25">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
                <div class="carausel-6-columns-cover position-relative">
                    
                    <div class="carausel-6-columns" id="carausel-6-columns">
                        @forelse ($categorys as $categoryItem )
                        <div class="card-1" >
                            <a href="{{'/collections/'.$categoryItem->slug}}">
                                <figure class="img-hover-scale overflow-hidden">
                                    @if ($categoryItem->image)
                                    <img src="{{asset("$categoryItem->image")}}" style="width: 300px;height:300px">
                                    @else
                                    <img src="{{asset('emptyimage.jpg')}}" style="width: 300px;height:300px" alt="">
                                    @endif                       
                                </figure>
                                <h3 class="animated fw-900 text-brand">{{$categoryItem->name}}</h3>
                                <h5 class="animated fw-300 text-bg-warning">{{$categoryItem->description}}</h5>
                            </a>
                        </div> 
                        @empty
                                <h5>No Category Available</h5>
                        @endforelse                    

                    </div>
                   
                </div>
               
            </div>
        </section>
        <div class="top-content">
            <div class="container-fluid">
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="{{$slidersItem->image}}" class="img-fluid mx-auto d-block" alt="img1">
                          
                        </div>                       
                    </div>
                   
                </div>
            </div>
        </div>
    {{-- Category --}}


    {{-- các dịch vụ đi kèm}}
        {{-- <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                            <h4 class="bg-1">Free Shipping</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                            <h4 class="bg-3">Online Order</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-3.png" alt="">
                            <h4 class="bg-2">Save Money</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-4.png" alt="">
                            <h4 class="bg-4">Promotions</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-5.png" alt="">
                            <h4 class="bg-5">Happy Sell</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-6.png" alt="">
                            <h4 class="bg-6">24/7 Support</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    {{-- Product tag --}}
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                            data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                            aria-selected="true">Sản Phẩm Hot</button>
                    </li>
                </ul>
                <a href="#" class="view-more d-none d-md-flex">View More<i
                        class="fi-rs-angle-double-small-right"></i></a>
            </div>

            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">

                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                     
                       <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="#">
                                        <img class="default-img" src="{{ asset('assets/imgs/iphone14_1.jpg') }}"
                                            alt="iphone14_1.jpg">
                                        <img class="hover-img" src="{{ asset('assets/imgs/iphone14_2.jpg') }}"
                                            alt="iphone14_2.jpg">
                                    </a>
                                </div>

                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn hover-up"
                                        data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                            class="fi-rs-eye"></i></a>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                        href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                            class="fi-rs-shuffle"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="#">Mobile</a>
                                </div>
                                <h2><a href="product-details.html">iPhone 14 128GB | Chính hãng VN/A</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                        <span>90%</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>21.990.000₫</span>
                                    <span class="old-price">24.990.000₫</span>
                                </div>
                                <div class="product-action-1 show">
                                    <a aria-label="Add To Cart" class="action-btn hover-up"
                                        href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                      
                        
                    </div>


                    <!--End product-grid-4-->
                </div>

                <!--En tab one (Featured)-->





                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="default-img" src="assets/imgs/shop/product-9-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Donec </a>
                                    </div>
                                    <h2><a href="product-details.html">Lorem ipsum dolor</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$238.85 </span>
                                        <span class="old-price">$245.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="default-img" src="assets/imgs/shop/product-10-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-10-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="new">New</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Music</a>
                                    </div>
                                    <h2><a href="product-details.html">Sed tincidunt interdum</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>50%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$138.85 </span>
                                        <span class="old-price">$255.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="default-img" src="assets/imgs/shop/product-11-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-11-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="best">Best Sell</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Watch</a>
                                    </div>
                                    <h2><a href="product-details.html">Fusce metus orci</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>95%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$338.85 </span>
                                        <span class="old-price">$445.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="default-img" src="assets/imgs/shop/product-12-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-12-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="sale">Sale</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Music</a>
                                    </div>
                                    <h2><a href="product-details.html">Integer venenatis libero</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>70%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$123.85 </span>
                                        <span class="old-price">$235.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="default-img" src="assets/imgs/shop/product-13-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-13-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">-30%</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Speaker</a>
                                    </div>
                                    <h2><a href="product-details.html">Cras tempor orci id</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>70%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$28.85 </span>
                                        <span class="old-price">$45.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="default-img" src="assets/imgs/shop/product-14-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-14-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">-22%</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Camera</a>
                                    </div>
                                    <h2><a href="product-details.html">Nullam cursus mi qui</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>70%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$238.85 </span>
                                        <span class="old-price">$245.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="default-img" src="assets/imgs/shop/product-15-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-15-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="new">New</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Phone</a>
                                    </div>
                                    <h2><a href="product-details.html">Fusce fringilla ultrices</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>98%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$1275.85 </span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="default-img" src="assets/imgs/shop/product-1-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Accessories </a>
                                    </div>
                                    <h2><a href="product-details.html">Sed sollicitudin est</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>70%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$238.85 </span>
                                        <span class="old-price">$245.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two (Popular)-->
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="default-img" src="assets/imgs/shop/product-2-1.jpg"
                                                alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Music</a>
                                    </div>
                                    <h2><a href="product-details.html">Donec ut nisl rutrum</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$238.85 </span>
                                        <span class="old-price">$245.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="assets/imgs/shop/product-3-1.jpg"
                                                alt="">
                                            <img class="default-img" src="assets/imgs/shop/product-3-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="new">New</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Music</a>
                                    </div>
                                    <h2><a href="product-details.html">Nullam dapibus pharetra</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>50%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$138.85 </span>
                                        <span class="old-price">$255.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="assets/imgs/shop/product-4-1.jpg"
                                                alt="">
                                            <img class="default-img" src="assets/imgs/shop/product-4-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="best">Best Sell</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Watch</a>
                                    </div>
                                    <h2><a href="product-details.html">Morbi dictum finibus</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>95%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$338.85 </span>
                                        <span class="old-price">$445.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="assets/imgs/shop/product-5-1.jpg"
                                                alt="">
                                            <img class="default-img" src="assets/imgs/shop/product-5-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="sale">Sale</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Music</a>
                                    </div>
                                    <h2><a href="product-details.html">Nunc volutpat massa</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>70%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$123.85 </span>
                                        <span class="old-price">$235.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="assets/imgs/shop/product-6-1.jpg"
                                                alt="">
                                            <img class="default-img" src="assets/imgs/shop/product-6-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">-30%</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Speaker</a>
                                    </div>
                                    <h2><a href="product-details.html">Nullam ultricies luctus</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>70%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$28.85 </span>
                                        <span class="old-price">$45.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="assets/imgs/shop/product-7-1.jpg"
                                                alt="">
                                            <img class="default-img" src="assets/imgs/shop/product-7-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">-22%</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Camera</a>
                                    </div>
                                    <h2><a href="product-details.html">Nullam mattis enim</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>70%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$238.85 </span>
                                        <span class="old-price">$245.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="assets/imgs/shop/product-8-1.jpg"
                                                alt="">
                                            <img class="default-img" src="assets/imgs/shop/product-8-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                class="fi-rs-shuffle"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="new">New</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Phone</a>
                                    </div>
                                    <h2><a href="product-details.html">Vivamus sollicitudin</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>98%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$1275.85 </span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.html">
                                            <img class="hover-img" src="assets/imgs/shop/product-9-1.jpg"
                                                alt="">
                                            <img class="default-img" src="assets/imgs/shop/product-9-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up"
                                            href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">Accessories </a>
                                    </div>
                                    <h2><a href="product-details.html"> Donec ut nisl rutrum</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>70%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>$238.85 </span>
                                        <span class="old-price">$245.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"
                                            href="cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab three (New added)-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    {{-- Product tag --}}

    {{-- <section class="banner-2 section-padding pb-0">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="assets/imgs/banner/banner-4.png" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                    <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                    <a href="#" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section> --}}
  
    <section class="banners mb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="assets/imgs/banner/banner-1.png" alt="">
                        <div class="banner-text">
                            <span>Smart Offer</span>
                            <h4>Save 20% on <br>Woman Bag</h4>
                            <a href="#">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow fadeIn animated">
                        <img src="assets/imgs/banner/banner-2.png" alt="">
                        <div class="banner-text">
                            <span>Sale off</span>
                            <h4>Great Summer <br>Collection</h4>
                            <a href="#">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img wow fadeIn animated  mb-sm-0">
                        <img src="assets/imgs/banner/banner-3.png" alt="">
                        <div class="banner-text">
                            <span>New Arrivals</span>
                            <h4>Shop Today’s <br>Deals & Offers</h4>
                            <a href="#">Shop Now <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                    id="carausel-6-columns-2-arrows"></div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="assets/imgs/shop/product-2-1.jpg"
                                        alt="">
                                    <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg"
                                        alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn small hover-up"
                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fi-rs-eye"></i></a>
                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                    href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn small hover-up" href="compare.php"
                                    tabindex="0"><i class="fi-rs-shuffle"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">Hot</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Lorem ipsum dolor</a></h2>
                            <div class="rating-result" title="90%">
                                <span>
                                </span>
                            </div>
                            <div class="product-price">
                                <span>$238.85 </span>
                                <span class="old-price">$245.8</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="assets/imgs/shop/product-4-1.jpg"
                                        alt="">
                                    <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg"
                                        alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn small hover-up"
                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fi-rs-eye"></i></a>
                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                    href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn small hover-up" href="compare.php"
                                    tabindex="0"><i class="fi-rs-shuffle"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="new">New</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Aliquam posuere</a></h2>
                            <div class="rating-result" title="90%">
                                <span>
                                </span>
                            </div>
                            <div class="product-price">
                                <span>$173.85 </span>
                                <span class="old-price">$185.8</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="assets/imgs/shop/product-15-1.jpg"
                                        alt="">
                                    <img class="hover-img" src="assets/imgs/shop/product-15-2.jpg"
                                        alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn small hover-up"
                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fi-rs-eye"></i></a>
                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                    href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn small hover-up" href="compare.php"
                                    tabindex="0"><i class="fi-rs-shuffle"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="sale">Sale</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Sed dapibus orci</a></h2>
                            <div class="rating-result" title="90%">
                                <span>
                                </span>
                            </div>
                            <div class="product-price">
                                <span>$215.85 </span>
                                <span class="old-price">$235.8</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="assets/imgs/shop/product-3-1.jpg"
                                        alt="">
                                    <img class="hover-img" src="assets/imgs/shop/product-3-2.jpg"
                                        alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn small hover-up"
                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fi-rs-eye"></i></a>
                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                    href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn small hover-up" href="compare.php"
                                    tabindex="0"><i class="fi-rs-shuffle"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">.33%</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Donec congue</a></h2>
                            <div class="rating-result" title="90%">
                                <span>
                                </span>
                            </div>
                            <div class="product-price">
                                <span>$83.8 </span>
                                <span class="old-price">$125.2</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="assets/imgs/shop/product-9-1.jpg"
                                        alt="">
                                    <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg"
                                        alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn small hover-up"
                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fi-rs-eye"></i></a>
                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                    href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn small hover-up" href="compare.php"
                                    tabindex="0"><i class="fi-rs-shuffle"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">-25%</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Curabitur porta</a></h2>
                            <div class="rating-result" title="90%">
                                <span>
                                </span>
                            </div>
                            <div class="product-price">
                                <span>$1238.85 </span>
                                <span class="old-price">$1245.8</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="assets/imgs/shop/product-7-1.jpg"
                                        alt="">
                                    <img class="hover-img" src="assets/imgs/shop/product-7-2.jpg"
                                        alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn small hover-up"
                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fi-rs-eye"></i></a>
                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                    href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn small hover-up" href="compare.php"
                                    tabindex="0"><i class="fi-rs-shuffle"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="new">New</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Praesent maximus</a></h2>
                            <div class="rating-result" title="90%">
                                <span>
                                </span>
                            </div>
                            <div class="product-price">
                                <span>$123 </span>
                                <span class="old-price">$156</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="product-details.html">
                                    <img class="default-img" src="assets/imgs/shop/product-1-1.jpg"
                                        alt="">
                                    <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg"
                                        alt="">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn small hover-up"
                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fi-rs-eye"></i></a>
                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                    href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn small hover-up" href="compare.php"
                                    tabindex="0"><i class="fi-rs-shuffle"></i></a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="product-details.html">Vestibulum ante</a></h2>
                            <div class="rating-result" title="90%">
                                <span>
                                </span>
                            </div>
                            <div class="product-price">
                                <span>$238.85 </span>
                                <span class="old-price">$245.8</span>
                            </div>
                        </div>
                    </div>
                    <!--End product-cart-wrap-2-->
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                    id="carausel-6-columns-3-arrows"></div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-1.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-2.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-4.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-5.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-6.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection