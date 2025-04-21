@section('navbar')

    <nav class="navbar">
        <ul class="navbar-list">

            <li class="navbar-item">
                <a href="{{ route('page.show', ['name' => 'home']) }}"
                   class="navbar-link {{request()->routeIs('home') ||
                                       (request()->routeIs('page.show') && request()->route('name') === 'home')? 'active': ''}}"
                                        data-nav-link>
                    Home
                </a>
            </li>

            <li class="navbar-item">
                <a href="{{ route('page.show', ['name' => 'portfolio']) }}"
                   class="navbar-link {{ request()->routeIs('page.show') && request()->route('name') === 'portfolio' ? 'active' : '' }}"
                   data-nav-link>
                    Portfolio
                </a>
            </li>

            <li class="navbar-item">
                <a href="{{ route('page.show', ['name' => 'blog']) }}"
                   class="navbar-link {{ request()->routeIs('page.show') && request()->route('name') === 'blog' ? 'active' : '' }}"
                   data-nav-link>
                    Blog
                </a>
            </li>

            @auth
                @if (Auth::user()->USER_TYPE == 1)
                    <li class="navbar-item">
                        <a href="{{ route('page.show', ['name' => 'profile']) }}"
                           class="navbar-link login-highlight {{ request()->routeIs('page.show') && request()->route('name') === 'profile' ? 'active' : '' }}"
                           data-nav-link>
                            Profile
                        </a>
                    </li>
                @elseif(Auth::user()->USER_TYPE == 0)
                    <li class="navbar-item">
                        <a href="{{ route('page.show', ['name' => 'profile']) }}"
                           class="navbar-link login-highlight {{ request()->routeIs('page.show') && request()->route('name') === 'profile' ? 'active' : '' }}"
                           data-nav-link>
                            Profile
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{ route('admin.home') }}"
                           class="navbar-link login-highlight {{ request()->routeIs('admin.home') ? 'active' : '' }}"
                           data-nav-link>
                            Admin
                        </a>
                    </li>
                @endif
            @else
                <li class="navbar-item">
                    <a href="{{ route('page.show', ['name' => 'login']) }}"
                       class="navbar-link login-highlight {{ request()->routeIs('page.show') && request()->route('name') === 'login' ? 'active' : '' }}"
                       data-nav-link>
                        Log in
                    </a>
                </li>
            @endauth

        </ul>
    </nav>
@endsection
