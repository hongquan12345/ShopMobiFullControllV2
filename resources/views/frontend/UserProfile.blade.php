@extends('layouts.index')
@section('title')
{{ 'Order List'}}
@endsection
@section('contentHome')
<main class="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <h4>User Profile</h4>
                <hr>
                <a href="{{url('change-password')}}" class="btn btn-warning float-end" style="color: none">Change Password ?</a>
                <div class="underline mb-4"></div>

            </div>
            <div class="col-md-10">
                @if (session('message'))
                    <p class="alert alert-success">{{ session('message') }}</p>
                @endif
                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $erroritem)
                    <li class="text-danger">{{ $erroritem }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">User Detail</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ url('Profile') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label></label>User Name :</label>
                                        <input type="text" name="username" value="{{ Auth::user()->name }}" class="form-control"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label></label>Email address :</label>
                                        <input type="text" readonly value="{{ Auth::user()->email }}" class="form-control"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label></label>Phone number :</label>
                                        <input type="text" name="phone" value="{{ Auth::user()->userDetail->phone ?? '' }}" class="form-control"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label></label>Zip/(PinCode) :</label>
                                        <input type="text" name="pin_code" value="{{ Auth::user()->userDetail->pin_code ?? '' }}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label></label>Address:</label>
                                        <textarea type="text" name="address" value="" class="form-control" rows="3">{{ Auth::user()->userDetail->address ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit"class="btn btn-brand">Save Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection
