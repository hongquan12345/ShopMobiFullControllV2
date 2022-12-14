@extends('layouts.index')
@section('title')
{{ 'Cửa Hàng Điện Thoại QTV'}}
@endsection
@section('contentHome')
<main class="main">

    {{-- Slider --}}
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            @if($sliders == null)
            @else
            @foreach ($sliders as $key => $slidersItem)
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                @if($slidersItem->title)
                                <h3 class="animated fw-1100 text-brand">{{$slidersItem->title}}</h3>
                                @else
                                <h3 class="animated fw-1100 text-brand">Nothing to Show</h3>
                                @endif
                                @if($slidersItem->description)
                                <h1 class="animated ">{{$slidersItem->description}}</h1>
                                @else
                                <h1 class="animated ">Nothing to Show</h1>
                                @endif
                                <a class="animated btn btn-brush btn-brush-3" href="{{ url('collections') }}">Mua Sắm Ngay
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                @if($slidersItem->image)
                                <img class="animated slider-1-1" src="{{$slidersItem->image}}" style="width: 100%;height: 100%;" alt="">
                                @else
                                <img class="animated slider-1-1" src="{{asset('/emptyimage.jpg')}}" style="width: 800px;height: 540px;" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>
    {{-- Slider --}}
    <marquee direction="right" speed={100} width="100%" behavior="scroll" loop="10">
        <div class="marquee">
            <div class="marqueediv">
                <img src="{{asset('frontend_assets/imgs/theme/LG.jpeg')}}" style="width: 70%;" alt="">
            </div>
            <div><img src="{{asset('frontend_assets/imgs/theme/Samsung.jpeg')}}" style="width: 70%;" alt=""></div>
            <div><img src="{{asset('frontend_assets/imgs/theme/Apple.jpeg')}}" style="width: 50%;" alt="">
            </div>
            <div>
                <img src="{{asset('frontend_assets/imgs/theme/Oppo.jpeg')}}" style="width: 80%;" alt="">
            </div>
            <div>
                <img src="{{asset('frontend_assets/imgs/theme/xiaomi.png')}}" style="width: 60%;" alt="">
            </div>
        </div>
    </marquee>
    {{-- các dịch vụ đi kèm --}}
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row col-md-lg-10 ">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('frontend_assets/imgs/theme/icons/freeship.png') }}" alt="">
                        <h4 class="bg-1">Free Shipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('frontend_assets/imgs/theme/icons/online_order.png') }}" alt="">
                        <h4 class="bg-3">Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('frontend_assets/imgs/theme/icons/save_money.png') }}" alt="">
                        <h4 class="bg-2">Save Money</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('frontend_assets/imgs/theme/icons/flash_sale.png') }}" alt="">
                        <h4 class="bg-4">Promotions</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('frontend_assets/imgs/theme/icons/professionally.png') }}" alt="">
                        <h4 class="bg-5">Professionally</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="{{ asset('frontend_assets/imgs/theme/icons/24_7_support.png') }}" alt="">
                        <h4 class="bg-6">24/7 Support</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- các dịch vụ đi kèm --}}

    {{-- Category --}}
    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"> Danh Mục <span>HOT</span></h3>

            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    @forelse ($categorys as $categoryItem )
                    <div class="card-1">
                        <a href="{{'/collections/'.$categoryItem->slug}}">
                            <figure class="img-hover-scale overflow-hidden">
                                @if ($categoryItem->image !='null')
                                <img src="{{asset("$categoryItem->image")}}">
                                @else
                                <img src="{{asset('/emptyimage.jpg')}}">
                                @endif
                            </figure>
                            <h3 class="animated fw-900 text-brand">{{$categoryItem->name}}</h3>
                            <h5 class="animated fw-300 text-bg-warning">{{$categoryItem->description}}</h5>
                        </a>
                    </div>
                    @empty
                    <h5>Không có danh mục nào</h5>
                    @endforelse

                </div>
            </div>

        </div>

    </section>
    {{-- Category --}}


    {{-- Product tag --}}
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Sản Phẩm Hot</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false"> Sản Phẩm Mới</button>
                    </li>
                </ul>
                <a href="{{ url('/collections') }}" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">

                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        {{-- product card --}}
                        @foreach ($trendingproducts as $trendingproductItem)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ url('/collections/'.$trendingproductItem->category->slug.'/'.$trendingproductItem->slug) }}">
                                            <img class="default-img" src="{{ asset($trendingproductItem->productImage[0]->image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">


                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Trending</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="#">{{ $trendingproductItem->brand }}</a>
                                    </div>
                                    <h2><a href="#">{{ $trendingproductItem->name }}</a></h2>
                                    @php
                                    $total=0;
                                    $total = 100-(($trendingproductItem->selling_price/$trendingproductItem->original_price)*100)
                                    @endphp
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>{{ number_format($total) }}%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>{{number_format($trendingproductItem->selling_price)}}</span>
                                        <span class="old-price">{{number_format($trendingproductItem->original_price)}}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- product card --}}
                    </div>
                    <!--End product-grid-4-->
                </div>

                <!--En tab one (Featured)-->
                <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                    <div class="row product-grid-4">
                        @foreach ($newProduct as $newProductitem)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ url('/collections/'.$newProductitem->category->slug.'/'.$newProductitem->slug) }}">
                                            <img class="default-img" src="{{ asset($newProductitem->productImage[0]->image) }}" alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg" alt="">

                                        </a>
                                    </div>
                                    <div class="product-action-1">


                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">New</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop.html">{{ $newProductitem->brand }} </a>
                                    </div>
                                    <h2><a href="product-details.html">{{ $newProductitem->name }}</a></h2>
                                    @php
                                    $totalnew=0;
                                    $totalnew = 100-(($newProductitem->selling_price/$newProductitem->original_price)*100)
                                    @endphp
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>{{ number_format($totalnew) }}%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>{{number_format($newProductitem->selling_price)}}</span>
                                        <span class="old-price">{{number_format($newProductitem->original_price)}}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab two (Popular)-->
                <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                    <div class="row product-grid-4">

                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab three (New added)-->

            </div>
            <!--End tab-content-->
        </div>
    </section>
    {{-- Product tag --}}
</main>
@endsection
