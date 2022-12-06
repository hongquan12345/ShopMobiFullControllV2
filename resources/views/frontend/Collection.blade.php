@extends('layouts.index')
@section('title')
{{ 'AllCollection'}}
@endsection
@section('contentHome')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/home') }}" rel="nofollow">Home</a>
                <span ></span><a href="{{url('/collections')}}" >Danh mục</a>

            </div>
        </div>
    </div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>
                @forelse ($categorys as $categoryItem)
                <div class="col-6 col-md-3" >
                    <div class="category-card border border-1" style="background-color: rgb(234, 229, 229)">
                        <a href="{{'/collections/'.$categoryItem->slug}}">
                            <div class="category-card-img img-hover-scale overflow-hidden">
                                @if ($categoryItem->image !='null')
                                <img src="{{asset("$categoryItem->image")}}" style="width: 600px;height:300px">
                                @else
                                <img src="{{asset('emptyimage.jpg')}}" style="width: 600px;height:300px" alt="">
                                @endif
                            </div>
                            <div class="category-card-body" style="text-align: center">
                                <h3 class="animated fw-900 text-brand " style="text-decoration-line: underline">{{$categoryItem->name}}</h3>
                                <h5 class="animated fw-300 text-bg-warning">{{$categoryItem->description}}</h5>
                            </div>
                        </a>
                    </div>
                    <br>
                </div>
                <br>
                @empty
                    <h4>Not thing to show</h4>
                @endforelse

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</main>

@endsection
