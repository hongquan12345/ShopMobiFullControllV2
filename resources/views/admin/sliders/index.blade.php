@extends('layouts.adminpage')
@section('content')
<div class="row" style="background-color: rgb(199, 202, 205)" >
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success"> {{session('message')}} </div>

        @endif

        <div class="card-header">
            <h3>Slider List
                <a href="{{ url('adminpage/Sliders/create') }}" class="btn btn-Dark btn-sm btn-primary float-end">
                    Add Slider
                </a>
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped " style="background-color:rgb(222, 222, 234)">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($sliders as $slider)
                       <tr>
                            <td>{{$slider->id}}</td>
                            <td>{{$slider->title}}</td>

                            <td>{{$slider->description}}</td>
                            <td>
                                <img src="{{asset ("$slider->image")}}" style="width=100px; height=80px" alt="Slider-image">
                            </td>

                            <td>{{$slider->status == '0' ? 'Visible':'Hidden'}}</td>
                            <td>
                                <a href="{{url('adminpage/Sliders/'.$slider->id.'/edit')}}" class="btn btn-success">Edit</a>
                                <a href="{{url('adminpage/Sliders/'.$slider->id.'/delete')}}" onclick="return confirm('Are you sure you want delete this Slider ?');" class="btn btn-danger">Delete</a>
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