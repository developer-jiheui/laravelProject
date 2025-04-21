@extends('layouts.main')
@section('content')
<article class="blog-full active" data-page="blog">
        @php
            try {
                $blogItem = \App\Models\Blog::find($_GET['id']);
            }
            catch (Exception $e) {
                http_response_code(404);
                die();
            }
        @endphp

        <header>  
        <h2 class="h2 article-title">{{$blogItem['TITLE']}}</h2>
    <p class=filter-item>
    @auth
            @if(Auth::user()->USER_TYPE==0&&Auth::user()->USER_ID==$blogItem['USER_ID'])
            <div class=project-full-interact>
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
            @endif
        @endauth  
    </header>
        <img class=project-full-img alt src="{{asset($blogItem['IMAGE_URL'])}}"><!-- asset gets you the full url from partial url -->
        <p class=project-description>{{$blogItem['CONTENTS']}}</p>
        <h3>Comments</h3> {{-- semantically this should be an H2 and the page should start with an H1. --}}
        @auth
        <form method=post action="{{route('page.blog.comment')}}">
            @csrf
            <fieldset>
                <legend>Add a comment&hellip;</legend>
                <textarea name=content></textarea>
                <input type=hidden name=blog_id value="{{$_GET['id']}}">
                <button type=submit>Add comment</button>
            </fieldset>
        </form>
        @endauth
        @foreach(\App\Models\Comment::where('BLOG_ID','=',$_GET['id'])->get()->toArray() as $comment)
            @php
                $commenter = \App\Models\User::find($comment['USER_ID']);
            @endphp
        <section class=blog-comment>
            <h4><figure class=avatar-box><img alt src="{{asset($commenter['AVATAR']??'images/my-avatar.png')}}"></figure> {{$commenter['FIRST_NAME']}} {{$commenter['LAST_NAME']}} at <time>{{$comment['CREATED_AT']}}</time></h4>
                @auth
                @if(Auth::user()->USER_TYPE==0)
                <form action="{{route('page.blog.comment.delete', ['id' => $comment['COMMENT_ID']])}}" method=post>
                        @csrf
                        @method('delete')
                    <button class="icon-box">
                        <ion-icon name="trash-outline" role="img" class="md hydrated" aria-label="Delete"></ion-icon>
                    </button>
                    </form>
                @endif
                @if(Auth::user()->USER_ID=$commenter['USER_ID'])
                <details>
                    <summary class="icon-box">
                        <ion-icon name="pencil-outline" role="img" class="md hydrated" aria-label="Edit"></ion-icon>
                    </summary>
                    <form method=post action="{{route('page.blog.comment.update',['id'=>$comment['COMMENT_ID']])}}">
                        @csrf
                        @method('patch')
                        <fieldset>
                            <legend>Edit your comment&hellip;</legend>
                            <textarea name=content>{{$comment['CONTENTS']}}</textarea>
                            <button type=submit>Edit comment</button>
                        </fieldset>
                    </form>
                </details>
                @endif
                @endauth
            <p>{{$comment['CONTENTS']}}
        </section>
        @endforeach
    </article>
@endsection