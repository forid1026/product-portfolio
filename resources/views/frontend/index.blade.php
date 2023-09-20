@extends('frontend.layout.main_master')
@section('frontend')
    <!-- slider area start -->
    @include('frontend.home.home_slider')
    <!-- slider area end -->

    <!-- product category area start -->
    @include('frontend.home.home_category')
    <!-- product category area end -->

   

    <!-- product area start -->
    @include('frontend.home.home_product')
    <!-- product area end -->


    <!-- product quick view start -->
    @include('frontend.home.product_modal')
    <!-- product quick view end -->
@endsection
