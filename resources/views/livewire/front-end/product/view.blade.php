<main class="main">
    <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span><a href="{{url('/collections')}}" rel="nofollow">collections</a>
                    <span></span><a href="{{$products->category->name}}" rel="nofollow">{{$products->name}}</a>
                </div>
            </div>
    </div>

        <section class="mt-50 mb-50">
            <div class="container">
                {{-- @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif --}}
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery" >
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <div class="product-image-slider" wire:ignore>
                                                @foreach ($products->productImage as $pimages)
                                                    @if ($pimages->count())
                                                    <figure class="border-radius-10">
                                                        <img src="{{asset($pimages->image)}}" alt="product image">
                                                    </figure>
                                                    @endif
                                                @endforeach
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15" wire:ignore>
                                            @foreach ($products->productImage as $pimages)
                                                <div><img src="{{asset($pimages->image)}}" alt="product image"></div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- End Gallery -->
                                    {{-- <div class="social-icons single-share">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li><strong class="mr-10">Share this:</strong></li>
                                            <li class="social-facebook"><a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                            <li class="social-twitter"> <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                            <li class="social-instagram"><a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                            <li class="social-linkedin"><a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                        </ul>
                                    </div> --}}
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{$products->name}}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> Brands: <a href="shop.html">{{$products->brand}}</a></span>
                                            </div>

                                            <div class="product-rate-cover text-end">
                                                <div class="label-stock">
                                                    @if($products->quantity)
                                                        <label  style="font-size: 13px;
                                                        padding: 4px 13px;
                                                        border-radius: 15px;
                                                        color: #fff;
                                                        box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
                                                        float: right;" class="label-stock bg-lg bg-success"><strong>IN STOCK</strong></label>
                                                        @else
                                                        <label style="font-size: 13px;
                                                        padding: 4px 13px;
                                                        border-radius: 5px;
                                                        color: #fff;
                                                        box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
                                                        float: right;" class="label-stock bg-lg bg-danger"><strong>OUT STOCK</strong></label>
                                                    @endif

                                                </div>

                                            </div>

                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">{{number_format($products->selling_price)}} VND</span></ins>
                                                <ins><span class="old-price font-md ml-15">{{number_format($products->original_price)}}$</span></ins>
                                                @php
                                                    $sell =0;
                                                    $sell = 100 - ($products->selling_price/$products->original_price *100) ;
                                                    $ceiled = ceil($sell);
                                                @endphp
                                                <span class="save-price  font-md color3 ml-15">{{$ceiled}}% Off</span>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <textarea style="border: none;border-color: Transparent; overflow:  hidden;
                                            outline: none;border-style: none;resize: none;"  readonly required disabled autofocus>{{$products->small_description}}</textarea>
                                        </div>
                                        <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i>Bảo hành 1 năm</li>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i>30 ngày đổi trả</li>
                                                <li class="mb-10"><i class="fi-rs-home mr-5"></i> Thanh toán khi nhận hàng</li>
                                                <li class="mb-10"><i class="fi-rs-credit-card mr-5"></i> Thanh toán Online</li>
                                            </ul>
                                        </div>

                                        @if ($products->productColors->count()>0)
                                            @if($products->productColors)
                                                <div class="attr-detail attr-color mb-15">
                                                    <strong class="mr-10">Color : </strong>
                                                        <ul class="list-filter color-filter">
                                                            @foreach ($products->productColors as $colorItem)
                                                                <li>
                                                                    <a type="radio" href=" " data-color="">
                                                                        <button wire:click="colorSelected({{$colorItem->id}})"
                                                                            style="background-color:{{$colorItem->color->code}};
                                                                            border:1px solid #e2c5c5;
                                                                            border-radius: 4px"
                                                                            value="{{$colorItem->id}}">{{$colorItem->color->code}}
                                                                        </button>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                </div>
                                            @endif

                                            @if($this->ProdColorSelectQuantity == 'outOfStock')
                                                <ul class="list-filter size-filter font-small">
                                                    <li> <label  style="font-size: 13px;
                                                        padding: 4px 13px;
                                                        border-radius: 15px;
                                                        color: #fff;
                                                        box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
                                                        float: right;" class="label-stock bg-lg bg-danger">Hết Hàng Màu Này</li>
                                                </ul>
                                            @elseif($this->ProdColorSelectQuantity > 0)
                                                <ul class="list-filter size-filter font-small">
                                                    <li><label  style="font-size: 13px;
                                                        padding: 4px 13px;
                                                        border-radius: 15px;
                                                        color: #fff;
                                                        box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
                                                        float: right;" class="label-stock bg-lg bg-success">Còn Hàng Màu Này</li>
                                                </ul>
                                            @endif
                                        @endif

                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                            <div >
                                                <a wire:click="incrementQuantity"  class="qty-up">
                                                    <i class="fi-rs-angle-small-up"></i>
                                                </a>
                                                <span class="qty-val" wire:model="QuantityCount"  value="1">
                                                    {{$this->QuantityCount}}
                                                </span>

                                                <a  wire:click="decrementQuantity"  class="qty-down">
                                                    <i class="fi-rs-angle-small-down"></i>
                                                </a>
                                            </div>

                                            <div class="product-extra-link2">
                                                {{-- Add to Cash --}}
                                                <button type="button" wire:click="addtoCart({{$products->id}})" class="button button-add-to-cart">Add to cart</button>
                                                {{-- Add to Cash --}}

                                                {{-- Wishlist --}}
                                                <a aria-label="Add To Wishlist" wire:click="addToWishList({{ $products->id }})"
                                                    class="action-btn " href="#"><i class="fi-rs-heart"></i>
                                                </a>
                                                {{-- Wishlist --}}
                                                <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>

                                        </div>

                                        <ul class="product-meta font-xs color-grey mt-50">
                                            <li class="mb-5">SKU: <a href="#">{{$products->slug}}</a></li>
                                            <li class="mb-5">Tags: <a href="#" rel="tag">{{$products->metal_title}}</a>, </li>
                                            <li>Availability:<span class="in-stock text-success ml-5"><a><strong>{{$products->quantity}}</strong> </a>Items In Stock</span></li>
                                        </ul>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <li class="nav-item">
                                            <a class="nav-link " id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews({{$CommentCount }})</a>
                                        </li>

                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade " id="Description">
                                        <textarea style="border: none;border-color: Transparent; overflow:  hidden;
                                             outline: none;border-style: none;resize: none;"  readonly required disabled autofocus > {{$products->description}}
                                        </textarea>
                                    </div>
                                    <div class="tab-pane fade show active" id="Reviews">
                                        <!--Comments-->
                                        <div class="comment-form">
                                            @if (session('message'))
                                                <h6 class="alert alert-success">{{ session('message') }}</h6>
                                            @endif
                                            <h4 class="mb-15">Add a review</h4>
                                            <div class="product-rate d-inline-block mb-30">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <form class="form-contact comment_form" action="{{ url('Comments') }}" method="POST" id="commentForm">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input value="{{$products->slug}}" class="form-control" type="hidden" name="products_slug">
                                                                    <textarea class="form-control w-100" name="comment_body"cols="30" rows="9" placeholder="Write Comment" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit"  class="button button-contactForm">Send Review</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Customer questions & answers</h4>
                                                    <div class="comment-list">
                                                        @forelse ($products->Comment as $itemComment)
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="assets/imgs/page/avatar-6.jpg" alt="">
                                                                    @if($itemComment->Comment_in_User)
                                                                        <h6><a href="#">{{ ($itemComment->Comment_in_User->name)}}</a></h6>
                                                                     @else
                                                                        <h6><a href="#">Unknow People</a></h6>
                                                                     @endif
                                                                    <p class="font-xxs">{{ ($itemComment->Comment_in_User->created_at->format('d-m-Y' )) }}</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div style="hidden" class=" d-inline-block">
                                                                        {{-- <div class="product-rating" style="width:90%">
                                                                        </div> --}}
                                                                    </div>
                                                                    <p>{{ $itemComment->comment_body }}</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">
                                                                                <p class="font-xs mr-30">Comment at :{{ $itemComment->created_at->format('d-m-Y : H:i:s A' ) }}
                                                                                </p>
                                                                                <p>
                                                                                    @if($itemComment->Comment_in_User->id == Auth::user()->id)
                                                                                        <a href="#" wire:click="removeCommentItem({{ $itemComment->id }})"
                                                                                        class="text-brand btn-reply">Delete<i class="fi-rs-delete"></i></a>
                                                                                    @endif

                                                                               </p>
                                                                            </p>
                                                                            @if(Auth::check())
                                                                                <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @empty

                                                            <div>
                                                                <h4 class="mb-30">Nobody Comment this Product</h4>
                                                            </div>

                                                        @endforelse

                                                        <!--single-comment -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--comment form-->
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h3 class="section-title style-1 mb-30">Related products</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach ($products->category->products_in_category as $productReledted)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap small hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="product-details.html" tabindex="0">
                                                            <img class="default-img" src="{{ asset($productReledted->productImage[0]->image) }}" alt="#">
                                                            @if ($productReledted->productImage[0])
                                                                <img class="hover-img" src="{{ asset($productReledted->productImage[0]->image) }}" alt="#">
                                                            @endif

                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                        <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">{{ $productReledted->brand }}</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="product-details.html" tabindex="0">{{ $productReledted->name }}</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span>
                                                        </span>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>{{ number_format($productReledted->selling_price) }}</span>
                                                        <span class="old-price">{{ number_format($productReledted->original_price) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @foreach ($categorys as $item)
                                    <li><a href="{{'/collections/'.$item->slug}}">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Fillter By Price -->

                        <!-- Product sidebar Widget -->

                            <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">

                                <div class="widget-header position-relative mb-20 pb-10">
                                    <h5 class="widget-title mb-10">New products</h5>
                                    <div class="bt-1 border-color-1"></div>
                                </div>
                                @foreach ($newProducts as $newProductItem)
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="{{ asset($newProductItem->productImage[0]->image) }}" alt="#">
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href="product-details.html">{{ $newProductItem->name }}</a></h5>
                                        <p class="price mb-0 mt-5">{{number_format( $newProductItem->selling_price) }}</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width:90%"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                    </div>
                </div>
            </div>
        </section>
    </main>

