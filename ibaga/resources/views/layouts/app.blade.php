<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Highlight JS sheets -->
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.13.1/build/highlight.min.js"></script>


    <!-- Scripts -->
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="{{ ('/app.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Merriweather|Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ ('/light.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.13.1/build/styles/sunburst.min.css">

    <link rel="stylesheet" href="/style.css">
    <style>
    .overlay {
    display: none;
    position: fixed;
    /* full screen */
    width: 100vw;
    height: 100vh;
    /* transparent black */
    background: rgba(0, 0, 0, 0.0);
    /* middle layer, i.e. appears below the sidebar */
    z-index: 998;
    opacity: 0;
    /* animate the transition */
    transition: all 0.5s ease-in-out;
}
/* display .overlay when it has the .active class */
.overlay.active {
    display: block;
    opacity: 1;
}
</style>
</head>
<body>
<div class="overlay"></div>

    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'iBaga') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                   
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        @include('components.nav.navbar')

        <main class="py-4">
            @yield('content')
        </main>
        
            <!-- Dark Overlay element -->
        </div>
        
    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function () {
            // $("#sidebar").mCustomScrollbar({
            //     theme: "minimal"
            // });
            function hideSidePostSettings() {

                // hide sidebar
                $('#sidebar').removeClass('settings-menu-expanded');
                $("#subview").addClass('settings-menu-pane-out-right');
                // hide overlay
                $("#subview").removeClass('settings-menu-pane-in');
                $('.overlay').removeClass('active');
            }
    
            $('#dismiss, .overlay').on('click', function () {
                hideSidePostSettings();
            });
            $("button.close-side-settings").on('click', function () {
                hideSidePostSettings();
            });
            
            $('#sidebarCollapse').on('click', function () {
                console.log('click')
                // open sidebar
                $('#sidebar').addClass('settings-menu-expanded');
                // fade in the overlay
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

            $("button[data-subview-back]").on('click', function(){
                console.log('back')
                $("#subview").addClass('settings-menu-pane-out-right')
                $("#subview").removeClass('settings-menu-pane-in');
            })

            $('.toggle-subview').on('click', function () {
                console.log('click sub')
                // // open sidebar
                // $('#sidebar').addClass('settings-menu-pane-out-left');
                // // fade in the overlay
                // $('.overlay').addClass('active');
                // $('.collapse.in').toggleClass('in');
                $("#subview").removeClass('settings-menu-pane-out-right')
                $("#subview>div").removeClass('active');
                $("#subview").addClass('settings-menu-pane-in');
                $($(this).data('sub-target')).addClass('active');
            });
        });
    </script>
</body>
</html>
