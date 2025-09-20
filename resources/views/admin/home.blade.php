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
        @include('navbar')
        @yield('navbar')


        <!--
          - #PAGE CONTENTS
        -->
        @include('pages.home')
        @yield('content')

    </div>
    {{--    @include('layouts.edit')--}}
</main>

@include('layouts.footer')
@yield('footer')




