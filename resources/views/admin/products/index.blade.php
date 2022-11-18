@extends('layouts.adminpage')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success"> {{session('message')}} </div>

            @endif

            <div class="card-header">
                <h3> Products
                    <a href="{{ url('adminpage/Products/create') }}" class="btn btn-Dark btn-sm btn-primary float-end">
                        Add Product
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $products as $product )
                        <tr>
                            <td>{{ $product->id}}</td>
                            <td>
                                @if ($product->id)
                                {{ $product->category->name}}
                                @else
                                    No Category
                                @endif
                            </td>
                            <td>{{ $product->name}}</td>
                            <td>{{ $product->selling_price}}</td>
                            <td>{{ $product->quantity}}</td>
                            <td>{{ $product->status == '1' ? 'Hidden' :"Visible"}}</td>
                            <td>
                                <a href="{{ url('adminpage/Products/'.$product->id.'/edit') }}" class ="btn btn-success">Edit</a>
                                <a href="{{ url('adminpage/Products/'.$product->id.'/delete') }}"
                                     onclick="return confirm('Are you Sure, You Want to Deleted This Product ')" class ="btn btn-danger">Delete</a>

                            </td>



                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No Product Available</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection