<div id="header-sticky-2" class="tp-header-sticky-area">
    <div class="container">
        <div class="tp-mega-menu-wrapper p-relative">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            {{-- <img src="{{ asset('frontend/assets/img/logo/logo.svg') }}" alt="logo"> --}}
                            <img class="w-25" src="{{ asset('frontend/assets/img/logo/logo.png') }}" alt="logo">

                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-block">
                    <div class="tp-header-sticky-menu main-menu menu-style-1">
                        <nav id="mobile-menu">
                            <ul>
                                <li class="">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li><a href="{{ route('about.us') }}">About Us</a></li>
                                <li class="has-dropdown">
                                    <a href="{{ route('distributors') }}">Distributors</a>
                                    <ul class="tp-submenu">
                                        <li><a href="{{ route('distributors') }}">Distributors</a></li>
                                        <li><a href="{{ route('distributors.apply') }}">Apply For</a></li>
                                    </ul>
                                </li>
                                <li class="">

                                    <a href="shop.html">Products</a>
                                </li>
                                <li><a href="{{ route('contact.us') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                    <div class="tp-header-action d-flex align-items-center justify-content-end ml-50">
                        <div class="tp-header-action-item d-lg-none">
                            <button type="button" class="tp-header-action-btn tp-offcanvas-open-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16"
                                    viewBox="0 0 30 16">
                                    <rect x="10" width="20" height="2" fill="currentColor" />
                                    <rect x="5" y="7" width="25" height="2"
                                        fill="currentColor" />
                                    <rect x="10" y="14" width="20" height="2"
                                        fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                        <div class="tp-header-contact-icon sticky-contact">
                            <span>
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.96977 3.24859C2.26945 2.75144 3.92158 0.946726 5.09889 1.00121C5.45111 1.03137 5.76246 1.24346 6.01544 1.49057H6.01641C6.59631 2.05874 8.26011 4.203 8.35352 4.65442C8.58411 5.76158 7.26378 6.39979 7.66756 7.5157C8.69698 10.0345 10.4707 11.8081 12.9908 12.8365C14.1058 13.2412 14.7441 11.9219 15.8513 12.1515C16.3028 12.2459 18.4482 13.9086 19.0155 14.4894V14.4894C19.2616 14.7414 19.4757 15.0537 19.5049 15.4059C19.5487 16.6463 17.6319 18.3207 17.2583 18.5347C16.3767 19.1661 15.2267 19.1544 13.8246 18.5026C9.91224 16.8749 3.65985 10.7408 2.00188 6.68096C1.3675 5.2868 1.32469 4.12906 1.96977 3.24859Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12.936 1.23685C16.4432 1.62622 19.2124 4.39253 19.6065 7.89874"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12.936 4.59337C14.6129 4.92021 15.9231 6.23042 16.2499 7.90726"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="tp-header-contact-content sticky-contact">
                            <h5>Hotline:</h5>
                            <p><a href="tel:01701111120">+880 170 111 1120</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
