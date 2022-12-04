@extends('layouts.index')
@section('title')
{{ 'AllCollection'}}
@endsection
@section('contentHome')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/home') }}" rel="nofollow">Home</a>
                <span ></span><a href="{{url('/collections')}}" >Danh mục</a>

            </div>
        </div>
    </div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Search</h4>
                    <div class="row">
                        {{-- div product --}}
                        <div class="col-lg-10" >
                            <div class="row product-grid">
                                @forelse ($searchProduct as $searchProductItem)
                                    <div class="col-lg-4 col-md-4 col-6 col-sm-6" >
                                                <div class="product-cart-wrap mb-30">
                                                    <a href="{{'/collections/'.$searchProductItem->category->slug.'/'.$searchProductItem->slug}}">
                                                        <div class="product-img-action-wrap">
                                                            <div class="product-img img-hover-scale overflow-hidden">
                                                                    @if ($searchProductItem->productImage->count()>0)
                                                                        <img style="height: 300px;width: 250px" src="{{asset($searchProductItem->productImage[0]->image)}}" alt="{{$searchProductItem->name}}">
                                                                        @else
                                                                        <img style="height: 300px;width: 250px" src="{{asset('/no_image_product.png')}}" alt="{{$searchProductItem->name}}">
                                                                    @endif
                                                            </div>
                                                            <div class="product-action-1">
                                                                <a aria-label="Quick view" class="action-btn hover-up"
                                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                                    <i class="fi-rs-search"></i></a>
                                                                <a aria-label="Add To Wishlist" wire:click="addToWishListIndext({{ $searchProductItem->id}})"
                                                                    class="action-btn hover-up"
                                                                    href="#"><i class="fi-rs-heart "></i></a>
                                                                <a aria-label="Compare" class="action-btn hover-up"
                                                                    href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                                            </div>
                                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                                @if ($searchProductItem->quantity >0)
                                                                    <span class="stock bg-success">IN STOCK</span>
                                                                    @else
                                                                    <span class="stock bg-danger">OUT STOCK</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </a>
                                                        <div class="product-content-wrap">
                                                                <div class="product-category">
                                                                    <a href="#">{{$searchProductItem->brand}}</a>
                                                                </div>
                                                                <h2>
                                                                    <a href="#">{{$searchProductItem->name}}</a>
                                                                </h2>
                                                                <div class="rating-result" title="90%">
                                                                    @php
                                                                    $sell =0;
                                                                   $sell = 100 - ($searchProductItem->selling_price/$searchProductItem->original_price *100) ;
                                                                   $ceiled = ceil($sell)
                                                                @endphp
                                                                <span class="save-price  font-md color3 ml-15">{{$ceiled}}% Off</span>
                                                                </div>
                                                                <div class="product-price">
                                                                    <span>{{number_format($searchProductItem->selling_price)}}VND</span>
                                                                    <span class="old-price">{{number_format($searchProductItem->original_price)}}VND</span>
                                                                </div>
                                                                <div class="product-action-1 show">
                                                                    <a aria-label="Add To Cart" class="action-btn hover-up"
                                                                        href="shop-cart.php"><i class="fi-rs-shopping-bag-add"></i></a>
                                                                </div>
                                                                <div  class="product-action-2 float-center">
                                                                    <button  class="btn btn-success action-btn hover-up">Buy It</button>
                                                                </div>

                                                        </div>
                                            </div>
                                    </div>
                                @empty
                                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                                        We can Found Any Item with <strong>{{ Request::get('search_txt') }}</strong>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                    </div>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</main>

@endsection
