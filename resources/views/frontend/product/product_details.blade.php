@extends('frontend.layout.main_master')
@section('frontend')
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area breadcrumb__style-2 include-bg pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <div class="breadcrumb__list has-icon">
                            <span class="breadcrumb-icon">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.42393 16H15.5759C15.6884 16 15.7962 15.9584 15.8758 15.8844C15.9553 15.8104 16 15.71 16 15.6054V6.29143C16 6.22989 15.9846 6.1692 15.9549 6.11422C15.9252 6.05923 15.8821 6.01147 15.829 5.97475L8.75305 1.07803C8.67992 1.02736 8.59118 1 8.5 1C8.40882 1 8.32008 1.02736 8.24695 1.07803L1.17098 5.97587C1.11791 6.01259 1.0748 6.06035 1.04511 6.11534C1.01543 6.17033 0.999976 6.23101 1 6.29255V15.6063C1.00027 15.7108 1.04504 15.8109 1.12451 15.8847C1.20398 15.9585 1.31165 16 1.42393 16ZM10.1464 15.2107H6.85241V10.6202H10.1464V15.2107ZM1.84866 6.48977L8.4999 1.88561L15.1517 6.48977V15.2107H10.9946V10.2256C10.9946 10.1209 10.95 10.0206 10.8704 9.94654C10.7909 9.87254 10.683 9.83096 10.5705 9.83096H6.42848C6.316 9.83096 6.20812 9.87254 6.12858 9.94654C6.04904 10.0206 6.00435 10.1209 6.00435 10.2256V15.2107H1.84806L1.84866 6.48977Z"
                                        fill="#55585B" stroke="#55585B" stroke-width="0.5" />
                                </svg>
                            </span>
                            <span>
                                <a href="{{ route('home') }}">Home</a>
                            </span>
                            <span>
                                <a
                                    href="{{ route('product.category.name', $productInfo->category_id) }}">{{ $productInfo['category']['name'] }}</a>
                            </span>
                            <span>
                                <a
                                    href="{{ route('product.category.name', $productInfo->category_id) }}">{{ $productInfo['Sub_category']['name'] }}</a>
                            </span>
                            <span>{{ $productInfo->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- product details area start -->
    <section class="tp-product-details-area">
        <div class="tp-product-details-top pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="tp-product-details">
                            <img class="img-fluid" src="{{ asset($productInfo->image) }}" alt="{{ $productInfo->name }}">
                        </div>
                    </div> <!-- col end -->
                    <div class="col-xl-5 col-lg-6">
                        <div class="tp-product-details-wrapper">
                            <div class="tp-product-details-category">
                                <span>{{ $productInfo['category']['name'] }}</span>
                            </div>
                            <h3 class="tp-product-details-title">{{ $productInfo->name }}</h3>

                            <p>{!! $productInfo->description !!}</p>

                            <div class="tp-product-details-query">
                                <div class="tp-product-details-query-item d-flex align-items-center">
                                    <span>Category: </span>
                                    <p>
                                        <a
                                            href="{{ route('product.category.name', $productInfo->category_id) }}">{{ $productInfo['category']['name'] }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="tp-product-details-msg mb-15">
                                <ul>
                                    <li>30 days easy returns</li>
                                </ul>
                            </div>
                            <div
                                class="tp-product-details-payment d-flex align-items-center flex-wrap justify-content-between">
                                <p>Guaranteed safe <br> & secure checkout</p>
                                <img src="assets/img/product/icons/payment-option.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product details area end -->

    <!-- related product area start -->
    <section class="tp-related-product pt-95 pb-120">
        <div class="container">
            <div class="row">
                <div class="tp-section-title-wrapper-6 text-center mb-40">
                    <h3 class="tp-section-title-6">Related Products</h3>
                </div>
            </div>
            <div class="row">
                <div class="tp-product-related-slider">
                    <div class="tp-product-related-slider-active swiper-container  mb-10">
                        <div class="swiper-wrapper">
                            @if (count($relatedProducts) > 0)
                                @foreach ($relatedProducts as $product)
                                    <div class="swiper-slide">
                                        <div class="tp-product-item-3 tp-product-style-primary mb-50">
                                            <div class="tp-product-thumb-3 mb-15 fix p-relative z-index-1">
                                                <a href="{{ route('product.details', $product->slug) }}">
                                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                                        title="{{ $product->name }}">
                                                </a>


                                                <!-- product action -->
                                                <div
                                                    class="tp-product-action-3 tp-product-action-4 has-shadow tp-product-action-primaryStyle">
                                                    <div class="tp-product-action-item-3 d-flex flex-column">
                                                        <button type="button"
                                                            class="tp-product-action-btn-3 tp-product-quick-view-btn"
                                                            data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                                            <svg width="18" height="15" viewBox="0 0 18 15"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M8.99948 5.06828C7.80247 5.06828 6.82956 6.04044 6.82956 7.23542C6.82956 8.42951 7.80247 9.40077 8.99948 9.40077C10.1965 9.40077 11.1703 8.42951 11.1703 7.23542C11.1703 6.04044 10.1965 5.06828 8.99948 5.06828ZM8.99942 10.7482C7.0581 10.7482 5.47949 9.17221 5.47949 7.23508C5.47949 5.29705 7.0581 3.72021 8.99942 3.72021C10.9407 3.72021 12.5202 5.29705 12.5202 7.23508C12.5202 9.17221 10.9407 10.7482 8.99942 10.7482Z"
                                                                    fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M1.41273 7.2346C3.08674 10.9265 5.90646 13.1215 8.99978 13.1224C12.0931 13.1215 14.9128 10.9265 16.5868 7.2346C14.9128 3.54363 12.0931 1.34863 8.99978 1.34773C5.90736 1.34863 3.08674 3.54363 1.41273 7.2346ZM9.00164 14.4703H8.99804H8.99714C5.27471 14.4676 1.93209 11.8629 0.0546754 7.50073C-0.0182251 7.33091 -0.0182251 7.13864 0.0546754 6.96883C1.93209 2.60759 5.27561 0.00288103 8.99714 0.000185582C8.99894 -0.000712902 8.99894 -0.000712902 8.99984 0.000185582C9.00164 -0.000712902 9.00164 -0.000712902 9.00254 0.000185582C12.725 0.00288103 16.0676 2.60759 17.945 6.96883C18.0188 7.13864 18.0188 7.33091 17.945 7.50073C16.0685 11.8629 12.725 14.4676 9.00254 14.4703H9.00164Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                            <span class="tp-product-tooltip">Quick View</span>
                                                        </button>

                                                    </div>
                                                </div>

                                                <div class="tp-product-add-cart-btn-large-wrapper">
                                                    <a href="{{ route('product.details', $product->slug) }}" type="button"
                                                        class="tp-product-add-cart-btn-large">
                                                        Product Details
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="tp-product-content-3">
                                                <div class="tp-product-tag-3">
                                                    <span>{{ $product['category']['name'] }}</span>
                                                </div>
                                                <h3 class="tp-product-title-3">
                                                    <a
                                                        href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <span>No Related Product</span>
                            @endif

                        </div>
                        <div class="tp-related-swiper-scrollbar tp-swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
    </section>
    <!-- related product area end -->

    <div class="modal fade tp-product-modal" id="producQuickViewModal" tabindex="-1" aria-labelledby="producQuickViewModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="tp-product-modal-content d-lg-flex align-items-start">
                    <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal"
                        data-bs-target="#producQuickViewModal"><i class="fa-regular fa-xmark"></i></button>
                    <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                        <div class="tab-content m-img" id="productDetailsNavContent">
                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel"
                                aria-labelledby="nav-1-tab" tabindex="0">
                                <div class="tp-product-details-nav-main-thumb" style="border: 1px solid #eee;">
                                    <img src="{{ asset($product->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tp-product-details-wrapper">
                        <div class="tp-product-details-category">
                            <span>{{ $product['category']['name'] }}</span>
                        </div>
                        <h3 class="tp-product-details-title">{{ $product->name }}</h3>

                        <p>{!! $product->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
