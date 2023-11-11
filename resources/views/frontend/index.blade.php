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


    <!-- Distributor area Start -->
    <section class="tp-distributor-area pt-30">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title">Distributor</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($distributors as $distributor)
                    <div class="col-md-3 col-sm-12 col-lg-3 mb-40">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="distributor-wrapper">
                                    <div class="distributor-image">
                                        <img class="img-thumbnail img-fluid"
                                            src="{{ asset('upload/distributor_images/distributor-1.jpg') }}" alt="">
                                    </div>
                                    <div class="distributor-information py-3">
                                        <h5>{{ $distributor->name }}</h5>
                                        <p class="fw-thin fs-5">{{ $distributor->package }} - {{ $distributor->province }}
                                        </p>
                                        <a target="_blank" class="btn btn-dark"
                                            href="{{ $distributor->facebook_url }}">Chat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Distributor area end -->




    <!-- product quick view start -->
    @include('frontend.home.product_modal')
    <!-- product quick view end -->
@endsection
