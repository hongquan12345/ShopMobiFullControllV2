@extends('layouts.index')
@section('title', 'Thank You For Shopping')

@section('contentHome')

    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="p-4 shadow bg-white">
                    <div class="col-md-12 text-center">
                        <h2><img src="{{asset('/frontend_assets/imgs/logo/thank_you_for_shopping.jpg')}}" alt="Logo"></h2></br>
                        <h4>Thank You for Shopping with QTV Shop</h4></br>
                        <a href="{{ url('/collections')}}" class="btn btn-warning">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
