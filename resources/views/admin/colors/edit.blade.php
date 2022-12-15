@extends('layouts.adminpage')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success"> {{session('message')}} </div>
        @endif

        <div class="card-header">
            <h3> Edit CRUD Color
                <a href="{{url('adminpage/Colors')}}"
                class="btn btn-Dark btn-sm btn-primary float-end">
                    Back.
                </a>
            </h3>
        </div>

        <div class="card-body">
            <form action="{{ url('adminpage/Colors/'.$color->id) }}" method="POST">
                @csrf
                @method('put')
                    <div class="col-md-6 mb-3">
                        <label for="">CRUD Name</label>
                        <input type="text" name="name" value="{{$color->name}}" class="form-control">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">CRUD Code</label>
                        <input type="text" name="code" value="{{$color->code}}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">CRUD STATUS</label>
                        <input type="checkbox"
                        {{$color->status ? 'checked':''}}
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
