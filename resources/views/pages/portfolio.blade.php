@extends('layouts.main')
@section('content')
    <article class="portfolio active" data-page="portfolio">
        <header>
            <h2 class="h2 article-title">Portfolio</h2>
        </header>

        <section class="projects">
            <ul class="filter-list">

                <li class="filter-item">
                    <a href="{{route('page.portfolio')}}" class="{{isset($_GET['cat'])?'':'active'}}">All</a>
                </li>
                @foreach (\App\Models\Portfolio::categories() as $category)
                <li class="filter-item">
                    <a href="{{route('page.portfolio',['cat'=>$category])}}" class="{{($_GET['cat']??'')==$category?'active':''}}">{{$category}}</a>
                </li>
                @endforeach

            </ul>

            <ul class="project-list">
                @foreach (\App\Models\Portfolio::all()->toArray() as $item)
                @if(!isset($_GET['cat'])||$_GET['cat']==$item['CATEGORY'])
                <li class="project-item">
                    <a href="{{route('page.portfoliofull',['id'=>$item['PORTFOLIO_ID']])}}">
                         <figure class="project-img">
                            <div class="project-item-icon-box">
                                <button select-project><ion-icon name="eye-outline"></ion-icon></button>
                            </div>

                            <img src="{{asset($item['IMAGE_URL']?? 'images/default-blog.jpeg')}}" alt loading="lazy">
                        </figure>

                        <h3 class="project-title">{{$item['TITLE']}}</h3>

                        <p class="project-category">{{$item['CATEGORY']}}</p>
                    </a>
                    @auth
                    @if(Auth::user()->USER_TYPE!=0||Auth::user()->USER_ID!=$item['USER_ID'])
                    <form action="{{route('page.portfolio.like',['id'=>$item['PORTFOLIO_ID'],'cat'=>$_GET['cat']??null])}}" method=post class=project-interact>
                        @csrf
                    <button class="icon-box">
                        <ion-icon {{\Illuminate\Support\Facades\DB::scalar('SELECT COUNT(*) FROM likes WHERE portfolio_id = ? AND user_id=? LIMIT 1',[$item['PORTFOLIO_ID'],Auth::user()->USER_ID])?'name=thumbs-up aria-label=Liked':'name=thumbs-up-outline aria-label=Like'}} role="img" class="md hydrated"></ion-icon>
                        {{$item['LIKE_COUNT']>0?$item['LIKE_COUNT']:""}}
                    </button>
                    </form>
                    @else
                    <div class=project-interact>
                    <a class="icon-box" href="{{route('edit.portfolio', ['id' => $item['PORTFOLIO_ID']])}}">
                        <ion-icon name="pencil-outline" role="img" class="md hydrated" aria-label="Edit"></ion-icon>
                    </a>
                    <form action="{{route('edit.portfolio.delete', ['id' => $item['PORTFOLIO_ID']])}}" method=post>
                        @csrf
                        @method('delete')
                    <button class="icon-box">
                        <ion-icon name="trash-outline" role="img" class="md hydrated" aria-label="Delete"></ion-icon>
                    </button>
                    </form>
                    </div>
                    @endif
                    @endauth
                </li>
                @endif
                @endforeach


            </ul>

        </section>

    </article>
    @auth
    @if(Auth::user()->USER_TYPE==0)
    <a href="{{ route('edit.portfolio') }}" class="edit-page-button">
    <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="Add"></ion-icon> New Portfolio Item
    </a>
    @endif
    @endauth
@endsection
