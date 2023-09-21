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
    <section class="tp-distributor-area pt-140 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h5 class="text-center text-muted">These are the provinces and cities where we distribute. Please click and select the distributor
                        near your area. You will see their shopee and facebook links. If you are interested to be a
                        distributor please apply here or chat with us. For International Applications you can apply
                        here.</h5>
                </div>
            </div>
        </div>
    </section>
@endsection
