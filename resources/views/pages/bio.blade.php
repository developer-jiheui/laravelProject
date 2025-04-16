@extends('layouts.main')
@section('content')
    <article class="bio active" data-page="bio">

        <header>
            <h2 class="h2 article-title">About me</h2>
        </header>

        <section class="about-text">
            <p>
                ABOUT ME
            </p>
        </section>
    </article>
    {{--    @auth--}}
    {{--        <a href="{{ route('edit.home') }}" class="edit-page-button">--}}
    {{--            ✏️ Edit Home--}}
    {{--        </a>--}}
    {{--    @endauth--}}
    <a href="{{ route('edit.bio') }}" class="edit-page-button">
        ✏️ Edit Bio
    </a>
@endsection

