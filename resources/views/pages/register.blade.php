@extends('layouts.main')
@section('content')
    <article class="register active" data-page="register">

        <header>
            <h2 class="h2 article-title">Register</h2>
        </header>
{{-- | EMAIL| AVATAR | PW | USER_TYPE | FIRST_NAME | LAST_NAME | REGISTER_TYPE | REGISTER_DT | ADDRESS | PHONE_NUM | BIO  | JOB_TITLE | BIRTHDAY | INSTAGRAM_URL | LINKEDIN_URL | GITHUB_URL |--}}
        <section class="content-card" style="max-width: 500px; margin: 2rem auto;">

            <form method="POST" action="{{ route('register') }}" class="form register-form">
                @csrf

                <div class="input-wrapper">
                    <label for="profile_photo" class="form-label h5">Profile Photo</label>
                    <input type="file" id="avatar" name="avatar" class="form-input" accept="image/*">
                </div>
                <div class="input-wrapper">
                    <label for="name" class="form-label h5">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-input" required placeholder="First Name">
                </div>
                <div class="input-wrapper">
                    <label for="name" class="form-label h5">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-input" required placeholder="Last Name">
                </div>

                <div class="input-wrapper">
                    <label for="email" class="form-label h5">Email</label>
                    <input type="email" id="email" name="email" class="form-input" required placeholder="Email address">
                </div>

                <div class="input-wrapper">
                    <label for="password" class="form-label h5">Password</label>
                    <input type="password" id="password" name="password" class="form-input" required placeholder="Password" pattern=".{6,}">
                </div>

                <div class="input-wrapper">
                    <label for="password_confirmation" class="form-label h5">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required placeholder="Confirm password" pattern=".{6,}">
                </div>

                <div class="input-wrapper" style="margin-top: 1.5rem;">
                    <button type="submit" class="form-btn login-highlight">Register</button>
                </div>
            </form>

            <p class="form-text" style="text-align: center; margin-top: 1.5rem; color: var(--light-gray); font-size: var(--fs-7);">
                Already have an account?
                <a href="{{ route('page.show', ['name' => 'login']) }}" style="color: var(--orange-yellow-crayola); font-weight: var(--fw-500);">Log in</a>
            </p>

        </section>
    </article>
@endsection
