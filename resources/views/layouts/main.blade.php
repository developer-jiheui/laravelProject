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
        @include('layouts.navbar')
        @yield('navbar')


        <!--
          - #PAGE CONTENTS
        -->
        @yield('content')

    </div>
{{--    @include('layouts.edit')--}}
</main>






