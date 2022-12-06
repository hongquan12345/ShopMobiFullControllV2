@extends('layouts.index')
@section('contentHome')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span><a href="{{url('/register')}}">Register</a>
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
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
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1"> <a href="{{ url('Profile') }}" class="shadow float-end" style="background-color: #F15412;color:white;border: 2px solid #F15412;border-radius: 7px">Back</a>
                                            <h3 class="mb-30">Change Password</h3>
                                        </div>
                                        <form method="POST" action="{{url('change-password')}}">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="Current Password" class="col-md-4 col-form-label text-md-end">{{ __('Current Password') }}</label>
                                                <div class="col-md-6">
                                                    <input  type="text" name="current_Password"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="New password" class="col-md-4 col-form-label text-md-end">{{ __('New password') }}</label>
                                                <div class="col-md-6">
                                                    <input  type="text" name="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                                <div class="col-md-6">
                                                    <input  type="text" name="password_confirmation"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="shadow btn btn-primary">
                                                        {{ __('Update Password') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="text-muted text-fill-out text-center">Dont have an account? <a href="{{url('/register')}}">register now</a></div>
                            </div>

                            <div class="col-lg-6">
                               <img src="{{asset('/frontend_assets/imgs/loginqtvmobile.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


@endsection
