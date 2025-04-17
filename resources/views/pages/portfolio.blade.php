@extends('layouts.main')
@section('content')
    <article class="portfolio active" data-page="portfolio">

        <header>
            <h2 class="h2 article-title">Portfolio</h2>
        </header>

        <section class="projects">
            <ul class="filter-list">

                <li class="filter-item">
                    <button class="active" data-filter-btn>All</button>
                </li>
                @foreach (\App\Models\Portfolio::categories() as $category)
                <li class="filter-item">
                    <button data-filter-btn>{{$category}}</button>
                </li>
                @endforeach

            </ul>

            <div class="filter-select-box">

                <button class="filter-select" data-select>

                    <div class="select-value" data-select-value>Select category</div>

                    <div class="select-icon">
                        <ion-icon name="chevron-down"></ion-icon>
                    </div>

                </button>

                <ul class="select-list">

                    <li class="select-item">
                        <button data-select-item>All</button>
                    </li>

                    @foreach (\App\Models\Portfolio::categories() as $category)
                <li class="select-item">
                    <button data-select-item>{{$category}}</button>
                </li>
                @endforeach

                </ul>

            </div>

            <!--  TODO MAKE THE PROJECT PART LIKE A BLOG POST-->

            <ul class="project-list">
                @foreach (\App\Models\Portfolio::all()->toArray() as $item)
                <li class="project-item active" data-filter-item data-category="{{$item['CATEGORY']}}">
                    <a href=#> <!-- TODO MAKE THE LINK DO SOMETHING -->
                         <figure class="project-img">
                            <div class="project-item-icon-box">
                                <button select-project><ion-icon name="eye-outline"></ion-icon></button>
                            </div>

                            <img src="{{asset($item['IMAGE_URL'])}}" alt loading="lazy">
                        </figure>

                        <h3 class="project-title">{{$item['TITLE']}}</h3>

                        <p class="project-category">{{$item['CATEGORY']}}</p>
                    </a>
                    @auth
                    @if(Auth::user()->USER_TYPE!=0||Auth::user()->USER_ID!=$item['USER_ID'])
                    <form action="{{route('pages.portfolio.like',['id'=>$item['PORTFOLIO_ID']])}}" method=post class=project-interact>
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
