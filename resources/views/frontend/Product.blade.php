@extends('layouts.index')
@section('title')
{{ $category->metal_title }}
@endsection
@section('meta_keyword')
{{ $category->metal_keyword }}
@endsection
@section('meta_description')
{{ $category->metal_description }}
@endsection
@section('contentHome')
<div>
    <main class="main">
        {{-- route link --}}
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="{{url('/home')}}" rel="nofollow">Home</a>
                        <span ></span> <a href="{{url('/collections')}}" rel="nofollow">collections</a>
                        <span></span>
                    </div>
                </div>
            </div>
        {{-- route link --}}

            <section class="mt-50 mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" >
                            <div class="">
                                {{-- <div class="totall-product">
                                    <p> We found <strong class="text-brand">{{$products->count()}}</strong> Product for
                                        <strong>{{$category->name}}</strong></p>
                                </div> --}}
                            </div>
                                <livewire:front-end.product.index :category="$category"/>
                        </div>

                    </div>
                </div>
            </section>

        </main>
    </div>



@endsection
