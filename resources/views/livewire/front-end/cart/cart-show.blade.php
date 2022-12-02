<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/home') }}" rel="nofollow">Home</a>
                    <span ></span><a href="{{url('/collections')}}" >Danh mục</a>
                    <span ></span><a href="{{url('/Cart')}}" >Giỏ Hàng</a>

                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">

            <div class="container">
                <h3><span>Danh sách Giỏ hàng</span></h3>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Hình</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Màu Sắc</th>
                                        <th scope="col">Giá Tiền</th>
                                        <th scope="col">Số Lượng</th>
                                        <th scope="col">Tổng Cộng</th>
                                        <th scope="col">Hành Động</th>

                                    </tr>
                                </thead>
                                <tbody>

                            @forelse ($cart as $cartItem)
                            <tr>
                                @if($cartItem->product_in_Cart)
                                <td class="image product-thumbnail">
                                    <a href="{{ url('collections/'.$cartItem->product_in_Cart->category->slug.'/'.$cartItem->product_in_Cart->slug)}}">
                                     <img src="{{ $cartItem->product_in_Cart->productImage[0]->image }}">
                                    </a>
                                 </td>
                                 <td class="product-des product-name">
                                    <h5 class="product-name">
                                        <a href="{{ url('collections/'.$cartItem->product_in_Cart->category->slug.'/'.$cartItem->product_in_Cart->slug)}}">
                                            {{ $cartItem->product_in_Cart->name}}
                                        </a>
                                    </h5>
                                </td>
                                 <td class="product-des product-color">
                                    <h5 class="product-name">
                                        @if($cartItem->productColor_in_Cart)
                                        <a href="{{ url('collections/'.$cartItem->product_in_Cart->category->slug.'/'.$cartItem->product_in_Cart->slug)}}">
                                           <span > {{ $cartItem->productColor_in_Cart->Color->name}}</span>
                                        </a>
                                        @else
                                            <a href="{{ url('collections/'.$cartItem->product_in_Cart->category->slug.'/'.$cartItem->product_in_Cart->slug)}}">Sản phẩm chỉ có màu mặc định</a>
                                        @endif
                                    </h5>
                                </td>

                                <td class="price" data-title="Price">
                                        <span>
                                            {{ number_format($cartItem->product_in_Cart->selling_price)}}
                                        </span>
                                </td>

                               <td class="text-right" data-title="Quantity">
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="detail-extralink">


                                    {{-- Quantity drop --}}
                                    <div class="detail-qty border radius"
                                        style="max-width: 77px !important;
                                        padding: 15px 9px !important;
                                        position: relative !important;
                                        width: 100% !important;
                                        border-radius: 14px !important;
                                        align-items: center !important;
                                        background-color: rgb(236, 234, 234)">

                                        <a class="qty-up" wire:loading.attr="disabled" wire:click="incrementQuantity({{ $cartItem->id }})" >
                                            <i class="fi-rs-angle-small-up"></i>
                                        </a>

                                        <span class="qty-val" wire:model="QuantityCount"  value="1">
                                            <strong>{{ $cartItem->quantity}}</strong>
                                        </span>

                                        <a  class="qty-down" wire:loading.attr="disabled" wire:click="decrementQuantity({{ $cartItem->id }})" >
                                            <i class="fi-rs-angle-small-down"></i>
                                        </a>
                                    </div>
                                    {{-- Quantity drop --}}
                                </td>
                                <td class="total" data-title="Price">
                                    <span>
                                        {{number_format($cartItem->product_in_Cart->selling_price * $cartItem->quantity)}}
                                        @php
                                            $totalPrice += $cartItem->product_in_Cart->selling_price * $cartItem->quantity
                                        @endphp
                                    </span>
                                </td>


                                <td class="action" data-title="Remove">
                                    <a style="font-size: 13px;
                                    padding: 4px 13px;
                                    border-radius: 15px;
                                    color: #fff;
                                    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
                                    float: center;" class="label-stock bg-lg bg-danger"
                                    href="#"  type="btn" class="text-muted"
                                    wire:loading.attr="disabled"
                                    wire:click="removeCartItem({{ $cartItem->id}})">
                                        <i class="fi-rs-trash" wire:loading.remove:target="removeCartItem({{ $cartItem->id}})" >: Remove</i>
                                        <i class="fi-rs-trash" wire:loading wire:target="removeCartItem({{ $cartItem->id}})" >: Removing</i>
                                    </a>
                                </td>
                                @endif
                            </tr>
                            @empty

                             @endforelse


                            {{-- <div class="col-3 float-end">
                                    <h4  style="font-size: 13px;
                                    padding: 4px 13px;
                                    border-radius: 15px;
                                    color: #fff;
                                    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
                                    float: center;" class="label-stock bg-lg bg-danger">Oops ! you dont like any Product ?
                                    </h4>
                            </div>

                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-action text-end">
                            {{-- <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a> --}}
                            <a href="{{ url('collections/')}}"  class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Tiếp tục mua sắm</a>
                            {{-- <a  class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a> --}}


                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">
                            <div class="col-lg-6 col-md-12">
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Tổng Chi Phí</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">Tổng Tiền Hàng</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">{{ number_format($totalPrice)}} VND</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Hình thức vận chuyển :</td>
                                                    <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Miển Phí Mãi Mãi</td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Tổng chi phí</td>
                                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">{{ number_format($totalPrice)}} VND</span></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="{{url('/CheckOut')}}" class="btn "> <i class="fi-rs-box-alt mr-10"></i>Tiến Hành Thanh Toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
