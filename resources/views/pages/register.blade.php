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
                    <label for="profile_photo" class="form-label h5" style="margin-bottom: 0.5rem;">Profile Photo</label>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="image-name">No image selected</span>
                        <label class="icon-box" style="cursor: pointer;">
                            <ion-icon name="cloud-upload-outline" role="img" aria-label="Upload new icon…"></ion-icon>
                            <input type="file" name="profile_photo" id="profile_photo" style="position: absolute; top: -999px;" accept="image/*">
                        </label>
                    </div>
                    @error('profile_photo')
                    <div></div><small class="text-danger" style="color:red">{{ $message }}</small>
                    @enderror

                </div>

                <div class="input-wrapper">
                    <label for="name" class="form-label h5">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-input" required placeholder="First Name">
                    @error('first_name')
                    <div></div><small class="text-danger" style="color:red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-wrapper">
                    <label for="name" class="form-label h5">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-input" required placeholder="Last Name">
                    @error('last_name')
                    <div></div><small class="text-danger" style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="input-wrapper">
                    <label for="email" class="form-label h5">Email</label>
                    <input type="email" id="email" name="email" class="form-input" required placeholder="Email address">
                    @error('email')
                    <div></div><small class="text-danger" style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="input-wrapper">
                    <label for="password" class="form-label h5">Password</label>
                    <input type="password" id="password" name="password" class="form-input" required placeholder="At least 6 words" pattern=".{6,}">
                    @error('password')
                    <div></div><small class="text-danger" style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="input-wrapper">
                    <label for="password_confirmation" class="form-label h5">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required placeholder="Confirm password" pattern=".{6,}">
                    @error('password_confirmation')
                    <div></div><small class="text-danger" style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div style="display: flex; justify-content: center; margin-top: 1.5rem;">
                    <div>
                        <button type="submit" class="form-btn login-highlight">Register</button>
                    </div>
                </div>
            </form>

            <p class="form-text" style="text-align: center; margin-top: 1.5rem; color: var(--light-gray); font-size: var(--fs-7);">
                Already have an account?
                <a href="{{ route('page.show', ['name' => 'login']) }}" style="color: var(--orange-yellow-crayola); font-weight: var(--fw-500);">Log in</a>
            </p>

        </section>
    </article>
@endsection
