@extends('layouts.adminpage')
@section('content')

<div class="row" style="background-color: rgb(199, 202, 205)"> 
    
    <div class="col-md-12">

      <div class="card-header">
        <h3> Add Sliders
            <a href="{{url('adminpage/Sliders')}}"
            class ="btn btn-dark btn-sm text-white float-end">Back</a>
        </h3>
      </div>
      <div class="card-body">
        <form action="{{url('adminpage/Sliders/create')}}" method="POST" enctype="multipart/form-data" >
        @csrf
            <div class="row" style="background-color:rgb(222, 222, 234)" >
                
                <div class="col-md-12 mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control">
                    @error('title') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                    @error('description') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" value="image Color" class="form-control">
                    @error('image') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-12-mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" style="width:30px;height:30px" >
                    <small style="color: red"><strong>Check = Hidden, Uncheck =visible</strong></small>
                </div>

                {{--   --}}
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary float-end">Save</button>
                </div>

            </div>    
        </form>
      </div>
    </div>
</div>
@endsection