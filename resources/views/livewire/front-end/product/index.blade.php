<div class="row product-grid-3">
    @forelse ($products as $productItem)
    <div class="col-lg-4 col-md-4 col-6 col-sm-6">
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
                        <a aria-label="Quick view" class="action-btn hover-up"
                            data-bs-toggle="modal" data-bs-target="#quickViewModal">
                            <i class="fi-rs-search"></i></a>
                        <a aria-label="Add To Wishlist" class="action-btn hover-up"
                            href="wishlist.php"><i class="fi-rs-heart"></i></a>
                        <a aria-label="Compare" class="action-btn hover-up"
                            href="compare.php"><i class="fi-rs-shuffle"></i></a>
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
                            <span>
                                <span>90%</span>
                            </span>
                        </div>
                        <div class="product-price">
                            <span>{{$productItem->selling_price}}</span>
                            <span class="old-price">${{$productItem->original_price}}</span>
                        </div>
                        <div class="product-action-1 show">
                            <a aria-label="Add To Cart" class="action-btn hover-up"
                                href="shop-cart.php"><i class="fi-rs-shopping-bag-add"></i></a>
                        </div>
                        <div class="product-action-2 float-center">
                            <button class="btn btn-success action-btn hover-up">ADD to CART</button>
                        </div>

                </div>
    </div>
</div>
@empty
    <div>
        <h4>We cant Find Product in {{$category->name}}</h4>
    </div>
@endforelse
