<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/home') }}" rel="nofollow">Home</a>
                    <span ></span><a href="{{url('/collections')}}" >collections</a>
                    <span></span> WishList
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">

            <div class="container">
                {{-- <div class="page-header breadcrumb-wrap text-center">
                    <h1  style="font-size: 50px;
                    padding: 4px 13px;
                    background-color:#F15412;
                    color: rgb(255, 255, 255);
                    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
                    float: center;" class="label-stock bg-lg ">Whish list</h1>
                </div> --}}
                <h1>Wish List</h1>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Original Price</th>
                                        <th scope="col">Selling Price</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ( $wishlist as $iDwish )
                                        @if ($iDwish->product_in_Wishlist)
                                                <tr>

                                                    <td class="image product-thumbnail">
                                                        <a href="{{ url('collections/'.$iDwish->product_in_Wishlist->category->slug.'/'.$iDwish->product_in_Wishlist->slug)}}">
                                                        <img src="{{ $iDwish->product_in_Wishlist->productImage[0]->image}}" alt="{{ $iDwish->product_in_Wishlist->name}}">  </a>
                                                    </td>

                                                    <td class="product-des product-name">
                                                        <h5 class="product-name">
                                                            <a href="{{ url('collections/'.$iDwish->product_in_Wishlist->category->slug.'/'.$iDwish->product_in_Wishlist->slug) }}">
                                                                {{ $iDwish->product_in_Wishlist->name}}
                                                            </a>
                                                        </h5>
                                                    </td>
                                                    <td class="price" data-title="Price">
                                                        <span>{{ number_format($iDwish->product_in_Wishlist->original_price )}}$
                                                        </span>
                                                    </td>

                                                    <td class="text-right" data-title="Cart">
                                                        <span>{{ number_format($iDwish->product_in_Wishlist->selling_price)}}$</span>
                                                    </td>

                                                    <td class="action"
                                                    data-title="Remove">
                                                    <a style="font-size: 13px;
                                                    padding: 4px 13px;
                                                    border-radius: 15px;
                                                    color: #fff;
                                                    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
                                                    float: center;" class="label-stock bg-lg bg-danger"
                                                    href="#" wire:click="removeWishlistItem({{ $iDwish->id }})" type="btn" class="text-muted"><i class="fi-rs-trash"></i></a></td>
                                                </tr>
                                        @endif
                                    @empty
                                        <div class="col-3 float-end">
                                            <h4  style="font-size: 13px;
                                            padding: 4px 13px;
                                            border-radius: 15px;
                                            color: #fff;
                                            box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
                                            float: center;" class="label-stock bg-lg bg-danger">Oops ! you dont like any Product ?
                                            </h4>
                                        </div>
                                    @endforelse
                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <a href="#"  wire:click="removeWishlistItemAll()"class="text-muted"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-action text-end">
                            <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a>
                            <a class="btn " href="{{ url('collections') }}"><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
