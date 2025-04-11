@extends('layouts.footer')
@extends('layouts.main')
@section('content')
    <article class="login active" data-page="login">

        <header>
            <h2 class="h2 article-title">Log in</h2>
        </header>

        <section class="content-card" style="max-width: 500px; margin: 2rem auto;">

            <form method="POST" action="{{ route('login') }}" class="form login-form">
                @csrf

                <div class="input-wrapper">
                    <label for="email" class="form-label h5">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input"
                        required
                        placeholder="Enter your email"
                    >
                </div>

                <div class="input-wrapper">
                    <label for="password" class="form-label h5">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        required
                        placeholder="Enter your password"
                    >
                </div>

                <div class="input-wrapper" style="margin-top: 1.5rem;">
                    <button type="submit" class="form-btn login-highlight">Log In</button>
                </div>
            </form>

            <p class="form-text" style="text-align: center; margin-top: 1.5rem; color: var(--light-gray); font-size: var(--fs-7);">
                Don't have an account?
                <a href="{{ route('page.show', ['name' => 'register']) }}" style="color: var(--orange-yellow-crayola); font-weight: var(--fw-500);">Register</a>
            </p>

        </section>
    </article>
@endsection
@extends('layouts.header')
