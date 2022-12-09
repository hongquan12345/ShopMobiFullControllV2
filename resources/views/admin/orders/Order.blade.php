@extends('layouts.adminpage')
@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card-header">
        <h3> Order List
            <a href="{{url('adminpage/dashboard')}}" class ="btn btn-primary btn-sm text-white float-end">Back</a>
        </h3>
      </div>

      <div class="card-body">

            <form action=""method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Filter by Date</label>
                            <input  name="date"type="date" value="{{date('Y-m-d') }}" class="form-control"/>
                        </div>
                        <div class="col-md-3">
                            <label for="">Filter by Status</label>
                            <select name="status" class="form-select">
                                <option value="">Select All Status</option>
                                <option value="in-progress" {{ Request::get('status') == 'in-progress' ?'selected' :'' }}>In Progress</option>
                                <option value="completed" {{ Request::get('status') == 'completed' ?'selected' :'' }}>Completed</option>
                                <option value="pending" {{ Request::get('status') == 'pending' ?'selected' :'' }}>Pending</option>
                                <option value="cancelled" {{ Request::get('status') == 'cancelled' ?'selected' :'' }}>Cancelled</option>
                                <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ?'selected' :'' }}>Out for delivery</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <br>
                            <button class="btn btn-primary" type="submit">Filter</button>
                        </div>
                    </div>
            </form>
            <hr>
            <div class="row">
                <div class="col-12 md-6">
                    <div class="table responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead class="shadow bg-white p-3">
                                <tr class="main-heading">
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Tracking No</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Payment Mode</th>
                                    <th scope="col">Order To Day</th>
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
                                            <a href="{{url('adminpage/Orders/'.$order->id)}}"
                                            class ="btn btn-primary btn-sm text-white float-end">
                                            <i class="fi-rs-search">View</i>
                                        </a>

                                        </td>
                                        </tr>
                                    <tr>
                                @empty
                                    <h1 class="text-primary">No Order in List</h1>
                                @endforelse
                            </tbody>
                        </table>
                    <div>{{$ordercs->links()}}</div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
