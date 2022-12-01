@extends('layouts.adminpage')
@section('content')

<div class="row">

    <<div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success mb-3">
                {{ session('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
            <h3> Order Detail
                <a href="{{url('/adminpage/Orders')}}" class ="btn btn-primary btn-sm text-white float-end">Back</a>
            </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h2 >Order Detailss</h2>
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
                                                @if ($orderItem->productColor_in_OrderItem->color->id ?? false)
                                                    <span style="">- {{$orderItem->productColor_in_OrderItem->color->name}}</span>
                                                @else
                                                    <span> - Non Color</span>
                                                @endif
                                            </h5>
                                        </td>
                                        <td width="10%">{{$orderItem->price}}</td>
                                        <td width="10%">{{$orderItem->quantity}}</td>
                                        <td width="10%" class="fw-bold">{{number_format($orderItem->quantity*$orderItem->price)}}</td>
                                        @php
                                            $totalPrice += $orderItem->quantity*$orderItem->price;
                                        @endphp
                                    </tr>
                                @endforeach
                                    <tr style="background-color: rgb(219, 219, 226)">
                                        <td colspan="5" class="fw-bold">Total Amount :</td>
                                        <td colspan="1" class="fw-bold">{{number_format($totalPrice)}}</td>
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

        <div class="card">
            <div class="card-body">
                <h4>Order Process (Order Status Updates)</h4>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ url('adminpage/Orders/'.$ordercs->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="">Update Order Status</label>
                            <div class="input-group">
                                <select name="orders_status" id="">
                                    <option value="">Select Order Status</option>
                                    <option value="in-progress" {{ Request::get('status') == 'in-progress' ?'selected' :'' }}>In Progress</option>
                                    <option value="completed" {{ Request::get('status') == 'completed' ?'selected' :'' }}>Completed</option>
                                    <option value="pending" {{ Request::get('status') == 'pending' ?'selected' :'' }}>Pending</option>
                                    <option value="cancelled" {{ Request::get('status') == 'cancelled' ?'selected' :'' }}>Cancelled</option>
                                    <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ?'selected' :'' }}>Out for delivery</option>
                                </select>
                                <button type="submit" class="btn btn-primary text-white">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7">
                        <br>
                        <h4 class="mt-3">Current Order Status <span class="text-uppercase">{{$ordercs->status_message }}</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
