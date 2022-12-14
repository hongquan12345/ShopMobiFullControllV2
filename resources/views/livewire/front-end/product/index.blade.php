<div class="row">
    {{-- div product --}}
    <div class="col-lg-10" >
        <div class="row product-grid">
            @forelse ($products as $productItem)
                <div class="col-lg-4 col-md-4 col-6 col-sm-6" >
                            <div class="product-cart-wrap mb-30">
                                <a href="{{'/collections/'.$productItem->category->slug.'/'.$productItem->slug}}">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img img-hover-scale overflow-hidden">
                                                @if ($productItem->productImage->count()>0)
                                                    <img style="height: 300px;width: 250px" src="{{asset($productItem->productImage[0]->image)}}" alt="{{$productItem->name}}">
                                                    @else
                                                    <img style="height: 300px;width: 250px" src="{{asset('/no_image_product.png')}}" alt="{{$productItem->name}}">
                                                @endif
                                        </div>
                                        <div class="product-action-1">

                                            <a aria-label="Add To Wishlist" wire:click="addToWishListIndext({{ $productItem->id}})"
                                                class="action-btn hover-up"
                                                href="#"><i class="fi-rs-heart "></i></a>
                                            
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if ($productItem->quantity >0)
                                                <span class="stock bg-success">IN STOCK</span>
                                                @else
                                                <span class="stock bg-danger">OUT STOCK</span>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                                    <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="#">{{$productItem->brand}}</a>
                                            </div>
                                            <h2>
                                                <a href="#">{{$productItem->name}}</a>
                                            </h2>
                                            <div class="rating-result" title="90%">
                                                @php
                                                $sell =0;
                                               $sell = 100 - ($productItem->selling_price/$productItem->original_price *100) ;
                                               $ceiled = ceil($sell)
                                            @endphp
                                            <span class="save-price  font-md color3 ml-15">{{$ceiled}}% Off</span>
                                            </div>
                                            <div class="product-price">
                                                <span>{{number_format($productItem->selling_price)}}VND</span>
                                                <span class="old-price">{{number_format($productItem->original_price)}}VND</span>
                                            </div>
                                            {{-- <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up"
                                                    href="shop-cart.php"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div> --}}
                                            <div  class="product-action-2 float-center">
                                                <a class="btn btn-success action-btn hover-up" href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">Buy It</a>
                                            </div>

                                    </div>
                        </div>
                </div>
            @empty
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <h4>Dont have Product with this Brand in {{$category->name}}</h4>
                </div>
            @endforelse
        </div>
    </div>
     {{-- div product --}}


    <div class="col-lg-2">
        {{-- div filter --}}
        @if ($category->brands_in_category)
            <div class="card text-center mb-3" style="max-width: 18rem;">
                <div class="card-header"><h2>Brand</h2></div>
                <div class="text-lg-start form-check form-switch">
                    @foreach ($category->brands_in_category as $branditem)
                    <div style="font-size:20px" >
                        <input class="form-check-input" wire:model="brandInputs" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="{{ $branditem->name}}" checked>
                        <label class="form-check-label" for="flexSwitchCheckDefault"><strong>{{ $branditem ->name}}</strong></label>
                    </div>
                    @endforeach
                </div>
            </div>
        @endif

         {{-- div filter --}}


        <div class="card text-center md-1">
            <div class="card-header"><h2>Price</h2></div>
            <div class="card-body float-left" >
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs"  value="hight-to-low" style="height:15px; width:15px; vertical-align: middle;"/><strong> Hight to Low</strong>
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInputs"  value="low-to-hight" style="height:15px; width:15px; vertical-align: middle;"/><strong> Low to Hight</strong>
                    </label>
            </div>
        </div>
    </div>

</div>




