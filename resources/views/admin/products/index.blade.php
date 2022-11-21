@extends('layouts.adminpage')
@section('content')
    <div class="row" style="background-color: rgb(199, 202, 205)">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success"> {{session('message')}}
            </div>
            @endif
            <div class="card-header">
                <h3> Products
                    <a href="{{ url('adminpage/Products/create') }}" class="btn btn-Dark btn-sm btn-primary float-end">
                        Add Product
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped"  style="background-color:rgb(222, 222, 234)">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>SLUG</th>
                            <th>Orig price</th>
                            <th>Sell price</th>
                            <th>Quantity</th>
                            <th>Brand</th>
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
                            <td>{{ $product->slug}}</td>
                            <td>{{ $product->original_price}}</td>
                            <td>{{ $product->selling_price}}</td>
                            <td>{{ $product->quantity}}</td>
                            <td>{{ $product->brand}}</td>

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
     
@endsection
