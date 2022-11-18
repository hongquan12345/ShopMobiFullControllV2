@extends('layouts.adminpage')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success"> {{session('message')}} </div>
        @endif

        <div class="card-header">
            <h3> Create Color
                <a href="{{url('adminpage/Colors')}}"
                class="btn btn-Dark btn-sm btn-primary float-end">
                    Back
                </a>
            </h3>
        </div>

        <div class="card-body">
            <form action="{{ url('adminpage/Colors/create') }}" method="POST">
                @csrf
                    <div class="col-md-6 mb-3">
                        <label for="">Color Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Color Code</label>
                        <input type="text" name="code" class="form-control">
                        @error('code') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=""> STATUS</label>
                        <input type="checkbox" 
                        name="status" 
                        style="width: 30px;height:30px">
                            checked = Hidden, Uncheck = Visible
                    </div>
                    <div class="col-md-12 mb-3">
                        <button class="btn btn-primary" type="submit">submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection