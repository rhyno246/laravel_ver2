@extends('frontend.layout.layout')
@section('title')
    <title>Trang Chủ</title>
@endsection
@section('content')
    @include('frontend.pages.home.components.slider')
    <div class="container">
        <div class="row">
            @include('frontend.partials.slidebar')
            <div class="col-sm-9 padding-right">
                @include('frontend.pages.home.components.feature_product')
                @include('frontend.pages.home.components.category_tabs')
                @include('frontend.pages.home.components.recommended')
            </div>
        </div>
    </div>
@endsection
