@extends('frontend.layout.main_master')
@section('frontend')
    <style>
        form.distributor-form input,
        form.distributor-form select {
            margin-bottom: 20px;
        }

        select#distributor_pack {
            height: 56px;
        }
    </style>
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Distributor & Reseller Application</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('home') }}">Home</a></span>
                            <span>Distributors</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->


    <!-- contact area start -->
    <section class="tp-contact-area pb-100">
        <div class="container">
            <div class="tp-contact-inner">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 mx-auto">
                        <div class="tp-contact-wrapper">
                            <h3 class="tp-contact-title">We will review and get in touch with you with the contact details
                                you provided</h3>

                            <div class="tp-contact-form">
                                <form id="form" action="{{ route('store.distributor')}}" class="distributor-form" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Enter Your Name" id="name"
                                                name="name" class="form-control" required
                                                data-parsley-required-message="Name is required">
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <input type="email" placeholder="Enter Your Email" id="email"
                                                name="email" class="form-control" required
                                                data-parsley-required-message="Email is required">
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <input type="tel" placeholder="Enter Your Phone" id="phone"
                                                name="phone" class="form-control" required
                                                data-parsley-required-message="Phone is required">
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <input type="text" placeholder="Enter Your Province" id="province"
                                                name="province" class="form-control" required
                                                data-parsley-required-message="Province is required">
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <input type="text" placeholder="Enter Your City" id="city"
                                                name="city" class="form-control" required
                                                data-parsley-required-message="City is required">
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-sm-12">
                                            <select name="distributor_package" id="distributor_package" class="form-control"
                                                required data-parsley-required-message="Distributors is required">
                                                <option value="" selected disabled>Select Distributor Package</option>
                                                <option value="Regional">Regional Distributor Package</option>
                                                <option value="Provincial">Provincial Distributor Package</option>
                                                <option value="District">District Distributor Package</option>
                                                <option value="City">City Distributor Package</option>
                                                <option value="Reseller">Reseller</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tp-contact-btn">
                                        <button type="submit">Send Message</button>
                                    </div>
                                </form>
                                <p class="ajax-response"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact area end -->

    <script>
        $('#form').parsley();
    </script>
@endsection
