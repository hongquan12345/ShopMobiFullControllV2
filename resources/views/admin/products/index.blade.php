@extends('layouts.adminpage')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success"> {{session('message')}} </div>
                
            @endif

            <div class="card-header">
                <h3> Products
                    <a href="{{ url('adminpage/Products/create') }}" class="btn btn-Dark btn-sm text-white float-end">
                        Add Product
                    </a>
                </h3>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
    </div>
@endsection
