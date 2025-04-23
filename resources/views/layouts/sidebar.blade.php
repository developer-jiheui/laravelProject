@section('sidebar')
    <aside class="sidebar" data-sidebar>

        <div class="sidebar-info">

            <figure class="avatar-box">
                <img src="{{ isset($superAdmin) && $superAdmin->AVATAR ? asset($superAdmin->AVATAR) : asset('images/my-avatar.png') }}"
                     alt="{{ $superAdmin->FIRST_NAME ?? 'Jiheui Lee' }}" width="80">
            </figure>

            <div class="info-content">
                <h1 class="name" title="my-name">
                    {{ $superAdmin->FIRST_NAME ?? 'Jiheui' }} {{ $superAdmin->LAST_NAME ?? 'Lee' }}
                </h1>
                <p class="title">{{ $superAdmin->JOB_TITLE ?? 'Full Stack Developer' }}</p>
            </div>

            <button class="info_more-btn" data-sidebar-btn>
                <span>Show Contacts</span>
                <ion-icon name="chevron-down"></ion-icon>
            </button>
        </div>

        <div class="sidebar-info_more">
            <div class="separator"></div>

            <ul class="contacts-list">
                <li class="contact-item">
                    <div class="icon-box"><ion-icon name="mail-outline"></ion-icon></div>
                    <div class="contact-info">
                        <p class="contact-title">Email</p>
                        <a href="mailto:{{ $superAdmin->EMAIL ?? 'developer.jiheuilee@gmail.com' }}"
                           class="contact-link">{{ $superAdmin->EMAIL ?? 'developer.jiheuilee@gmail.com' }}</a>
                    </div>
                </li>

                <li class="contact-item">
                    <div class="icon-box"><ion-icon name="phone-portrait-outline"></ion-icon></div>
                    <div class="contact-info">
                        <p class="contact-title">Phone</p>
                        <a href="tel:{{ $superAdmin->PHONE_NUM ?? '+17786807220' }}"
                           class="contact-link">{{ $superAdmin->PHONE_NUM ?? '+1 (778) 680-7220' }}</a>
                    </div>
                </li>

                <li class="contact-item">
                    <div class="icon-box"><ion-icon name="calendar-outline"></ion-icon></div>
                    <div class="contact-info">
                        <p class="contact-title">Birthday</p>
                        <time datetime="{{ $superAdmin->BIRTHDAY ?? '1991-07-22' }}">
                            {{ \Carbon\Carbon::parse($superAdmin->BIRTHDAY ?? '1991-07-22')->format('F d, Y') }}
                        </time>
                    </div>
                </li>

                <li class="contact-item">
                    <div class="icon-box"><ion-icon name="location-outline"></ion-icon></div>
                    <div class="contact-info">
                        <p class="contact-title">Location</p>
                        <address>{{ $superAdmin->ADDRESS ?? '1026 Commercial Dr, Vancouver, BC, Canada' }}</address>
                    </div>
                </li>
            </ul>

            <div class="separator"></div>

            <ul class="social-list">
                @if (!empty($superAdmin->LINKED_IN))
                    <li class="social-item">
                        <a href="{{ $superAdmin->LINKED_IN }}" class="social-link">
                            <ion-icon name="logo-linkedin"></ion-icon>
                        </a>
                    </li>
                @else
                    <li class="social-item">
                        <a href="https://www.linkedin.com/in/jiheuilee/" class="social-link">
                            <ion-icon name="logo-linkedin"></ion-icon>
                        </a>
                    </li>
                @endif

                @if (!empty($superAdmin->GITHUB))
                    <li class="social-item">
                        <a href="{{ $superAdmin->GITHUB }}" class="social-link">
                            <ion-icon name="logo-github"></ion-icon>
                        </a>
                    </li>
                @else
                    <li class="social-item">
                        <a href="https://github.com/developer-jiheui" class="social-link">
                            <ion-icon name="logo-github"></ion-icon>
                        </a>
                    </li>
                @endif

                @if (!empty($superAdmin->INSTAGRAM))
                    <li class="social-item">
                        <a href="{{ $superAdmin->INSTAGRAM }}" class="social-link">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>
                @else
                    <li class="social-item">
                        <a href="#" class="social-link">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>
                @endif
            </ul>
        </div>

    </aside>
@endsection
