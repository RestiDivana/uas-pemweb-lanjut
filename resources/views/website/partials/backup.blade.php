{{-- articlee --}}
<main>
    @extends('website.layout')

    @section('title')
        @if (!empty($kategori->name))
            {{ $kategori->name }}
        @else
            Blog
        @endif
        - {{ @$about->title }}
    @stop

    @section('styles')
        <style type="text/css">
            .bulet {
                border-radius: 5%;
            }

            @media (min-width: 768px) {
                .img-cover {
                    object-fit: cover;
                    height: 250px;
                }
            }
        </style>
    @stop
    @section('content')

        <section class="blog white-bg page-section-ptb">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="section-title text-center">
                            <h6>{{ @$about->title }}</h6>
                            <h2 class="title-effect">Blog</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 sm-mb-30">
                        <div class="sidebar-widget">
                            <h6 class="mb-20">Cari</h6>
                            <div class="widget-search">
                                <form action="{{ route('article.search') }}" method="get">
                                    <a type="submit" href="#"> <i class="fa fa-search"></i></a>
                                    <input type="search" name="cari" class="form-control"
                                        placeholder="Cari disini...." />
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h6 class="mt-40 mb-20">Blog Terbaru </h6>
                            @foreach ($recentPosts as $recentPost)
                                <div class="recent-post clearfix">
                                    <div class="recent-post-image">
                                        <img class="img-fluid" src="{{ asset($recentPost->image->sm) }}" alt="">
                                    </div>
                                    <div class="recent-post-info">
                                        <a
                                            href="{{ route('article.show', $recentPost->slug) }}">{{ $recentPost->title }}</a>
                                        <span><i class="fa fa-calendar-o"></i>
                                            {{ $recentPost->created_at->format('d F Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="sidebar-widget clearfix">
                            <h6 class="mt-40 mb-20">Kategori</h6>
                            <ul class="widget-categories">
                                @foreach ($categoryArticles as $categoryArticle)
                                    <li><a href="{{ route('article.index', $categoryArticle->slug) }}"><i
                                                class="fa fa-angle-double-right"></i> {{ $categoryArticle->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- ========================== -->
                    <div class="col-lg-9">
                        {{-- tampilan blog --}}
                        <div class="row">
                            @if ($article->isEmpty())
                                <div class="col-lg-12 col-md-12">
                                    <h3 class="text-center">We are sorry, but its empty</h3>
                                </div>
                            @endif
                            @foreach ($article as $key => $result)
                                <div class="col-lg-6 col-md-6">
                                    <div class="blog-entry mb-50">
                                        <div class="entry-image clearfix">
                                            <img class="img-fluid img-cover bulet" src="{{ asset($result->image->sm) }}"
                                                alt="{{ $result->title }}">
                                        </div>
                                        <div class="blog-detail">
                                            <div class="entry-title mb-10">
                                                <a
                                                    href="{{ route('article.show', $result->slug) }}">{{ str_limit(strip_tags(@$result->title), 45, ' ...') }}</a>
                                            </div>
                                            <div class="entry-meta mb-10">
                                                <ul>
                                                    <li><a href="javascript:void(0);"><i class="fa fa-calendar-o"></i>
                                                            @if ($result->published_at != null)
                                                                {{ $result->published_at->toDateTimeString() }}
                                                            @else
                                                                {{ $result->created_at->toDateTimeString() }}
                                                            @endif
                                                        </a></li>
                                                    <li><i class="fa fa-folder-open-o"></i> <a
                                                            href="{{ route('article.index', $result->category->slug) }}">
                                                            {{ $result->category->name }} </a> </li>
                                                </ul>
                                            </div>
                                            <div class="entry-content">
                                                <p>{{ str_limit(strip_tags($result->description), 120, ' ...') }}</p>
                                            </div>
                                            <div class="entry-share clearfix">
                                                <div class="entry-button">
                                                    <a class="button arrow"
                                                        href="{{ route('article.show', $result->slug) }}">Selengkapnya<i
                                                            class="fa fa-angle-right" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mt-30">
                                {{ $article->links('vendor.pagination.frontend') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @stop
</main>
{{-- end article --}}



{{-- show article --}}
<main>
    @extends('website.layout')
    @section('title')
        {{ @$model->title }}
    @stop

    @section('meta')
        <meta name="keywords" content="{{ @$model->category->name }}" />
        <meta name="description" content="{!! $model->description !!}" />
        <meta name="author" content="{{ @$model->user->name }}" />
        <meta property="og:image" content="{{ asset($model->image->lg) }}">
    @stop

    @section('styles')
        <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
        <link type="text/css" rel="stylesheet"
            href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
    @stop

    @section('scripts')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>

        <script>
            $("#share").jsSocials({
                showLabel: false,
                showCount: false,
                shares: ["twitter", "facebook", "pinterest"]
            });
        </script>
    @stop

    @section('content')

        <section class="blog white-bg page-section-ptb">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="section-title text-center">
                            <h6>{{ @$about->title }}</h6>
                            <h2 class="title-effect">Blog</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 sm-mb-30">
                        <div class="sidebar-widget">
                            <h6 class="mb-20">Search</h6>
                            <div class="widget-search">
                                <form action="{{ route('article.search') }}" method="get">
                                    <i class="fa fa-search"></i>
                                    <input type="search" name="slug" class="form-control" placeholder="Search...." />
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h6 class="mt-40 mb-20">Recent Posts </h6>
                            @foreach ($recentPosts as $recentPost)
                                <div class="recent-post clearfix">
                                    <div class="recent-post-image">
                                        <img class="img-fluid" src="{{ asset($recentPost->image->sm) }}"
                                            alt="{{ $recentPost->title }}" title="{{ $recentPost->title }}">
                                    </div>
                                    <div class="recent-post-info">
                                        <a
                                            href="{{ route('article.show', $recentPost->slug) }}">{{ $recentPost->title }}</a>
                                        <span><i class="fa fa-calendar-o"></i>
                                            {{ $recentPost->created_at->format('d F Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="sidebar-widget clearfix">
                            <h6 class="mt-40 mb-20">Category</h6>
                            <ul class="widget-categories">
                                @foreach ($categoryArticles as $categoryArticle)
                                    <li><a href="{{ route('article.index', $categoryArticle->slug) }}"><i
                                                class="fa fa-angle-double-right"></i> {{ $categoryArticle->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- ========================== -->
                    <div class="col-lg-9">
                        <div class="blog-entry mb-50">
                            <div class="entry-image clearfix">
                                <img class="img-fluid" src="{{ asset($model->image->lg) }}" alt="{{ $model->title }}"
                                    title="{{ $model->title }}">
                            </div>
                            <div class="blog-detail">
                                <div class="entry-title mb-10">
                                    <a href="javascript:void(0);">{{ $model->title }}</a>
                                </div>
                                <div class="entry-meta mb-10">
                                    <ul>
                                        <li><i class="fa fa-folder-open-o"></i> <a
                                                href="{{ route('article.index', $model->category->slug) }}">
                                                {{ $model->category->name }} </a> </li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-user-o"></i> by
                                                {{ @$model->user_id != null ? @$model->user->name : 'admin' }}</a></li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-calendar-o"></i>
                                                {{ $model->published_at->format('l, d F Y H:i') }}</a></li>
                                    </ul>
                                </div>
                                <div class="entry-content text-justify">
                                    {!! $model->description !!}
                                </div>
                                <div class="entry-share clearfix">
                                    <div class="social list-style-none float-right">
                                        <strong>Share to your friends </strong>
                                        <div id="share"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @stop
</main>
{{-- end --}}


{{-- service  --}}
@extends('website.layout')

@section('title')
    Layanan Kami | {{ @$about->title }}
@stop

@section('content')

    <section class="service white-bg page-section-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h6>{{ @$about->title }}</h6>
                        <h2 class="title-effect">Layanan Kami</h2>
                        <p>Kami memberikan pelayanan terbaik yang bisa kami lakukan!</p>
                    </div>
                </div>
            </div>
            <!-- =========================================== -->
            <div class="row">
                @foreach ($service as $result)
                    <div class="col-lg-4 col-md-4 mb-30">
                        <div class="feature-text box-shadow h-100 text-center">
                            <div class="feature-icon">
                                <img src="{{ asset(@$result->image->sm) }}" width="40" class="theme-color mb-20">
                            </div>
                            <div class="feature-info">
                                <h4 class="pb-10">{{ $result->title }}</h4>
                                <p>{{ $result->description_short }} </p>
                                <a class="button icon-color mt-20" href="{{ route('service.show', $result->slug) }}">Read
                                    more <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--=================================
                service-->
    <section class="action-box theme-bg full-width">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h3> Ingin Tau Lebih Banyak Tentang Kami ?</h3>
                    <p>15 Tahun Pengalaman perusahaan kami dari nasional hingga internasional</p>
                    <a class="button white" href="{{ asset(@$setting->firstWhere('key', 'file')->value) }}"
                        target="_blank">
                        <span>Download Company Profile</span>
                        <i class="fa fa-download"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@stop
{{-- end --}}

{{-- about home --}}
<div class="tp-chose-area pt-190 pb-130 p-relative">
    <div class="bp-chose-1 d-none d-lg-block">
        <img src="{{ asset('static/website/img/chose/bp-chose-5.1.png') }}" alt="">
    </div>
    <div class="bp-chose-2 d-none d-lg-block">
        <img src="{{ asset('static/website/img/chose/bp-chose-5.2.png') }}" alt="">
    </div>
    <div class="bp-chose-3 d-none d-lg-block">
        <img src="{{ asset('static/website/img/chose/bp-chose-5.3.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-12">
                <div class="tpchosebox-main p-relative">
                    <div class="tp-chose-bg">
                        <img src="{{ asset('static/website/img/feature/fea-2.png') }}" alt="">
                    </div>
                    <div class="row gx-40 align-items-center tp-chose-space">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 wow tpfadeLeft" data-wow-duration=".3s"
                            data-wow-delay=".5s">
                            <div class="tp-chose-item mb-40">
                                <div class="tpchosebox">
                                    <div class="tpchosebox__icon fea-color-4 mb-30">
                                        <a href="{{ route('about.index') }}#about_image_0">
                                            @if (isset($about_image[0]))
                                                <img class="sizing-about"
                                                    src="{{ asset(@$about_image[0]->image->sm) }}" alt="">
                                            @endif

                                        </a>
                                    </div>
                                    <div class="tpchosebox__content">
                                        <h4>
                                            @if (isset($about_image[0]))
                                                <a
                                                    href="{{ route('about.index') }}#about_image_0">{{ $about_image[0]->title }}</a>
                                            @endif
                                        </h4>
                                        @if (isset($about_image[0]))
                                            @php
                                                $img0 = $about_image[0]->description;
                                                $limit = 30;
                                                if (strlen($img0) > $limit) {
                                                    $img0 = substr($img0, 0, $limit) . '..<a style="color: rgb(51, 51, 238); font-size: 14px;" href="' . route('about.index') . '#about_image_0">selengkapnya</a>';
                                                }
                                            @endphp
                                            <a href="{{ route('about.index') }}#about_image_0">
                                                <p>{!! $img0 !!}</p>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="tp-chose-item">
                                <div class="tpchosebox tpchosebox-two mb-40 wow tpfadeIn" data-wow-duration=".5s"
                                    data-wow-delay=".7s">
                                    <div class="tpchosebox__icon fea-color-5 mb-30">
                                        <a href="{{ route('about.index') }}#about_image_1">
                                            @if (isset($about_image[1]))
                                                <img class="sizing-about"
                                                    src="{{ asset(@$about_image[1]->image->sm) }}" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="tpchosebox__content">
                                        <h4>
                                            @if (isset($about_image[1]))
                                                <a
                                                    href="{{ route('about.index') }}#about_image_1">{{ $about_image[1]->title }}</a>
                                            @endif
                                        </h4>
                                        @if (isset($about_image[1]))
                                            @php
                                                $img1 = $about_image[1]->description;
                                                $limit = 30;
                                                if (strlen($img1) > $limit) {
                                                    $img1 = substr($img1, 0, $limit) . '..<a style="color: rgb(51, 51, 238); font-size: 14px;" href="' . route('about.index') . '#about_image_1">selengkapnya</a>';
                                                }
                                            @endphp
                                            <a href="{{ route('about.index') }}#about_image_1">
                                                <p>{!! $img1 !!}</p>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="tpchosebox tpchosebox-three wow tpfadeUp" data-wow-duration=".5s"
                                    data-wow-delay=".7s">
                                    <div class="tpchosebox__icon  mb-30">
                                        <a href="{{ route('about.index') }}#about_image_2">
                                            @if (isset($about_image[2]))
                                                <img class="sizing-about"
                                                    src="{{ asset(@$about_image[2]->image->sm) }}" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="tpchosebox__content">
                                        <h4>
                                            @if (isset($about_image[2]))
                                                <a
                                                    href="{{ route('about.index') }}#about_image_2">{{ $about_image[2]->title }}</a>
                                            @endif
                                        </h4>
                                        @if (isset($about_image[2]))
                                            @php
                                                $img2 = $about_image[2]->description;
                                                $limit = 30;
                                                if (strlen($img2) > $limit) {
                                                    $img2 = substr($img2, 0, $limit) . '..<a style="color: rgb(51, 51, 238); font-size: 14px;" href="' . route('about.index') . '#about_image_2">selengkapnya</a>';
                                                }
                                            @endphp
                                            <a href="{{ route('about.index') }}#about_image_2">
                                                <p>{!! $img2 !!}</p>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 col-md-10 col-12 wow tpfadeRight" data-wow-duration=".5s"
                data-wow-delay=".9s">
                <div class="tp-feature-section-title-box">
                    <h5 class="tp-subtitle pb-10 tp-section-highlight">Tentang AKBAR INDONESIA
                        <svg width="247" height="10" viewBox="0 0 247 12" fill=""
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M-0.000488281 0L247 12H-0.000488281V0Z" fill="#18984F" />
                        </svg>
                    </h5>
                    @if (isset($about_text[0]))
                        <h2 class="tp-title tp-title-sm">
                            {{ $about_text[0]->title }}
                        </h2>
                    @endif

                    @if (isset($about_text[0]))
                        @php
                            $content = $about_text[0]->description;
                            $limit = 255;
                            if (strlen($content) > $limit) {
                                $content = substr($content, 0, $limit) . '... <a style="color: rgb(51, 51, 238); font-size: 14px;" href="' . route('about.index') . '">selengkapnya</a>';
                            }
                        @endphp
                        <p class="pb-25">
                            {!! $content !!}
                        </p>
                    @endif
                    <div class="tp-fea-button-five">
                        <a class="tp-btn-white" href="{{ route('about.index') }}">Tentang Akbar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end --}}

{{-- backup about page  --}}
<div class="ac-about-content-area pt-80">
    <div class="container">
        <div id="about_image_0" class="row ac-testimonial-space">
            <div class="ac-border-bottom ac-bottom-space">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 wow tpfadeLeft" data-wow-duration=".3s" data-wow-delay=".5s">
                        <div class="ac-about-left">
                            @if (isset($about_image[0]))
                                <h3 class="ac-ab-title"><a href="#">{{ $about_image[0]->title }}</a></h3>
                            @endif
                        </div>
                    </div>
                    <div class=" col-xl- col-lg-6 tpchosebox__icon fea-color-4 mb-30">
                        @if (isset($about_image[0]))
                            <a href="#"><img class="sizing-about"
                                    src="{{ asset(@$about_image[0]->image->sm) }}" alt=""></a>
                        @endif
                    </div>
                </div>
                <div class=" wow tpfadeRight" data-wow-duration=".5s" data-wow-delay=".7s">
                    <div class="ac-about-right">
                        @if (isset($about_image[0]))
                            <p class="pb-25">{{ $about_image[0]->description }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div id="about_image_1" class="row ac-testimonial-space">
            <div class="ac-border-bottom ac-bottom-space">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 wow tpfadeLeft" data-wow-duration=".3s" data-wow-delay=".5s">
                        <div class="ac-about-left">
                            @if (isset($about_image[1]))
                                <h3 class="ac-ab-title"><a href="#">{{ $about_image[1]->title }}</a></h3>
                            @endif
                        </div>
                    </div>
                    <div class=" col-xl- col-lg-6 tpchosebox__icon fea-color-4 mb-30">
                        @if (isset($about_image[1]))
                            <a href="#"><img class="sizing-about"
                                    src="{{ asset(@$about_image[1]->image->sm) }}" alt=""></a>
                        @endif
                    </div>
                </div>
                <div class=" wow tpfadeRight" data-wow-duration=".5s" data-wow-delay=".7s">
                    <div class="ac-about-right">
                        @if (isset($about_image[1]))
                            <p class="pb-25">{{ $about_image[1]->description }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div id="about_image_2" class="row ac-testimonial-space">
            <div class="ac-border-bottom ac-bottom-space">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 wow tpfadeLeft" data-wow-duration=".3s" data-wow-delay=".5s">
                        <div class="ac-about-left">
                            @if (isset($about_image[2]))
                                <h3 class="ac-ab-title"><a href="#">{{ $about_image[2]->title }}</a></h3>
                            @endif
                        </div>
                    </div>
                    <div class=" col-xl- col-lg-6 tpchosebox__icon fea-color-4 mb-30">
                        @if (isset($about_image[1]))
                            <a href="#"><img class="sizing-about"
                                    src="{{ asset(@$about_image[2]->image->sm) }}" alt=""></a>
                        @endif
                    </div>
                </div>
                <div class=" wow tpfadeRight" data-wow-duration=".5s" data-wow-delay=".7s">
                    <div class="ac-about-right">
                        @if (isset($about_image[2]))
                            <p class="pb-25">{{ $about_image[2]->description }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end --}}




{{-- backup card habisni --}}
<div class="col-xl-6 col-lg-6 col-md-6 col-12 wow tpfadeLeft" data-wow-duration=".3s" data-wow-delay=".5s">
    <div class="tp-chose-item mb-40">
        <div class="tpchosebox">
            <div class="tpchosebox__icon fea-color-4 mb-30">
                <a href="{{ route('about.index') }}#about_image_0">
                    @if (isset($about_image[0]))
                        <img class="sizing-about" src="{{ asset(@$about_image[0]->image->sm) }}" alt="">
                    @endif

                </a>
            </div>
            <div class="tpchosebox__content">
                <h4>
                    @if (isset($about_image[0]))
                        <a href="{{ route('about.index') }}#about_image_0">{{ $about_image[0]->title }}</a>
                    @endif
                </h4>
                @if (isset($about_image[0]))
                    @php
                        $img0 = $about_image[0]->description;
                        $limit = 30;
                        if (strlen($img0) > $limit) {
                            $img0 = substr($img0, 0, $limit) . '..<a style="color: rgb(51, 51, 238); font-size: 14px;" href="' . route('about.index') . '#about_image_0">selengkapnya</a>';
                        }
                    @endphp
                    <a href="{{ route('about.index') }}#about_image_0">
                        <p>{!! $img0 !!}</p>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- end --}}
