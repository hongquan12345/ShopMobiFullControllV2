@extends('layouts.index')
@section('title')
{{ $products->metal_title }}
@endsection
@section('meta_keyword')
{{ $products->metal_keyword }}
@endsection
@section('meta_description')
{{ $products->metal_description }}
@endsection
@section('contentHome')
        <livewire:front-end.product.view :category="$category" :products="$products" />
@endsection
