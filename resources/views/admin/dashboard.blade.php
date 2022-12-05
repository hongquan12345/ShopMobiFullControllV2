@extends('layouts.adminpage')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
        <h6 class="alert alert-success">{{ session('message') }} </h6>
        @endif
        <div class="me-md-3 me-xl-5">
            <h2>Welcome back, {{Auth::user()->name}}</h2>
            <p class="mb-md-0">Your analytics dashboard template.</p>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3 shadow bg-1 p-3 ">
                    <label for="">Total Orders</label>
                    <h1>{{ $orderTotal }}</h1>
                    <a href="{{ url('adminpage/Orders') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3 shadow bg-1 p-3">
                    <label for="">To Day Orders</label>
                    <h1>{{ $ordertoday }}</h1>
                    <a href="{{ url('adminpage/Orders') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3 shadow bg-1 p-3">
                    <label for="">To Mount Orders</label>
                    <h1>{{ $orderMonth }}</h1>
                    <a href="{{ url('adminpage/Orders') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-danger text-white mb-3 shadow bg-1 p-3">
                    <label for="">To Year Orders</label>
                    <h1>{{ $orderYear }}</h1>
                    <a href="{{ url('adminpage/Orders') }}" class="text-white">View</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3 shadow bg-1 p-3">
                    <label for="">Total Product</label>
                    <h1>{{ $productTotal }}</h1>
                    <a href="{{ url('adminpage/Products') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3 shadow bg-1 p-3">
                    <label for="">Tota Brand</label>
                    <h1>{{ $BrandTotal }}</h1>
                    <a href="{{ url('adminpage/brands') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3 shadow bg-1 p-3">
                    <label for="">Total Category</label>
                    <h1>{{ $categoryTotal }}</h1>
                    <a href="{{ url('adminpage/Category') }}" class="text-white">View</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3 shadow bg-1 p-3">
                    <label for="">Total Acount</label>
                    <h1>{{ $accountTotal }}</h1>
                    <a href="{{ url('adminpage/Products') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3 shadow bg-1 p-3">
                    <label for="">Tota User</label>
                    <h1>{{ $userTotal }}</h1>
                    <a href="{{ url('adminpage/brands') }}" class="text-white">View</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3 shadow bg-1 p-3">
                    <label for="">Total Admin</label>
                    <h1>{{ $AdminTotal }}</h1>
                    <a href="{{ url('adminpage/Category') }}" class="text-white">View</a>
                </div>
            </div>
        </div>
        <hr>
    </div>
  </div>
@endsection
