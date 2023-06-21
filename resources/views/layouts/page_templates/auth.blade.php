<div class="wrapper">
    @if (Auth::check() && Auth::user()->is_active == 1)
        @include('layouts.navbars.auth')
    @else
        @include('layouts.navbars.auth2')
    @endif
    <div class="main-panel">
        @include('layouts.navbars.navs.auth')
        @yield('content')
        @include('layouts.footer')
    </div>
</div>