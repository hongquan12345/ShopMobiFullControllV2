@extends('layouts.adminpage')
@section('content')
<div class="row" style="background-color: rgb(199, 202, 205)" >
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success"> {{session('message')}} </div>

        @endif

        <div class="card-header">
            <h3>CRUD Color List
                <a href="{{ url('adminpage/Colors/create') }}" class="btn btn-Dark btn-sm btn-primary float-end">
                    Add 
                </a>
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped " style="background-color:rgb(222, 222, 234)">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CRUD Name</th>
                        <th>CRUD Color</th>
                        <th>CRUD Status</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colors as $item  )
                        <tr>
                            <td>{{$item->id}}</td>

                            <td>{{$item->name}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->status ?'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url('adminpage/Colors/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{url('adminpage/Colors/'.$item->id.'/delete')}}" onclick="return confirm('Are you Sure, You Want to delete This CRUD ?')" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection