@extends('layouts.header')
@extends('layouts.main')
@section('content')
    <article class="register active" data-page="register">

        <header>
            <h2 class="h2 article-title">Register</h2>
        </header>

        <section class="content-card" style="max-width: 500px; margin: 2rem auto;">

            <form method="POST" action="{{ route('register') }}" class="form register-form">
                @csrf

                <div class="input-wrapper">
                    <label for="profile_photo" class="form-label h5">Profile Photo</label>
                    <input type="file" id="profile_photo" name="profile_photo" class="form-input" accept="image/*">
                </div>
                <div class="input-wrapper">
                    <label for="name" class="form-label h5">Name</label>
                    <input type="text" id="name" name="name" class="form-input" required placeholder="Full name">
                </div>

                <div class="input-wrapper">
                    <label for="email" class="form-label h5">Email</label>
                    <input type="email" id="email" name="email" class="form-input" required placeholder="Email address">
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
@extends('layouts.footer')
