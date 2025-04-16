@extends('layouts.main')
@section('content')

    <article class="register active" data-page="register">

        <header>
            <h2 class="h2 article-title">MY PROFILE</h2>
        </header>

            @if (Auth::check())
                @if (Auth::user()->USER_TYPE === 1)
                {{--  <p>Logged in as: {{ Auth::user()->EMAIL }}</p>--}}



                <div class="sidebar-info">

                    <figure class="avatar-box">
                        <img src="{{asset('images/my-avatar.png')}}" alt="{{Auth::user()->LAST_NAME}}" width="80">
                    </figure>

                    <div class="info-content">
                        <h1 class="name" title="my-name">{{Auth::user()->FIRST_NAME}} {{Auth::user()->LAST_NAME}}</h1>
                        <!---job title-->
                    </div>

                </div>


                    <div class="separator"></div>

                    <div class="separator"></div>



            <form method="POST" action="{{ route('edit.profile',['id'=>Auth::user()->USER_ID]) }}" class="form register-form">
                @csrf

                <div class="input-wrapper">
                    <label for="profile_photo" class="form-label h5">Profile Photo</label>
                    <input type="file" id="profile_photo" name="profile_photo" class="form-input" accept="image/*">
                </div>
                <div class="input-wrapper">
                    <label for="name" class="form-label h5">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-input" required placeholder="{{Auth::user()->FIRST_NAME}}">
                </div>
                <div class="input-wrapper">
                    <label for="name" class="form-label h5">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-input" required placeholder="{{Auth::user()->LAST_NAME}}">
                </div>

                <div class="input-wrapper">
                    <label for="email" class="form-label h5">Email</label>
                    <input type="email" id="email" name="email" class="form-input" required placeholder="{{Auth::user()->EMAIL}}">
                </div>

                <div class="input-wrapper">
                    <label for="password" class="form-label h5">Password</label>
                    <input type="password" id="password" name="password" class="form-input" required placeholder="Password">
                </div>

                <div class="input-wrapper">
                    <label for="password_confirmation" class="form-label h5">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required placeholder="Confirm password">
                </div>

                <div class="input-wrapper">
                    <label for="email" class="form-label h5">ADDRESS</label>
                    <input type="email" id="email" name="email" class="form-input" required placeholder="{{Auth::user()->ADDRESS}}">
                </div>

                <div class="input-wrapper">
                    <label for="phone_num" class="form-label h5">PHONE NUMBER</label>
                    <input type="text" id="phone_num" name="phone_num" class="form-input" required placeholder="{{Auth::user()->PHONE_NUM}}">
                </div>
                <div class="input-wrapper">
                    <label for="bio" class="form-label h5">BIO</label>
                    <input type="text" id="bio" name="bio" class="form-input" required placeholder="{{Auth::user()->BIO}}">
                </div>
                <div class="input-wrapper">
                    <label for="job_title" class="form-label h5">JOB_TITLE</label>
                    <input type="text" id="job_title" name="job_title" class="form-input" required placeholder="{{Auth::user()->JOB_TITLE}}">
                </div>
                <div class="input-wrapper">
                    <label for="birthday" class="form-label h5">BIRTHDAY</label>
                    <input type="date" id="birthday" name="birthday" class="form-input" required placeholder="{{Auth::user()->BIRTHDAY}}">
                </div>
                <div class="input-wrapper">
                    <label for="github" class="form-label h5">GITHUB</label>
                    <input type="url" id="github" name="github" class="form-input" required placeholder="{{Auth::user()->GITHUB_URL}}">
                </div>
                <div class="input-wrapper">
                    <label for="linked_in" class="form-label h5">LINKEDIN</label>
                    <input type="url" id="linked_in" name="linked_in" class="form-input" required placeholder="{{Auth::user()->LINKEDIN_URL}}">
                </div>
                <div class="input-wrapper">
                    <label for="instagram" class="form-label h5">INSTAGRAM</label>
                    <input type="url" id="instagram" name="instagram" class="form-input" required placeholder="{{Auth::user()->INSTAGRAM_URL}}">
                </div>

                <div class="input-wrapper" style="margin-top: 1.5rem;">
                    <button type="submit" class="form-btn login-highlight">Edit Profile</button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="form-btn login-highlight">Log Out</button>
            </form>

            @endif
            @endif


    </article>
@endsection
