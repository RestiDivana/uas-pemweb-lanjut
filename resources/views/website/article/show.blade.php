@extends('website.layout')
@section('title')
    {{ @$model->title }}
@stop

@section('meta')
    <meta name="keywords" content="{{ @$model->category->name }}" />
    {{-- <meta name="description" content="{!! $model->description !!}" /> --}}
    <meta name="author" content="{{ @$model->user->name }}" />
    <meta property="og:image" content="{{ asset($model->image->lg) }}">
@stop

@section('styles')
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
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
    <main>
        <div class="postbox__area pt-200 pb-120 set-get">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-12">
                        <div class="postbox__wrapper">
                            <article class="postbox__item format-image transition-3">
                                <div class="postbox__content">
                                    <p><img class="w-100" style="border-radius: 25px" src="{{ asset($model->image->lg) }}" alt="{{ $model->title }}"
                                            title="{{ $model->title }}"></p>
                                    <div class="postbox__meta">
                                        <span>
                                            <a href="#"><i class="fal fa-user-circle"></i>
                                                by {{ @$model->user_id != null ? @$model->user->name : 'admin' }}
                                            </a>
                                        </span>
                                        <span><a href="javascript:void(0)"><i class="fal fa-clock"></i>
                                                {{ tgl_indo($model->published_at) }}
                                            </a></span>
                                        <span><a href="{{ route('article.category', $model->category->slug) }}"><i class="fal fa-tags"></i>
                                                {{ $model->category->name }}</a></span>
                                    </div>
                                    <h3 class="postbox__title space-480-er">
                                        {{ $model->title }}
                                    </h3>
                                    <div class="postbox__text">
                                        <p>{!! $model->description !!}</p>
                                    </div>
                                    <div class="postbox__social-wrapper">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12">
                                                {{-- <div class="postbox__tag tagcloud">
                                                    <span>Tag</span>
                                                    <a href="blog-details.html">Business</a>
                                                    <a href="blog-details.html">data</a>
                                                </div> --}}
                                            </div>
                                            {{-- <div class="col-xl-6 col-lg-12">
                                                <div class="postbox__social text-xl-end text-start">
                                                    <span>Share</span>
                                                    <a href="blog-details.html"><i
                                                            class="fab fa-linkedin tp-linkedin"></i></a>
                                                    <a href="blog-details.html"><i
                                                            class="fab fa-pinterest tp-pinterest"></i></a>
                                                    <a href="blog-details.html"><i
                                                            class="fab fa-facebook tp-facebook"></i></a>
                                                    <a href="blog-details.html"><i
                                                            class="fab fa-twitter tp-twitter"></i></a>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="sidebar__wrapper">
                            <div class="sidebar__widget mb-40">
                                <h3 class="sidebar__widget-title">Search Here</h3>
                                <div class="sidebar__widget-content">
                                    <div class="sidebar__search">
                                        <form action="{{ route('article.search') }}" method="get">
                                            <div class="sidebar__search-input-2">
                                                <input type="search" name="slug" placeholder="Search ...">
                                                <button type="submit"><i class="far fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__widget mb-40">
                                <h3 class="sidebar__widget-title">Categories</h3>
                                <div class="sidebar__widget-content">
                                    <ul>
                                        @foreach ($categoryArticles as $categoryArticle)
                                            <li><a href="{{ route('.index', $categoryArticle->slug) }}">{{ $categoryArticle->name }}<span><i
                                                            class="fal fa-angle-right"></i></span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar__widget mb-40">
                                <h3 class="sidebar__widget-title">Recent Post</h3>
                                <div class="sidebar__widget-content">
                                    <div class="sidebar__post rc__post">
                                        @foreach ($recentPosts as $recentPost)
                                            <div class="rc__post mb-20 d-flex align-items-center">
                                                <div class="rc__post-thumb mr-20">
                                                    <a href="{{ route('article.show', $recentPost->slug) }}"><img style="object-fit: cover"
                                                            src="{{ asset($recentPost->image->lg) }}"
                                                            alt="{{ $recentPost->title }}"
                                                            title="{{ $recentPost->title }}"></a>
                                                </div>
                                                <div class="rc__post-content">
                                                    <div class="rc__meta">
                                                        <span> {{ tgl_indo($recentPost->published_at) }}</span>
                                                    </div>
                                                    <h3 class="rc__post-title">
                                                        <a href="{{ route('article.show', $recentPost->slug) }}">{{ $recentPost->title }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="sidebar__widget mb-40">
                                <h3 class="sidebar__widget-title">Tags</h3>
                                <div class="sidebar__widget-content">
                                    <div class="tagcloud">
                                        <a href="blog.html">landing</a>
                                        <a href="blog.html">Charity</a>
                                        <a href="blog.html">apps</a>
                                        <a href="blog.html">Education </a>
                                        <a href="blog.html">data</a>
                                        <a href="blog.html">book</a>
                                        <a href="blog.html">Design</a>
                                        <a href="blog.html">website</a>
                                        <a href="blog.html">landing page</a>
                                        <a href="blog.html">data</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@stop
