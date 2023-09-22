<section class="tp-product-area pb-55">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="tp-section-title-wrapper mb-40">
                    <h3 class="tp-section-title">Trending Products</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-product-tab-content">
                    <div class="tab-pane fade show active" id="new-tab-pane" role="tabpanel" aria-labelledby="new-tab"
                        tabindex="0">
                        <div class="row">
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <div class="col-xl-3 col-lg-3 col-sm-6">
                                        <div class="tp-product-item p-relative transition-3 mb-25">
                                            <div class="tp-product-thumb p-relative fix m-img">
                                                <a href="{{ route('product.details', $product->slug) }}">
                                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                                </a>

                                                <!-- product badge -->
                                                <div class="tp-product-badge">
                                                </div>


                                            </div>
                                            <!-- product content -->
                                            <div class="tp-product-content">
                                                <div class="tp-product-category">
                                                    <a
                                                        href="{{ route('product.category.name', $product->category_id) }}">{{ $product['category']['name'] }}</a>
                                                </div>
                                                <h3 class="tp-product-title">
                                                    <a href="{{ route('product.details', $product->slug) }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </h3>
                                                <div class="tp-product-price-wrapper">
                                                    <span class="tp-product-price new-price">
                                                        <a class="tp-product-list-add-to-cart-btn"
                                                            href="{{ route('product.details', $product->slug) }}">See
                                                            Details</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <span>No products</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



</section>
