@include('layouts.header')
@yield('header')

<!--
  - #MAIN
-->

<main>

    <!--
      - #SIDEBAR
    -->
    @include('layouts.sidebar')
    @yield('sidebar')

    <!--
      - #main-content
    -->

    <div class="main-content">
        {{--TODO : authenticated user type and change it to admin navbar or normal user navbar        --}}
        @if (Auth::check())
        {{--  <p>Logged in as: {{ Auth::user()->EMAIL }}</p>--}}
            @if (Auth::user()->USER_TYPE === 0)

                @include('admin.navbar')
                @yield('admin_navbar')

            @else
                {{-- Regular user log in--}}
                @include('public.navbar')
                @yield('public_navbar')
            @endif
        @else
            {{--Not logged in--}}
            @include('layouts.navbar')
            @yield('navbar')
        @endif


        <!--
          - #PAGE CONTENTS
        -->
        @yield('content')

    </div>
    {{--    @include('layouts.edit')--}}
</main>

@include('layouts.footer')
@yield('footer')