@extends('layouts.main')
@section('content')
    <article class="register active" data-page="register">

        <header>
            <h2 class="h2 article-title">PROFILE</h2>
        </header>

            @if (Auth::check())
                @if (Auth::user()->USER_TYPE === 1)
        <section class="content-card" style="max-width: 500px; margin: 2rem auto;">
                {{--  <p>Logged in as: {{ Auth::user()->EMAIL }}</p>--}}


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


        </section>
    </article>
@endsection
