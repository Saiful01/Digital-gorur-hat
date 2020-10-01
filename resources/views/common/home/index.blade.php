@extends('layouts.common')
@section('title', 'Gorur Hat')

@section('content')

    @include('common.home.slider')
    @include('common.home.service')

    @include('common.home.product_slider')



    @include('common.home.banner')
    @include('common.home.tab_product')


    {{--@include('common.home.parallax_banner')--}}


    {{--@include('common.home.blog')
    @include('common.home.instagram')--}}

@stop