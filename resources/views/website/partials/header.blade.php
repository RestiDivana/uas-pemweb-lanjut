    <!-- tp-header-area-start -->
    <header class="d-none d-lg-block">
        <div id="header-sticky" class="tp-header-area-two tp-header-bg header-transparent header-transparent-two">
            <div class="container-fluid">
                <div class="row gx-0 gy-0 align-items-center">
                    <div class="col-xxl-3 col-xl-3 col-lg-3">
                        <div class="tp-logo text-start">
                            <a href="{{ route('landing.index') }}">
                                <img src="{{ asset(@$setting->firstWhere('key', 'logo')->value) }}"
                                    alt="{{ @$about->title }}" title="{{ @$about->title }}">
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-6 col-lg-6">
                        <div class="tp-main-menu tp-menu-black tp-bs-menu tp-bp-menu text-center">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class=""><a href="index.html">Beranda</a>
                                    </li>
                                    <li class=""><a href="portfolio.html">Tentang Kami</a>
                                    </li>
                                    <li class=""><a href="#">Layanan Kami</a>
                                    </li>
                                    <li class=""><a href="blog.html">informasi</a>
                                    </li>
                                    <li><a href="contact.html">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-3 col-lg-3">
                        <div class="tp-header-left d-flex align-items-center justify-content-end ">
                            <ul class="d-none d-xxl-block">
                                <li><a class="#" href="login.html"><i class="far fa-user fa-user"></i> Login</a>
                                </li>
                                <li><a class="#" href="#">EN<i class="fal fa-arrow-down arrow-down"></i></a>
                                    <ul>
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">Arabic</a></li>
                                        <li><a href="#">Spanish</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="tp-header-yellow-button">
                                <a class="tp-btn-white" href="about.html">Hubungi Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- tp-header-area-end -->

    <div id="header-sticky-mobile" class="tp-md-header-area d-md-block d-lg-none pt-30 pb-30">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6 col-6">
                    <div class="tp-logo">
                        <a href="{{ route('landing.index') }}">
                            <img src="{{ asset(@$setting->firstWhere('key', 'logo')->value) }}"
                                alt="{{ @$about->title }}" title="{{ @$about->title }}">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-6">
                    <div class="tp-header-right z-index-1 d-flex align-items-center justify-content-end">
                        <a class="tp-btn-white d-none d-md-block" href="#">How it Works</a>
                        <button class="tp-menu-bar"><i class="fal fa-bars"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="tp-offcanvas-area">
        <div class="tpoffcanvas">
            <div class="tpoffcanvas__logo">
                <a href="{{ route('landing.index') }}">
                    <img class="sizing-logo-img" src="{{ asset(@$setting->firstWhere('key', 'logo_gray')->value) }}"
                        alt="{{ @$about->title }}" title="{{ @$about->title }}">
                </a>
            </div>
            <div class="tpoffcanvas__close-btn">
                <a class="close-btn" href="javascript:void(0)"><i class="fal fa-times-hexagon"></i></a>
            </div>
            <div class="tpoffcanvas__content d-none d-sm-block">
                <p>We deploy world-class Creative <br> on demand.</p>
            </div>
            <div class="mobile-menu">

            </div>
            <div class="tpoffcanvas__contact">
                <div class="tp-header-yellow-button">
                    <a class="tp-btn-white" href="about.html">Hubungi Kami</a>
                </div>
                {{-- <span>Contact us</span>
                <ul>
                    <li><i class="fas fa-star"></i> <a href="https://goo.gl/maps/abHegV4AoiJA6Syd8"
                            target="_blank">Melbone
                            st, Australia, Ny 12099</a></li>
                    <li><i class="fas fa-star"></i> <a href="tel:8180012345678">+81 800 123 456 78</a></li>
                    <li><i class="fas fa-star"></i> <a href="mailto:Collaxmail@gmail.com">Collaxmail@gmail.com</a>
                    </li>
                </ul> --}}
            </div>
            <div class="tpoffcanvas__input d-none d-sm-block">
                <p>Get UPdate</p>
                <form class="p-relative" action="#">
                    <input type="text" placeholder="Enter mail">
                    <button type="submit"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
            <div class="tpoffcanvas__instagram d-none d-sm-block">
                <p>Check Instagram POst</p>
                <div class="tp-insta">
                    <div class="row">
                        <div class="col-3 col-sm-3"><a href="#"><img src="assets/img/offcanvas/insta-1.jpg"
                                    alt=""></a></div>
                        <div class="col-3 col-sm-3"><a href="#"><img src="assets/img/offcanvas/insta-2.jpg"
                                    alt=""></a></div>
                        <div class="col-3 col-sm-3"><a href="#"><img src="assets/img/offcanvas/insta-4.jpg"
                                    alt=""></a></div>
                        <div class="col-3 col-sm-3"><a href="#"><img src="assets/img/offcanvas/insta-4.jpg"
                                    alt=""></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="body-overlay"></div>
