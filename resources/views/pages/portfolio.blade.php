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

                <li class="filter-item">
                    <button data-filter-btn>Web design</button>
                </li>

                <li class="filter-item">
                    <button data-filter-btn>Applications</button>
                </li>

                <li class="filter-item">
                    <button data-filter-btn>Web development</button>
                </li>

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

                    <li class="select-item">
                        <button data-select-item>Web design</button>
                    </li>

                    <li class="select-item">
                        <button data-select-item>Applications</button>
                    </li>

                    <li class="select-item">
                        <button data-select-item>Web development</button>
                    </li>

                </ul>

            </div>

            <!--  TODO MAKE THE PROJECT PART LIKE A BLOG POST-->

            <ul class="project-list">

                <li class="project-item  active" data-filter-item data-category="web development">
                    <a href="#">

                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <button select-project><ion-icon name="eye-outline"></ion-icon></button>
                            </div>

                            <img src="./assets/images/projects/project_1.png" alt="jwitter" loading="lazy">
                        </figure>

                        <h3 class="project-title">프로젝트명</h3>

                        <p class="project-category">Web development</p>

                    </a>

                </li>

                <li class="project-item  active" data-filter-item data-category="web development">
                    <a href="#">

                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>

                            <img src="./assets/images/projects/dscWebsite.png" alt="dscwebsite" loading="lazy">
                        </figure>

                        <h3 class="project-title">프로젝트명</h3>

                        <p class="project-category">Web development</p>

                    </a>
                </li>

                <li class="project-item  active" data-filter-item data-category="web design">
                    <a href="#">

                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>

                            <img src="./assets/images/projects/project-3.png" alt="fundo" loading="lazy">
                        </figure>

                        <h3 class="project-title">프로젝트명</h3>

                        <p class="project-category">Web design</p>

                    </a>
                </li>

                <li class="project-item  active" data-filter-item data-category="applications">
                    <a href="#">

                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>

                            <img src="./assets/images/projects/garagesale.PNG" alt="garagesale" loading="lazy">
                        </figure>

                        <h3 class="project-title">프로젝트명</h3>

                        <p class="project-category">Applications</p>

                    </a>
                </li>

                <li class="project-item  active" data-filter-item data-category="web design">
                    <a href="#">

                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>

                            <img src="./assets/images/projects/project-5.png" alt="dsc" loading="lazy">
                        </figure>

                        <h3 class="project-title">프로젝트명</h3>

                        <p class="project-category">Web design</p>

                    </a>
                </li>

                <li class="project-item  active" data-filter-item data-category="web design">
                    <a href="#">

                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>

                            <img src="./assets/images/projects/project-6.png" alt="garage_sale" loading="lazy">
                        </figure>

                        <h3 class="project-title">프로젝트명</h3>

                        <p class="project-category">Web design</p>

                    </a>
                </li>

                <li class="project-item  active" data-filter-item data-category="web development">
                    <a href="#">

                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>

                            <img src="./assets/images/project-7.png" alt="summary" loading="lazy">
                        </figure>

                        <h3 class="project-title">프로젝트명</h3>

                        <p class="project-category">Web development</p>

                    </a>
                </li>

                <li class="project-item  active" data-filter-item data-category="applications">
                    <a href="#">

                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>

                            <img src="./assets/images/project-8.jpg" alt="task manager" loading="lazy">
                        </figure>

                        <h3 class="project-title">프로젝트명</h3>

                        <p class="project-category">Applications</p>

                    </a>
                </li>

                <li class="project-item  active" data-filter-item data-category="web development">
                    <a href="#">

                        <figure class="project-img">
                            <div class="project-item-icon-box">
                                <ion-icon name="eye-outline"></ion-icon>
                            </div>

                            <img src="./assets/images/project-9.png" alt="arrival" loading="lazy">
                        </figure>

                        <h3 class="project-title">프로젝트명</h3>

                        <p class="project-category">Web development</p>

                    </a>
                </li>

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
