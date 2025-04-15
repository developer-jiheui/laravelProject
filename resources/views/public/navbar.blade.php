@section('public_navbar')

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
                <a href="{{ route('page.show', ['name' => 'profile']) }}"
                   class="navbar-link login-highlight {{ request()->routeIs('page.show') && request()->route('name') === 'profile' ? 'active' : '' }}"
                   data-nav-link>
                    Profile
                </a>
            </li>

        </ul>
    </nav>
@endsection
