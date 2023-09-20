{{-- <section class="tp-product-category pt-60 pb-70">
    <div class="container">
        <div class="row row-cols-xl-5 row-cols-lg-5 row-cols-md-4">
            <div class="col">
                <div class="tp-product-category-item text-center mb-40">
                    <div class="tp-product-category-thumb fix">
                        <a href="{{ route('product.category') }}">
                            <img src="{{ asset('frontend/assets/img/product/category/product-cat-1.png') }}"
                                alt="product-category">
                        </a>
                    </div>
                    <div class="tp-product-category-content">
                        <h3 class="tp-product-category-title">
                            <a href="{{ route('product.category') }}">Headphones</a>
                        </h3>
                        <p>20 Product</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="tp-product-category-item text-center mb-40">
                    <div class="tp-product-category-thumb fix">
                        <a href="{{ route('product.category') }}">
                            <img src="{{ asset('frontend/assets/img/product/category/product-cat-2.png') }}"
                                alt="product-category">
                        </a>
                    </div>
                    <div class="tp-product-category-content">
                        <h3 class="tp-product-category-title">
                            <a href="{{ route('product.category') }}">Mobile Phone</a>
                        </h3>
                        <p>25 Product</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="tp-product-category-item text-center mb-40">
                    <div class="tp-product-category-thumb fix">
                        <a href="{{ route('product.category') }}">
                            <img src="{{ asset('frontend/assets/img/product/category/product-cat-3.png') }}"
                                alt="product-category">
                        </a>
                    </div>
                    <div class="tp-product-category-content">
                        <h3 class="tp-product-category-title">
                            <a href="{{ route('product.category') }}">CPU Heat Pipes</a>
                        </h3>
                        <p>57 Product</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="tp-product-category-item text-center mb-40">
                    <div class="tp-product-category-thumb fix">
                        <a href="{{ route('product.category') }}">
                            <img src="{{ asset('frontend/assets/img/product/category/product-cat-4.png') }}"
                                alt="product-category">
                        </a>
                    </div>
                    <div class="tp-product-category-content">
                        <h3 class="tp-product-category-title">
                            <a href="{{ route('product.category') }}">Smart Watch</a>
                        </h3>
                        <p>44 Product</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="tp-product-category-item text-center mb-40">
                    <div class="tp-product-category-thumb fix">
                        <a href="{{ route('product.category') }}">
                            <img src="{{ asset('frontend/assets/img/product/category/product-cat-5.png') }}"
                                alt="product-category">
                        </a>
                    </div>
                    <div class="tp-product-category-content">
                        <h3 class="tp-product-category-title">
                            <a href="{{ route('product.category') }}">With Bluetooth </a>
                        </h3>
                        <p>81 Product</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 --}}


@php
    $productCategory = App\Models\Category::get();
@endphp
<section class="tp-product-category pt-60 pb-70">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="tp-section-title-wrapper mb-40">
                    <h3 class="tp-section-title"> Products Category</h3>
                </div>
            </div>
        </div>
        <div class="row row-cols-xl-5 row-cols-lg-5 row-cols-md-4">
            @if (count($productCategory) > 0)
                @foreach ($productCategory as $category)
                    <div class="col">
                        <div class="tp-product-category-item text-center mb-40">
                            <div class="tp-product-category-thumb fix">
                                <a href="{{ route('product.category.name', $category->id) }}">
                                    <img class="img-fluid" src="{{ asset($category->category_image) }}"
                                        alt="product-category">
                                </a>
                            </div>
                            <div class="tp-product-category-content">
                                <h3 class="tp-product-category-title">
                                    <a
                                        href="{{ route('product.category.name', $category->id) }}">{{ $category->name }}</a>
                                </h3>
                                @php
                                    $productCount = App\Models\Product::where('category_id', $category->id)->count();
                                @endphp
                                <p>{{ $productCount }} Product</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No Category </p>
            @endif

        </div>
    </div>
</section>
