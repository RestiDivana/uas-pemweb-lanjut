@extends('website.layout')

@section('title')
    @if (!empty($kategori->name))
        {{ $kategori->name }}
    @else
        Blog
    @endif
    {{ @$about->title }}
@stop

@section('content')
    <main>
        <div class="postbox__area pt-200 pb-120 set-get">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-8">
                        <div class="postbox__wrapper pr-20">
                            @foreach ($article as $key => $result)
                                <article class="postbox__item format-image mb-50 transition-3">
                                    <div class="postbox__thumb w-img">
                                        <a href="{{ route('article.show', $result->slug) }}">
                                            <img src="{{ asset($result->image->lg) }}" alt="{{ $result->title }}"
                                                alt="{{ $result->title }}">
                                        </a>
                                    </div>
                                    <div class="postbox__content">
                                        <div class="postbox__meta">
                                            <span><a href="#"><i class="fal fa-user-circle"></i>
                                                    by {{ @$result->user_id != null ? @$result->user->name : 'admin' }}
                                                </a></span>
                                            <span><a href="{{ route('article.show', $result->slug) }}">
                                                <i class="fal fa-clock"></i>
                                                    {{ tgl_indo($result->published_at) }}
                                                </a></span>
                                            <span><a href="{{ route('article.category', $result->category->slug) }}">
                                                <i class="fal fa-tags"></i>
                                                    {{ @$result->category->name }}
                                                </a></span>
                                        </div>
                                        <h3 class="postbox__title space-480-er">
                                            <a
                                                href="{{ route('article.show', $result->slug) }}">{{ str_limit(strip_tags(@$result->title), 45, ' ...') }}</a>
                                        </h3>
                                        <div class="postbox__text">
                                            <p>{{ read_more($result->description, 120) }}</p>
                                        </div>
                                        <div class="post__button">
                                            <a class="tp-btn-white" href="{{ route('article.show', $result->slug) }}">
                                                READ MORE</a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach

                            {{-- <div class="basic-pagination">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="blog.html">
                                                <i class="far fa-angle-left"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog.html">
                                                <i class="far fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> --}}
                            <style>
                                .pagination .page-link {
                                    border-color: #1DB054;
                                    color: black;
                                    background-color: #e7faee;
                                }

                                .pagination .page-link:hover {
                                    background-color: #1DB054;
                                    border-color: #1DB054;
                                    color: white;
                                }

                                .pagination .page-item.active .page-link {
                                    background-color: #1DB054;
                                    border-color: #1DB054;
                                    color: white;
                                }
                            </style>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mt-30">
                                    {{ $article->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="sidebar__wrapper">
                            <div class="sidebar__widget mb-40">
                                <h3 class="sidebar__widget-title">Search Here</h3>
                                <div class="sidebar__widget-content">
                                    <div class="sidebar__search">
                                        <form action="{{ route('article.search') }}" method="GET">
                                            <div class="sidebar__search-input-2">
                                                <input type="search" name="cari" placeholder="Search ...">
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
                                            <li>
                                                <a href="{{ route('article.category', $categoryArticle->slug) }}">
                                                    {{ $categoryArticle->name }}
                                                    <span>
                                                        <i class="fal fa-angle-right"></i>
                                                    </span>
                                                </a>
                                            </li>
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
                                                    <a href="{{ route('article.show', $recentPost->slug) }}"><img
                                                            style="object-fit: cover"
                                                            src="{{ asset($recentPost->image->sm) }}" alt=""></a>
                                                </div>
                                                <div class="rc__post-content">
                                                    <div class="rc__meta">
                                                        <span>{{ tgl_indo($recentPost->published_at) }}</span>
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
