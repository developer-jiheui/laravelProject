@extends('layouts.header')
@extends('layouts.main')
@section('content')
    <article class="resume active" data-page="resume">

        <header>
            <h2 class="h2 article-title">Resume</h2>
        </header>

        <section class="timeline">

            <div class="title-wrapper">
                <div class="icon-box">
                    <ion-icon name="book-outline"></ion-icon>
                </div>

                <h3 class="h3">Education</h3>
            </div>

            <ol class="timeline-list">

                <li class="timeline-item">

                    <!-- <div class="service-icon-box">
                        <img src="./assets/images/icon-app.svg" alt="mobile app icon" width="40">
                      </div> -->
                    <h4 class="h4 timeline-item-title">학교3</h4>

                    <span>2018 — 2022</span>

                    <p class="timeline-text">
                        무슨과
                    </p>

                </li>

                <li class="timeline-item">

                    <h4 class="h4 timeline-item-title">학교2</h4>

                    <span>2016-2018</span>

                    <p class="timeline-text">
                        Majored in fine art
                    </p>

                </li>

                <li class="timeline-item">


                    <h4 class="h4 timeline-item-title">학교1</h4>

                    <span>2012 - 2016</span>

                    <p class="timeline-text">
                        전공쓰
                    </p>

                </li>

            </ol>

        </section>

        <section class="timeline">

            <div class="title-wrapper">
                <div class="icon-box">
                    <ion-icon name="book-outline"></ion-icon>
                </div>

                <h3 class="h3">Experience</h3>
            </div>

            <ol class="timeline-list">

                <li class="timeline-item">

                    <h4 class="h4 timeline-item-title">직장명</h4>

                    <span>2019 — 2022</span>

                    <p class="timeline-text">
                        이런이런 일을 햇슴다
                    </p>

                </li>

                <li class="timeline-item">

                    <h4 class="h4 timeline-item-title">직장명</h4>

                    <span>2017- 2018</span>

                    <p class="timeline-text">
                        이런이런 일을 햇슴다
                    </p>

                </li>

                <li class="timeline-item">

                    <h4 class="h4 timeline-item-title">직장명</h4>

                    <span>2016-2017</span>

                    <p class="timeline-text">
                        이런이런 일을 햇슴다
                    </p>

                </li>


                <li class="timeline-item">

                    <h4 class="h4 timeline-item-title">직장명</h4>

                    <span>2014 — 2015</span>

                    <p class="timeline-text">
                        이런이런 일을 햇슴다

                    </p>

                </li>

            </ol>

        </section>

        <section class="skill">

            <h3 class="h3 skills-title">My skills</h3>

            <ul class="skills-list content-card">

                <li class="skills-item">
                    <div class="title-wrapper">
                        <h5 class="h5">Web design</h5>
                        <data value="90">80%</data>
                    </div>

                    <div class="skill-progress-bg">
                        <div class="skill-progress-fill" style="width: 80%;"></div>
                    </div>

                </li>

                <li class="skills-item">

                    <div class="title-wrapper">
                        <h5 class="h5">Backend</h5>
                        <data value="70">70%</data>
                    </div>

                    <div class="skill-progress-bg">
                        <div class="skill-progress-fill" style="width: 70%;"></div>
                    </div>

                </li>

                <li class="skills-item">



                    <div class="title-wrapper">
                        <h5 class="h5">Project Management</h5>
                        <data value="80">90%</data>
                    </div>

                    <div class="skill-progress-bg">
                        <div class="skill-progress-fill" style="width: 90%;"></div>
                    </div>


                </li>

                <li class="skills-item">

                    <div class="title-wrapper">
                        <h5 class="h5">Frontend</h5>
                        <data value="50">50%</data>
                    </div>

                    <div class="skill-progress-bg">
                        <div class="skill-progress-fill" style="width: 50%;"></div>
                    </div>

                </li>

            </ul>

        </section>

    </article>
    {{--    @auth--}}
    {{--        <a href="{{ route('edit.home') }}" class="edit-page-button">--}}
    {{--            ✏️ Edit Home--}}
    {{--        </a>--}}
    {{--    @endauth--}}
    <a href="{{ route('edit.resume') }}" class="edit-page-button">
        ✏️ Edit Resume
    </a>
@endsection
@extends('layouts.footer')
