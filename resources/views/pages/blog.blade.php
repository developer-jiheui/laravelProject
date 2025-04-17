@extends('layouts.main')
@section('content')
    <article class="blog active" data-page="blog">

        <header>
            <h2 class="h2 article-title">Blog</h2>
        </header>

        <section class="blog-posts">

            <ul class="blog-posts-list">
            @foreach (\App\Models\Blog::all()->toArray() as $blogItem)
                <li class="blog-post-item">
                    <a href="#">

                        <figure class="blog-banner-box">
                            <img src="./assets/images/blog-1.jpg" alt="{{ $blogItem['TITLE'] }}" loading="lazy">
                        </figure>

                        <div class="blog-content">

                            <div class="blog-meta">
                                <p class="blog-category">{{ $blogItem['TITLE'] }}</p>

                                <span class="dot"></span>

                                <time datetime="{{ $blogItem['CREATE_DT'] }}">{{ $blogItem['CREATE_DT'] }}</time>
                            </div>

                            <h3 class="h3 blog-item-title">{{ $blogItem['TITLE'] }}</h3>

                            <p class="blog-text">
                                {{ $blogItem['CONTENTS'] }}
                            </p>

                        </div>

                    </a>
                </li>
                @endforeach
            </ul>

        </section>

    </article>
    {{--    @auth--}}
    {{--        <a href="{{ route('edit.home') }}" class="edit-page-button">--}}
    {{--            ✏️ Edit Home--}}
    {{--        </a>--}}
    {{--    @endauth--}}
    <a href="{{ route('edit.blog') }}" class="edit-page-button">
        ✏️ Edit blog
    </a>
@endsection

