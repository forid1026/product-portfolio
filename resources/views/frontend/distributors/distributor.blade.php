@extends('frontend.layout.main_master')
@section('frontend')
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Distributor & Reseller List</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('home') }}">Home</a></span>
                            <span>Distributors List</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->
    <section class="tp-distributor-area pt-30">
        <div class="container">
            <div class="row">
                @foreach ($distributors as $distributor)
                    <div class="col-md-4 col-sm-12 col-lg-4 mb-40">
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
@endsection
