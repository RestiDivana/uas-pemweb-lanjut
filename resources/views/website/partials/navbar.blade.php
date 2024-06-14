    <!-- tp-header-area-start -->
    <header class="d-none d-lg-block">
        <div id="header-sticky" class="tp-header-area-two tp-header-bg header-transparent header-transparent-two">
            <div class="container-fluid">
                <div class="row gx-0 gy-0 align-items-center">
                    <div class="col-xxl-3 col-xl-3 col-lg-3">
                        <div class="tp-logo text-start">
                            <a href="{{ route('.index') }}">
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-6 col-lg-6" style="visibility: hidden;">
                        <div class="tp-main-menu tp-menu-black tp-bs-menu tp-bp-menu text-center">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="{{ $menu == 'Home' ? 'active' : '' }}"><a
                                            href="">Beranda</a>
                                    </li>
                                    <li class="{{ $menu == 'About' ? 'active' : '' }}"><a
                                            href="">profil</a>
                                    </li>
                                    <li class=""><a
                                            href="">Layanan</a>
                                    </li>
                                    <li class="{{ $menu == 'Article' ? 'active' : '' }}"><a
                                            href="">informasi</a>
                                    </li>
                                    <li class="{{ $menu == 'Contact' ? 'active' : '' }}"><a
                                            href="">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                    <div class="col-xxl-4 col-xl-3 col-lg-3">
                        <div class="tp-header-left d-flex align-items-center justify-content-end ">
                            <ul class="d-none ">
                                <li class="corporate-social__scroll smooth wow tpfadeRight text-md-end text-center"><a
                                        class="" href="#corporate-about"><i class="far fa-arrow-down"
                                            data-wow-duration=".9s" data-wow-delay=".7s"></i> down</a>
                                </li>
                            </ul>

                            <div class="tp-header-yellow-button">
                                <a class="tp-btn-white" href="{{ route('auth.login') }}">Log In</a>
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
                        <a href="">
                            <img src="{{ asset(@$setting->firstWhere('key', 'logo')->value) }}"
                                alt="{{ @$about->title }}" title="{{ @$about->title }}">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-6">
                    <div class="tp-header-right z-index-1 d-flex align-items-center justify-content-end">
                        <a class="tp-btn-white d-none d-md-block" href="{{ route('auth.login') }}">Log In</a>
                        <button class="tp-menu-bar"><i class="fal fa-bars"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (!request()->is(''))
        @if (Session::has('status'))
            <div class="alert-suscribe wow">
                <div id="status-alert" class="alert alert-{{ session('status') }}" role="alert">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert-suscribe wow">
                    <div id="status-alert-danger" class="alert alert-danger" role="alert">{{ $error }}</div>
                </div>
            @endforeach
        @endif

        <script>
            setTimeout(function() {
                var statusAlert = document.getElementById('status-alert');
                var statusAlertDanger = document.getElementById('status-alert-danger');

                if (statusAlertDanger) {
                    statusAlertDanger.remove();
                }
                if (statusAlert) {
                    statusAlert.remove();
                }
            }, 3000);
        </script>
    @endif


    <div class="tp-offcanvas-area">
        <div class="tpoffcanvas">
            <div class="tpoffcanvas__logo">
                <a href="">
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
                    <a class="tp-btn-white" href="{{ route('auth.login') }}">Log In</a>
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
            <div class="tpoffcanvas__input mt-80 d-sm-block">
                <p>Get UPdate</p>
                <form class="p-relative" action="" method="POST">
                    {{ csrf_field() }}
                    <input type="email" name="email" placeholder="Enter mail">
                    <button type="submit" value="Send" name="submit"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="body-overlay"></div>
