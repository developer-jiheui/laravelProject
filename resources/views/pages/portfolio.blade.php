@extends('layouts.footer')
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

                    <div class="select-value" data-selecct-value>Select category</div>

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

                            <img src="{{$item['IMAGE_URL']}}" alt loading="lazy">
                        </figure>

                        <h3 class="project-title">{{$item['TITLE']}}</h3>

                        <p class="project-category">{{$item['CATEGORY']}}</p>
                    </a>
                </li> <!-- TODO likes -->
                @endforeach


            </ul>

        </section>

    </article>
    {{--    @auth--}}
    {{--        <a href="{{ route('edit.home') }}" class="edit-page-button">--}}
    {{--            ✏️ Edit Home--}}
    {{--        </a>--}}
    {{--    @endauth--}}
    <a href="{{ route('edit.portfolio') }}" class="edit-page-button">
        ✏️ Edit Portfolio
    </a>
@endsection
@extends('layouts.header')
