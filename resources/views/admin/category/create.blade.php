@extends('layouts.adminpage')
@section('content')

<div class="row"> 
    
    <div class="col-md-12">
      <div class="card-header">
        <h3> Add Category
            <a href="{{url('adminpage/Category/create')}}"
            class ="btn btn-dark btn-sm text-white float-end">Back</a>
        </h3>
      </div>
      <div class="card-body">

        <form action="{{url('adminpage/Category')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">slug</label>
                    <input type="text" name="slug" class="form-control">
                    @error('slug') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                    @error('description') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                    @error('image') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" >
                </div>
                
                <div class="col-md-12 mb-3">
                    <h4>Seo Tags</h4>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Metal Title</label>
                    <input type="text" name="metal_title" class="form-control">
                    @error('metal_title') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Metal Keyword</label>
                    <input type="text" name="metal_keyword" class="form-control">
                    @error('metal_keyword') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Metal Description</label>
                    <textarea name="metal_description" class="form-control"></textarea>
                    @error('metal_description') <small class="text-danger">{{$message}}</small>@enderror
                </div>
                {{--   --}}
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary float-end  ">Save</button>
                </div>

            </div>    
        </form>
      </div>
    </div>
</div>
@endsection