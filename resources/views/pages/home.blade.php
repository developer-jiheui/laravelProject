@extends('layouts.main')
@section('content')
    <article class="home  active" data-page="home">

        <header>
            <!-- <h2 class="h2 article-title">About me</h2> -->
        </header>

        <section class="about-text">
        </section>

        <!--
          - service
        -->

        <section class="service">

            <h3 class="h3 service-title">Latest Blogs</h3>

            <ul class="service-list">
                @foreach(\App\Models\Blog::latest()->take(4)->get() as $blogItem)
                    <a class="service-item" href="{{ route('page.blogfull',['id'=>$blogItem['BLOG_ID']]) }}">
                        <div class="service-icon-box">
                            <img src="{{ asset($blogItem->IMAGE_URL ?? 'images/default-icon.svg') }}" alt="project icon" width="40">
                        </div>

                        <div class="service-content-box">
                            <h4 class="h4 service-item-title">{{ $blogItem->TITLE }}</h4>

                            <p class="service-item-text">
                                {{ \Illuminate\Support\Str::limit($blogItem->CONTENTS, 100) }}
                            </p>

                        </div>
                    </a>


                @endforeach

            </ul>

        </section>


        <!--
          - clients
        -->

        <section class="clients">

            <h3 class="h3 clients-title">Recent works</h3>

            <ul class="clients-list has-scrollbar">

                @foreach(\App\Models\Portfolio::latest()->take(6)->get() as $portfolio)

                            <a href="{{  route('page.portfoliofull',['id'=> $portfolio->PORTFOLIO_ID])}}">
                                <img src="{{ asset($portfolio->IMAGE_URL ?? 'images/default-blog.png') }}"
                                     style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                            </a>
                        </li>
                @endforeach
            </ul>

        </section>
{{--        <section class="clients">--}}

{{--            <h3 class="h3 clients-title">Clients</h3>--}}

{{--            <ul class="clients-list has-scrollbar">--}}

{{--                <li class="clients-item">--}}
{{--                    <a href="#">--}}
{{--                        <img src="./assets/images/logo-1-color.png" alt="client logo">--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="clients-item">--}}
{{--                    <a href="#">--}}
{{--                        <img src="./assets/images/logo-2-color.png" alt="client logo">--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="clients-item">--}}
{{--                    <a href="#">--}}
{{--                        <img src="./assets/images/logo-3-color.png" alt="client logo">--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="clients-item">--}}
{{--                    <a href="#">--}}
{{--                        <img src="./assets/images/logo-4-color.png" alt="client logo">--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="clients-item">--}}
{{--                    <a href="#">--}}
{{--                        <img src="./assets/images/logo-5-color.png" alt="client logo">--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="clients-item">--}}
{{--                    <a href="#">--}}
{{--                        <img src="./assets/images/logo-6-color.png" alt="client logo">--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--            </ul>--}}

{{--        </section>--}}
{{--        <section class="skill">--}}

{{--            <h3 class="h3 skills-title">My skills</h3>--}}

{{--            <ul class="skills-list content-card">--}}

{{--                <li class="skills-item">--}}
{{--                    <div class="title-wrapper">--}}
{{--                        <h5 class="h5">Web design</h5>--}}
{{--                        <data value="90">80%</data>--}}
{{--                    </div>--}}

{{--                    <div class="skill-progress-bg">--}}
{{--                        <div class="skill-progress-fill" style="width: 80%;"></div>--}}
{{--                    </div>--}}

{{--                </li>--}}

{{--                <li class="skills-item">--}}

{{--                    <div class="title-wrapper">--}}
{{--                        <h5 class="h5">Backend</h5>--}}
{{--                        <data value="70">70%</data>--}}
{{--                    </div>--}}

{{--                    <div class="skill-progress-bg">--}}
{{--                        <div class="skill-progress-fill" style="width: 70%;"></div>--}}
{{--                    </div>--}}

{{--                </li>--}}

{{--                <li class="skills-item">--}}



{{--                    <div class="title-wrapper">--}}
{{--                        <h5 class="h5">Project Management</h5>--}}
{{--                        <data value="80">90%</data>--}}
{{--                    </div>--}}

{{--                    <div class="skill-progress-bg">--}}
{{--                        <div class="skill-progress-fill" style="width: 90%;"></div>--}}
{{--                    </div>--}}


{{--                </li>--}}

{{--                <li class="skills-item">--}}

{{--                    <div class="title-wrapper">--}}
{{--                        <h5 class="h5">Frontend</h5>--}}
{{--                        <data value="50">50%</data>--}}
{{--                    </div>--}}

{{--                    <div class="skill-progress-bg">--}}
{{--                        <div class="skill-progress-fill" style="width: 50%;"></div>--}}
{{--                    </div>--}}

{{--                </li>--}}

{{--            </ul>--}}

{{--        </section>--}}


    </article>
@endsection
