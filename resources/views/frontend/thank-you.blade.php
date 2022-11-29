@extends('layouts.index')
@section('title', 'Thank You For Shopping')

@section('contentHome')

    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="p-4 shadow bg-white">
                    <div class="col-md-12 text-center">
                        @if (session('message'))
                            <h5 class="alert alert-success">{{ session('message')}}</h5>
                        @endif

                        <h2><img src="{{asset('/frontend_assets/imgs/logo/thank_you_for_shopping.png')}}"  alt="Logo"></h2></br>
                        <h4>Cảm ơn bạn đã mua hàng tại QTV Shop</h4></br>
                        <a href="{{ url('/collections')}}" class="btn btn-warning">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
