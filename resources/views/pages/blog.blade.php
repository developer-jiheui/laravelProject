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
                    <a href="{{ route('page.blogfull',['id'=>$blogItem['BLOG_ID']]) }}">
                        <figure class="blog-banner-box">
                            <img src="{{ asset($blogItem['IMAGE_URL']) }}" alt="" loading="lazy"><!-- /storage/portfolioImgs/1XBC4MScNJCaJWpg8w7SWALDvkV4gxmbDyEZUeR6.jpg | asset($blogItem['IMAGE_URL']) -->
                        </figure>

                        <div class="blog-content">

                            <div class="blog-meta">
                                <p class="blog-category">{{ $blogItem['TITLE'] }}</p>

                                <span class="dot"></span>

                                <time>{{ $blogItem['CREATED_AT'] }}</time>
                            </div>

                            <h3 class="h3 blog-item-title">{{ $blogItem['TITLE'] }}</h3>

                            <p class="blog-text">
                                {{ $blogItem['CONTENTS'] }}
                            </p>
                        </div>
                    </a>
                    {{--@if(Auth::user()->user_type!=0||Auth::user()->id!=$blogItem['USER_ID'])
                    <!-- <button class="icon-box project-interact">
                        <ion-icon name="thumbs-up-outline" role="img" class="md hydrated" aria-label="Like"></ion-icon>
                    </button> -->
                    @else--}}
                    <div class=project-interact>
                    <a class="icon-box" href="{{route('edit.blog', ['id' => $blogItem['BLOG_ID']])}}">
                        <ion-icon name="pencil-outline" role="img" class="md hydrated" aria-label="Edit"></ion-icon>
                    </a>
                    <form action="{{route('edit.blog.delete', ['id' => $blogItem['BLOG_ID']])}}" method=post>
                        @csrf
                        @method('delete')
                    <button class="icon-box">
                        <ion-icon name="trash-outline" role="img" class="md hydrated" aria-label="Delete"></ion-icon>
                    </button>
                    </form>
                    </div>
                    {{--@endif--}}
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
    {{--@if(Auth::user()->user_type==0)--}}
    <a href="{{ route('edit.blog') }}" class="edit-page-button">
    <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="Add"></ion-icon> New Blog Item
    </a>
    {{--@endif--}}
    <!-- <a href="{{ route('edit.blog') }}" class="edit-page-button">
        ✏️ Edit blog
    </a> -->
@endsection

