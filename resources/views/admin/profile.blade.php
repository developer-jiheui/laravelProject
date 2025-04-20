@extends('layouts.main')
@section('content')

    <article class="edit_profile active" data-page="edit_profile">

        <header>
            <h2 class="h2 article-title">MY PROFILE</h2>
        </header>



                <div class="sidebar-info">

                    <figure class="avatar-box">
                        @if (Auth::user()->AVATAR)
                            <img src="{{ asset(Auth::user()->AVATAR) }}" alt="Avatar" width="80">
                        @else
                            <img src="{{ asset('images/my-avatar.png') }}" alt="Default Avatar" width="80">
                        @endif
                    </figure>

                    <div class="info-content">
                        <h1 class="name" title="my-name">{{Auth::user()->FIRST_NAME}} {{Auth::user()->LAST_NAME}}</h1>
                        <!---job title-->
                    </div>

                </div>


                    <div class="separator"></div>

                    <div class="separator"></div>



                <form method="POST" action="{{ route('update.profile') }}" enctype="multipart/form-data" class="form register-form">                @csrf

                    <div class="input-wrapper">
                        <label for="profile_photo" class="form-label h5">Profile Photo</label>
                        <input type="file" id="profile_photo" name="profile_photo" class="form-input" accept="image/*">
                    </div>

                    <div class="input-wrapper">
                        <label for="first_name" class="form-label h5">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-input"
                               value="{{ old('first_name', Auth::user()->FIRST_NAME) }}">
                    </div>

                    <div class="input-wrapper">
                        <label for="last_name" class="form-label h5">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-input"
                               value="{{ old('last_name', Auth::user()->LAST_NAME) }}">
                    </div>

                    <div class="input-wrapper">
                        <label for="email" class="form-label h5">Email</label>
                        <input type="email" id="email" name="email" class="form-input"
                               value="{{ old('email', Auth::user()->EMAIL) }}">
                    </div>

                    <div class="input-wrapper">
                        <label for="password" class="form-label h5">Password</label>
                        <input type="password" id="password" name="password" class="form-input" placeholder="Password">
                    </div>

                    <div class="input-wrapper">
                        <label for="password_confirmation" class="form-label h5">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-input"
                               placeholder="Confirm password">
                    </div>

                    <div class="input-wrapper">
                        <label for="address" class="form-label h5">Address</label>
                        <input type="text" id="address" name="address" class="form-input"
                               value="{{ old('address', Auth::user()->ADDRESS) }}">
                    </div>

                    <div class="input-wrapper">
                        <label for="phone_num" class="form-label h5">Phone Number</label>
                        <input type="text" id="phone_num" name="phone_num" class="form-input"
                               value="{{ old('phone_num', Auth::user()->PHONE_NUM) }}">
                    </div>

                    <div class="input-wrapper">
                        <label for="bio" class="form-label h5">Bio</label>
                        <input type="text" id="bio" name="bio" class="form-input"
                               value="{{ old('bio', Auth::user()->BIO) }}">
                    </div>

                    <div class="input-wrapper">
                        <label for="job_title" class="form-label h5">Job Title</label>
                        <input type="text" id="job_title" name="job_title" class="form-input"
                               value="{{ old('job_title', Auth::user()->JOB_TITLE) }}">
                    </div>

                    <div class="input-wrapper">
                        <label for="birthday" class="form-label h5">Birthday</label>
                        <input type="date" id="birthday" name="birthday" class="form-input"
                               value="{{ old('birthday', Auth::user()->BIRTHDAY) }}">
                    </div>

                    <div class="input-wrapper">
                        <label for="github" class="form-label h5">GitHub</label>
                        <input type="url" id="github" name="github" class="form-input"
                               value="{{ old('github', Auth::user()->GITHUB_URL) }}">
                    </div>

                    <div class="input-wrapper">
                        <label for="linked_in" class="form-label h5">LinkedIn</label>
                        <input type="url" id="linked_in" name="linked_in" class="form-input"
                               value="{{ old('linked_in', Auth::user()->LINKEDIN_URL) }}">
                    </div>

                    <div class="input-wrapper">
                        <label for="instagram" class="form-label h5">Instagram</label>
                        <input type="url" id="instagram" name="instagram" class="form-input"
                               value="{{ old('instagram', Auth::user()->INSTAGRAM_URL) }}">
                    </div>

                <div class="input-wrapper" style="margin-top: 1.5rem;">
                    <button type="submit" class="form-btn login-highlight">Edit Profile</button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="form-btn login-highlight">Log Out</button>
            </form>

{{--            @endif--}}
{{--            @endif--}}


    </article>
@endsection
