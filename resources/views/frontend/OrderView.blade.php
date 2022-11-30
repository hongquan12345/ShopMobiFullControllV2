@extends('layouts.index')
@section('title')
{{ 'Order View'}}
@endsection
@section('contentHome')
<main class="main">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3" >
                    <h4 class="text-primary">
                        <i class= "fa fa-shopping-cart"></i>My Order Detail
                        <a href="{{url('/Orders')}}" class="btn btn-danger btn-sm float-end">Back</a>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h2 >Order Details</h2>                               
                            <hr>
                            <h4 >Order ID : {{$ordercs->id}}</h4><hr>
                            <h4 >Tracking ID/No.: {{$ordercs->tracking_no}}</h4><hr>
                            <h4 >Order Date : {{$ordercs->created_at->format('d-m-Y')}}</h4><hr>
                            <h4 >Payment Mode: {{$ordercs->payment_mode}}</h4><hr>
                            <h4 class="border p-2 text-success">
                                Order Status Message : <span class="text-uppercase">{{$ordercs->status_message}}</span>
                            </h4>                      
                        </div>
                        <div class="col-md-6">
                            <h2 >User Details</h2>                               
                            <hr>
                            <h4 >Full Name: {{$ordercs->fullname}}</h4><hr>
                            <h4 >Email ID: {{$ordercs->email}}</h4><hr>
                            <h4 >Phone: {{$ordercs->phone}}</h4><hr>
                            <h4 >Address: {{$ordercs->address}}</h4><hr>
                            <h4 >Pin Code (ZIP CODE): {{$ordercs->pincode}}</h4><hr>
                        </div>
                        <hr>
                                              
                        <div class="table-responsive">
                            <h2>Order Items</h2> 
                            <table class="table table-bordered table-striped">   
                                <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($ordercs->orderItem_inOrder as $orderItem)
                                        <tr>
                                            <td width="10%">{{$orderItem->id}}</td>

                                            <td width="10%">
                                                @if($orderItem->product_in_OrderItem)
                                                    <img src="{{ asset($orderItem->product_in_OrderItem->productImage[0]->image)}}"
                                                    style="width: 50px;hight:50px">                                      
                                                @endif
                                            </td>

                                            <td width="10%">
                                                <h5 class="product-name">
                                                    {{ $orderItem->product_in_OrderItem->name}}
                                                    @if ($orderItem->productColor_in_OrderItem->color)
                                                        <span style="background-color: {{$orderItem->productColor_in_OrderItem->color->code}};
                                                            color:rgb(219, 219, 226)">{{$orderItem->productColor_in_OrderItem->color->name}} </span>
                                                    @endif 
                                                </h5>
                                            </td>     
                                            <td width="10%">{{$orderItem->price}}</td>
                                            <td width="10%">{{$orderItem->quantity}}</td>
                                            <td width="10%" class="fw-bold">{{$orderItem->quantity*$orderItem->price}}</td>
                                            @php
                                                $totalPrice += $orderItem->quantity*$orderItem->price;
                                            @endphp
                                        </tr>
                                    @endforeach         
                                        <tr style="background-color: rgb(219, 219, 226)">
                                            <td colspan="5" class="fw-bold">Total Amount :</td>                                    
                                            <td colspan="1" class="fw-bold">{{$totalPrice}}</td>
                                        </tr>
                                </tbody>
                            </table>
                            <div>
                                {{-- {{$ordercs->links()}} --}}
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
   
</main>
    
@endsection