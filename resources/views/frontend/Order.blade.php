@extends('layouts.index')
@section('title')
{{ 'Order List'}}
@endsection
@section('contentHome')
    <main class="main">
            <div class="container">
                <h1>Order List Detail</h1>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="table responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead class="shadow bg-white p-3">
                                    <tr class="main-heading">
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Tracking No</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Payment Mode</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Status Message</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="shadow bg-white p-1" >
                                    @forelse ( $ordercs as $order )
                                        <tr>
                                            <td class="order-ID order-ID">
                                                <span class="order-ID">
                                                    {{$order->id}}
                                                </span>
                                            </td> 
                                            <td class="order-tracking_no order-tracking_no" data-title="tracking_no">
                                                <span class="order-tracking_no">
                                                    
                                                        {{$order->tracking_no}}
                                                
                                                </span>
                                            </td>
                                            <td class="fullname" data-title="fullname">
                                                <span class="order-fullname">
                                                
                                                        {{$order->fullname}}
                                                
                                                </span>
                                            </td>
                                            <td class="fullname" data-title="fullname">
                                                <span class="order-fullname">
                                                
                                                        {{$order->payment_mode}}
                                                
                                                </span>
                                            </td>
                                            <td class="fullname" data-title="fullname">
                                                <span class="order-fullname">
                                                
                                                        {{$order->created_at->format('d-m-Y h:i A')}}
                                                
                                                </span>
                                            </td>
                                            <td class="status_message" data-title="status_message">
                                                <span class="order-status_message">
                                                    
                                                        {{$order->status_message}}
                                                    
                                                </span>
                                            </td>
                                            
                                            <td class="action" data-title="Remove">
                                                <a style="font-size: 8px;
                                                        padding: 9px 8px;
                                                        border-radius: 80px;
                                                        color: #fff;
                                                        float: center;" class="label-stock bg-lg bg-info" 
                                                        href="{{url('Orders/'.$order->id    )}}" 
                                                        type="btn"
                                                    class="text-muted"><i class="fi-rs-search"> View</i></a>
                                            </td>
                                            </tr>     
                                        <tr>
                                    @empty
                                        <h1>No Order in List</h1>                                 
                                    @endforelse  
                                </tbody>
                            </table>
                            <div>{{$ordercs->links()}}</div>
                        </div>
                        {{-- <div class="cart-action text-end">
                            <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a>
                            <a class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </div> --}}
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    
                    </div>
                </div>
            </div>
       
    </main>
    
@endsection