@section('admin_navbar')

    <nav class="navbar">
        <ul class="navbar-list">

            <li class="navbar-item">
                <a href="{{ route('page.show', ['name' => 'home']) }}"
                   class="navbar-link {{ request()->routeIs('page.show') && request()->route('name') === 'home' ? 'active' : '' }}"
                   data-nav-link>
                    Home
                </a>
            </li>

            <li class="navbar-item">
                <a href="{{ route('page.show', ['name' => 'bio']) }}"
                   class="navbar-link {{ request()->routeIs('page.show') && request()->route('name') === 'bio' ? 'active' : '' }}"
                   data-nav-link>
                    Bio
                </a>
            </li>

            <li class="navbar-item">
                <a href="{{ route('page.show', ['name' => 'resume']) }}"
                   class="navbar-link {{ request()->routeIs('page.show') && request()->route('name') === 'resume' ? 'active' : '' }}"
                   data-nav-link>
                    Resume
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

            <li class="navbar-item">
                <a href="{{ route('page.show', ['name' => 'login']) }}"
                   class="navbar-link login-highlight {{ request()->routeIs('page.show') && request()->route('name') === 'login' ? 'active' : '' }}"
                   data-nav-link>
                    Admin
                </a>
            </li>

        </ul>
    </nav>
@endsection
