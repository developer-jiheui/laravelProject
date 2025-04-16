@extends('layouts.main')
@section('content')
    <div class="profile-edit-wrapper" style="display: flex; gap: 3rem; flex-wrap: wrap;">

        <!-- PROFILE PREVIEW SIDEBAR -->
        <aside class="sidebar-info" style="flex: 1; min-width: 300px;">
            <figure class="avatar-box">
                <img src="{{ asset('storage/' . Auth::user()->AVATAR) }}" alt="{{ Auth::user()->LAST_NAME }}" width="80">
            </figure>

            <div class="info-content">
                <h1 class="name">{{ Auth::user()->FIRST_NAME }} {{ Auth::user()->LAST_NAME }}</h1>
                <p class="title">{{ Auth::user()->JOB_TITLE }}</p>
            </div>

            <ul class="contacts-list">
                <li class="contact-item">
                    <label>Email:</label>
                    <a href="mailto:{{ Auth::user()->EMAIL }}">{{ Auth::user()->EMAIL }}</a>
                </li>
                <li class="contact-item">
                    <lable>Phone:</lable>
                    <a href="tel:{{ Auth::user()->PHONE_NUM }}">{{ Auth::user()->PHONE_NUM }}</a>
                </li>
                <li class="contact-item">
                    <label>Birthday:</label>
                    <time datetime="{{ Auth::user()->BIRTHDAY }}">{{ Auth::user()->BIRTHDAY }}</time>
                </li>
                <li class="contact-item">
                    <label>Location:</label>
                    <address>{{ Auth::user()->ADDRESS }}</address>
                </li>
            </ul>

            <ul class="social-list">
                <li><a href="{{ Auth::user()->LINKEDIN_URL }}"><ion-icon name="logo-linkedin"></ion-icon></a></li>
                <li><a href="{{ Auth::user()->GITHUB_URL }}"><ion-icon name="logo-github"></ion-icon></a></li>
                <li><a href="{{ Auth::user()->INSTAGRAM_URL }}"><ion-icon name="logo-instagram"></ion-icon></a></li>
            </ul>
        </aside>

        <!-- EDIT FORM -->
        <section class="edit-form" style="flex: 2; min-width: 300px;">

            <form method="POST" action="{{ route('edit.profile', ['id' => Auth::user()->USER_ID]) }}" enctype="multipart/form-data" class="form register-form">
                @csrf

                <div class="input-wrapper">
                    <label>Profile Photo</label>
                    <input type="file" name="profile_photo" class="form-input" accept="image/*">
                </div>

                <div class="input-wrapper">
                    <label>First Name</label>
                    <input type="text" name="first_name" placeholder="{{ Auth::user()->FIRST_NAME }}" required>
                </div>

                <div class="input-wrapper">
                    <label>Last Name</label>
                    <input type="text" name="last_name" placeholder="{{ Auth::user()->LAST_NAME }}" required>
                </div>

                <div class="input-wrapper">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="{{ Auth::user()->EMAIL }}" required>
                </div>

                <div class="input-wrapper">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Leave blank to keep current">
                </div>

                <div class="input-wrapper">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation">
                </div>

                <div class="input-wrapper" style="margin-top: 1rem;">
                    <button type="submit" class="form-btn">Update Profile</button>
                </div>
            </form>

        </section>

    </div>
    {{--    <article class="register active" data-page="register">--}}

    {{--        <header>--}}
    {{--            <h2 class="h2 article-title">PROFILE</h2>--}}
    {{--        </header>--}}

    {{--            @if (Auth::check())--}}
    {{--                @if (Auth::user()->USER_TYPE === 1)--}}
    {{--                --}}{{--  <p>Logged in as: {{ Auth::user()->EMAIL }}</p>--}}



    {{--                <div class="sidebar-info">--}}

    {{--                    <figure class="avatar-box">--}}
    {{--                        <img src="{{asset('images/my-avatar.png')}}" alt="{{Auth::user()->LAST_NAME}}" width="80">--}}
    {{--                    </figure>--}}

    {{--                    <div class="info-content">--}}
    {{--                        <h1 class="name" title="my-name">{{Auth::user()->FIRST_NAME}} {{Auth::user()->LAST_NAME}}</h1>--}}
    {{--                        <!---job title-->--}}
    {{--                        <p class="title">{{Auth::user()->JOB_TITLE}}</p>--}}
    {{--                    </div>--}}

    {{--                    <button class="info_more-btn" data-sidebar-btn>--}}
    {{--                        <span>Show Contacts</span>--}}

    {{--                        <ion-icon name="chevron-down"></ion-icon>--}}
    {{--                    </button>--}}

    {{--                </div>--}}

    {{--                <div class="sidebar-info_more">--}}

    {{--                    <div class="separator"></div>--}}

    {{--                    <ul class="contacts-list">--}}

    {{--                        <li class="contact-item">--}}

    {{--                            <div class="icon-box">--}}
    {{--                                <ion-icon name="mail-outline"></ion-icon>--}}
    {{--                            </div>--}}

    {{--                            <div class="contact-info">--}}
    {{--                                <p class="contact-title">Email</p>--}}
    {{--                                <!-- email-->--}}
    {{--                                <a href="mailto:developer.jiheuilee@gmail.com" class="contact-link">{{Auth::user()->EMAIL}}</a>--}}
    {{--                            </div>--}}

    {{--                        </li>--}}

    {{--                        <li class="contact-item">--}}

    {{--                            <div class="icon-box">--}}
    {{--                                <ion-icon name="phone-portrait-outline"></ion-icon>--}}
    {{--                            </div>--}}

    {{--                            <div class="contact-info">--}}
    {{--                                <p class="contact-title">Phone</p>--}}
    {{--                                <!-- phoneNum-->--}}
    {{--                                <a href="tel:+17786807220" class="contact-link">{{Auth::user()->PHONE_NUM}}</a>--}}
    {{--                            </div>--}}

    {{--                        </li>--}}

    {{--                        <li class="contact-item">--}}

    {{--                            <div class="icon-box">--}}
    {{--                                <ion-icon name="calendar-outline"></ion-icon>--}}
    {{--                            </div>--}}

    {{--                            <div class="contact-info">--}}
    {{--                                <p class="contact-title">Birthday</p>--}}
    {{--                                <!-- Bday-->--}}
    {{--                                <time datetime="1991-07-22">{{Auth::user()->BIRTHDAY}}</time>--}}
    {{--                            </div>--}}

    {{--                        </li>--}}

    {{--                        <li class="contact-item">--}}

    {{--                            <div class="icon-box">--}}
    {{--                                <ion-icon name="location-outline"></ion-icon>--}}
    {{--                            </div>--}}

    {{--                            <div class="contact-info">--}}
    {{--                                <p class="contact-title">Location</p>--}}
    {{--                                <!---address-->--}}
    {{--                                <address>{{Auth::user()->ADDRESS}}</address>--}}
    {{--                            </div>--}}

    {{--                        </li>--}}

    {{--                    </ul>--}}

    {{--                    <!-- SNS -->--}}
    {{--                    <div class="separator"></div>--}}

    {{--                    <ul class="social-list">--}}

    {{--                        <li class="social-item">--}}
    {{--                            <a href="{{Auth::user()->LINKEDIN_URL}}" class="social-link">--}}
    {{--                                <ion-icon name="logo-linkedin"></ion-icon>--}}
    {{--                            </a>--}}
    {{--                        </li>--}}

    {{--                        <li class="social-item">--}}
    {{--                            <a href="{{Auth::user()->GITHUB_URL}}" class="social-link">--}}
    {{--                                <ion-icon name="logo-github"></ion-icon>--}}
    {{--                            </a>--}}
    {{--                        </li>--}}

    {{--                        <li class="social-item">--}}
    {{--                            <a href="{{Auth::user()->INSTAGRAM_URL}}" class="social-link">--}}
    {{--                                <ion-icon name="logo-instagram"></ion-icon>--}}
    {{--                            </a>--}}
    {{--                        </li>--}}

    {{--                    </ul>--}}

    {{--                </div>--}}




    {{--            <form method="POST" action="{{ route('logout') }}">--}}
    {{--                @csrf--}}
    {{--                <button type="submit" class="form-btn login-highlight">Log Out</button>--}}
    {{--            </form>--}}

    {{--            @endif--}}
    {{--            @endif--}}


    {{--    </article>--}}
@endsection
