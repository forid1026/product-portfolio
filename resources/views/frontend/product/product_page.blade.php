@extends('frontend.layout.main_master')
@section('frontend')
    <style>
        .tp-shop-widget-categories ul li a.active {
            color: var(--tp-theme-primary);
        }

        .tp-shop-widget-categories ul li a.active::after {
            background-color: var(--tp-theme-primary);
        }

        .tp-shop-widget-categories ul li a.active span {
            background-color: var(--tp-theme-primary);
            border-color: var(--tp-theme-primary);
            color: var(--tp-common-white);
        }
    </style>
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-100 text-center pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Product</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('home') }}">Home</a></span>
                            <span><a href="{{ route('products') }}">Product</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- shop area start -->
    <section class="tp-shop-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="tp-shop-sidebar mr-10">
                        <!-- categories -->
                        <div class="tp-shop-widget mb-50">
                            <h3 class="tp-shop-widget-title">Categories</h3>

                            <div class="tp-shop-widget-content">
                                <div class="tp-shop-widget-categories">
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{ route('product.category.name', $category->id) }}">{{ $category->name }}
                                                    <span>
                                                        @php
                                                            $productCount = App\Models\Product::where('category_id', $category->id)->count();
                                                        @endphp
                                                        {{ $productCount }}
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="tp-shop-main-wrapper">

                        <div class="tp-shop-top mb-45">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="tp-shop-top-left d-flex align-items-center ">
                                        <div class="tp-shop-top-tab tp-tab">
                                            <ul class="nav nav-tabs" id="productTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="grid-tab" data-bs-toggle="tab"
                                                        data-bs-target="#grid-tab-pane" type="button" role="tab"
                                                        aria-controls="grid-tab-pane" aria-selected="true">
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M16.3327 6.01341V2.98675C16.3327 2.04675 15.906 1.66675 14.846 1.66675H12.1527C11.0927 1.66675 10.666 2.04675 10.666 2.98675V6.00675C10.666 6.95341 11.0927 7.32675 12.1527 7.32675H14.846C15.906 7.33341 16.3327 6.95341 16.3327 6.01341Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M16.3327 15.18V12.4867C16.3327 11.4267 15.906 11 14.846 11H12.1527C11.0927 11 10.666 11.4267 10.666 12.4867V15.18C10.666 16.24 11.0927 16.6667 12.1527 16.6667H14.846C15.906 16.6667 16.3327 16.24 16.3327 15.18Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M7.33268 6.01341V2.98675C7.33268 2.04675 6.90602 1.66675 5.84602 1.66675H3.15268C2.09268 1.66675 1.66602 2.04675 1.66602 2.98675V6.00675C1.66602 6.95341 2.09268 7.32675 3.15268 7.32675H5.84602C6.90602 7.33341 7.33268 6.95341 7.33268 6.01341Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M7.33268 15.18V12.4867C7.33268 11.4267 6.90602 11 5.84602 11H3.15268C2.09268 11 1.66602 11.4267 1.66602 12.4867V15.18C1.66602 16.24 2.09268 16.6667 3.15268 16.6667H5.84602C6.90602 16.6667 7.33268 16.24 7.33268 15.18Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="list-tab" data-bs-toggle="tab"
                                                        data-bs-target="#list-tab-pane" type="button" role="tab"
                                                        aria-controls="list-tab-pane" aria-selected="false">
                                                        <svg width="16" height="15" viewBox="0 0 16 15"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15 7.11108H1" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M15 1H1" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M15 13.2222H1" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tp-shop-top-result">
                                            <p>Showing 1–12 of {{ count($products) }} results</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-xl-6">
                                    <div class="tp-shop-top-right d-sm-flex align-items-center justify-content-xl-end">
                                        <div class="tp-shop-top-select">
                                            <select>
                                                <option>Default Sorting</option>
                                                <option>Low to Hight</option>
                                                <option>High to Low</option>
                                                <option>New Added</option>
                                                <option>On Sale</option>
                                            </select>
                                        </div>
                                        <div class="tp-shop-top-filter">
                                            <button type="button" class="tp-filter-btn filter-open-btn">
                                                <span>
                                                    <svg width="16" height="15" viewBox="0 0 16 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.9998 3.45001H10.7998" stroke="currentColor"
                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M3.8 3.45001H1" stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M6.5999 5.9C7.953 5.9 9.0499 4.8031 9.0499 3.45C9.0499 2.0969 7.953 1 6.5999 1C5.2468 1 4.1499 2.0969 4.1499 3.45C4.1499 4.8031 5.2468 5.9 6.5999 5.9Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M15.0002 11.15H12.2002" stroke="currentColor"
                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M5.2 11.15H1" stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M9.4002 13.6C10.7533 13.6 11.8502 12.5031 11.8502 11.15C11.8502 9.79691 10.7533 8.70001 9.4002 8.70001C8.0471 8.70001 6.9502 9.79691 6.9502 11.15C6.9502 12.5031 8.0471 13.6 9.4002 13.6Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                Filter
                                            </button>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="tp-shop-items-wrapper tp-shop-item-primary">
                            <div class="tab-content" id="productTabContent">
                                <div class="tab-pane fade show active" id="grid-tab-pane" role="tabpanel"
                                    aria-labelledby="grid-tab" tabindex="0">
                                    <div class="row infinite-container">
                                        @if (count($products) > 0)
                                            @foreach ($products as $product)
                                                <div class="col-xl-4 col-md-6 col-sm-6 infinite-item">
                                                    <div class="tp-product-item-2 mb-40">
                                                        <div class="tp-product-thumb-2 p-relative z-index-1 fix w-img">
                                                            <a href="{{ route('product.details', $product->slug) }}">
                                                                <img src="{{ asset($product->image) }}"
                                                                    alt="{{ $product->name }}">
                                                            </a>
                                                            <!-- product action -->
                                                            <div class="tp-product-action-2 tp-product-action-blackStyle">
                                                                <div class="tp-product-action-item-2 d-flex flex-column">
                                                                    <button type="button"
                                                                        class="tp-product-action-btn-2 tp-product-quick-view-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#producQuickViewModal">
                                                                        <svg width="18" height="15"
                                                                            viewBox="0 0 18 15" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M8.99948 5.06828C7.80247 5.06828 6.82956 6.04044 6.82956 7.23542C6.82956 8.42951 7.80247 9.40077 8.99948 9.40077C10.1965 9.40077 11.1703 8.42951 11.1703 7.23542C11.1703 6.04044 10.1965 5.06828 8.99948 5.06828ZM8.99942 10.7482C7.0581 10.7482 5.47949 9.17221 5.47949 7.23508C5.47949 5.29705 7.0581 3.72021 8.99942 3.72021C10.9407 3.72021 12.5202 5.29705 12.5202 7.23508C12.5202 9.17221 10.9407 10.7482 8.99942 10.7482Z"
                                                                                fill="currentColor" />
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M1.41273 7.2346C3.08674 10.9265 5.90646 13.1215 8.99978 13.1224C12.0931 13.1215 14.9128 10.9265 16.5868 7.2346C14.9128 3.54363 12.0931 1.34863 8.99978 1.34773C5.90736 1.34863 3.08674 3.54363 1.41273 7.2346ZM9.00164 14.4703H8.99804H8.99714C5.27471 14.4676 1.93209 11.8629 0.0546754 7.50073C-0.0182251 7.33091 -0.0182251 7.13864 0.0546754 6.96883C1.93209 2.60759 5.27561 0.00288103 8.99714 0.000185582C8.99894 -0.000712902 8.99894 -0.000712902 8.99984 0.000185582C9.00164 -0.000712902 9.00164 -0.000712902 9.00254 0.000185582C12.725 0.00288103 16.0676 2.60759 17.945 6.96883C18.0188 7.13864 18.0188 7.33091 17.945 7.50073C16.0685 11.8629 12.725 14.4676 9.00254 14.4703H9.00164Z"
                                                                                fill="currentColor" />
                                                                        </svg>
                                                                        <span
                                                                            class="tp-product-tooltip tp-product-tooltip-right">Quick
                                                                            View</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tp-product-content-2 pt-15">
                                                            <div class="tp-product-tag-2">
                                                                <a
                                                                    href="{{ route('product.category.name', $product->category_id) }}">{{ $product['category']['name'] }}
                                                                </a>
                                                            </div>
                                                            <h3 class="tp-product-title-2">
                                                                <a
                                                                    href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <span>No products matching your selection.</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-tab-pane" role="tabpanel" aria-labelledby="list-tab"
                                    tabindex="0">
                                    <div class="tp-shop-list-wrapper tp-shop-item-primary mb-70">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                @if (count($products) > 0)
                                                    @foreach ($products as $product)
                                                        <div class="tp-product-list-item d-md-flex">
                                                            <div class="tp-product-list-thumb p-relative fix">
                                                                <a href="{{ route('product.details', $product->slug) }}">
                                                                    <img src="{{ asset($product->image) }}"
                                                                        alt="{{ $product->name }}">
                                                                </a>

                                                                <!-- product action -->
                                                                <div
                                                                    class="tp-product-action-2 tp-product-action-blackStyle">
                                                                    <div
                                                                        class="tp-product-action-item-2 d-flex flex-column">
                                                                        <button type="button"
                                                                            class="tp-product-action-btn-2 tp-product-quick-view-btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#producQuickViewModal">
                                                                            <svg width="18" height="15"
                                                                                viewBox="0 0 18 15" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M8.99948 5.06828C7.80247 5.06828 6.82956 6.04044 6.82956 7.23542C6.82956 8.42951 7.80247 9.40077 8.99948 9.40077C10.1965 9.40077 11.1703 8.42951 11.1703 7.23542C11.1703 6.04044 10.1965 5.06828 8.99948 5.06828ZM8.99942 10.7482C7.0581 10.7482 5.47949 9.17221 5.47949 7.23508C5.47949 5.29705 7.0581 3.72021 8.99942 3.72021C10.9407 3.72021 12.5202 5.29705 12.5202 7.23508C12.5202 9.17221 10.9407 10.7482 8.99942 10.7482Z"
                                                                                    fill="currentColor" />
                                                                                <path fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M1.41273 7.2346C3.08674 10.9265 5.90646 13.1215 8.99978 13.1224C12.0931 13.1215 14.9128 10.9265 16.5868 7.2346C14.9128 3.54363 12.0931 1.34863 8.99978 1.34773C5.90736 1.34863 3.08674 3.54363 1.41273 7.2346ZM9.00164 14.4703H8.99804H8.99714C5.27471 14.4676 1.93209 11.8629 0.0546754 7.50073C-0.0182251 7.33091 -0.0182251 7.13864 0.0546754 6.96883C1.93209 2.60759 5.27561 0.00288103 8.99714 0.000185582C8.99894 -0.000712902 8.99894 -0.000712902 8.99984 0.000185582C9.00164 -0.000712902 9.00164 -0.000712902 9.00254 0.000185582C12.725 0.00288103 16.0676 2.60759 17.945 6.96883C18.0188 7.13864 18.0188 7.33091 17.945 7.50073C16.0685 11.8629 12.725 14.4676 9.00254 14.4703H9.00164Z"
                                                                                    fill="currentColor" />
                                                                            </svg>
                                                                            <span
                                                                                class="tp-product-tooltip tp-product-tooltip-right">Quick
                                                                                View</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tp-product-list-content">
                                                                <div class="tp-product-content-2 pt-15">
                                                                    <div class="tp-product-tag-2">
                                                                        <a
                                                                            href="{{ route('product.category.name', $product->category_id) }}">{{ $product['category']['name'] }}
                                                                        </a>
                                                                    </div>
                                                                    <h3 class="tp-product-title-2">
                                                                        <a
                                                                            href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
                                                                    </h3>
                                                                    <p>{!! $product->description !!} </p>
                                                                    <div class="tp-product-list-add-to-cart">
                                                                        <a href="{{ route('product.details', $product->slug) }}"
                                                                            class="tp-product-list-add-to-cart-btn">Product
                                                                            Details</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <span>No products matching your selection.</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="infinite-pagination d-none">
                            <a href="{{ route('products') }}" class="infinite-next-link">Next</a>
                        </div>
                        <div class="tp-shop-pagination mt-20">
                            <div class="tp-pagination">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="{{ route('products') }}"
                                                class="tp-pagination-prev prev page-numbers">
                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.00017 6.77879L14 6.77879" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M6.24316 11.9999L0.999899 6.77922L6.24316 1.55762"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('products') }}">1</a>
                                        </li>
                                        <li>
                                            <span class="current">2</span>
                                        </li>
                                        <li>
                                            <a href="{{ route('products') }}">3</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('products') }}" class="next page-numbers">
                                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.9998 6.77883L1 6.77883" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M8.75684 1.55767L14.0001 6.7784L8.75684 12"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop area end -->
@endsection
