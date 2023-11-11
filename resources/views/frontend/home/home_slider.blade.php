<!-- slider area start -->
<section class="tp-slider-area p-relative z-index-1">
    <div class="tp-slider-active tp-slider-variation swiper-container">
        <div class="swiper-wrapper">

            @foreach ($sliders as $slide)
                <div class="tp-slider-item is-light d-flex align-items-center swiper-slide">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 p-0">
                                <div class="slider-image">
                                    <img class="img-fluid" src="{{ asset($slide->slider_image) }}" alt="slider-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="tp-slider-arrow tp-swiper-arrow d-none d-lg-block">
            <button type="button" class="tp-slider-button-prev">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 13L1 7L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <button type="button" class="tp-slider-button-next">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 13L7 7L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        <div class="tp-slider-dot tp-swiper-dot"></div>
    </div>
</section>
<!-- slider area end -->
