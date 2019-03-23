<div class="border-bottom">
    <div class="container d-flex justify-content-center px-0">
        <div class="col-md-10 px-0">
            <nav class="navbar navbar-light justify-content-between flex-nowrap flex-row py-1">
                <!-- Left Side Of Navbar -->
                <a class="navbar-brand logo mr-4 font-weight-bold py-0 @hasSection('context') d-none d-md-block @endif"
                   href="{{ route('home') }}">
                    <i class="fas fa-align-left"></i>
                </a>

                <ul class="navbar-nav mr-auto flex-row float-right">
                    <li class="text-muted font-weight-bold">
                        @yield('context')
                        @if(session('notify'))
                            @hasSection('context') — @endif
                            <span class="text-success">{{ session('notify') }}</span>
                        @endif
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                @auth()
                    @yield('actions')

                    <div class="dropdown">
                        <a href="#" id="navbarDropdown" class="nav-link px-0 text-secondary" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=200') }}"
                                 class="rounded-circle my-0"
                                 style="width: 31px"
                                 alt="{{ auth()->user()->name }}"
                            >
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">{{ Auth::user()->name }} </a>
                            <a class="dropdown-item" href="{{ route('post.index') }}">Posts</a>
                            {{-- <a class="dropdown-item" href="{{ route('tag.index') }}">Tags</a> --}}
                            {{-- <a class="dropdown-item" href="{{ route('canvas.topic.index') }}">Topics</a> --}}
                            <a class="dropdown-item" href="{{ route('home') }}">Stats</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Sign out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endauth

                @guest()
                    {{-- <a href="{{ route('canvas.index') }}" class="nav-link text-secondary my-1 py-2">Sign in</a> --}}
                    <a href="{{ url('https://cnvs.io') }}" class="btn btn-sm btn-outline-primary">Learn more</a>
                @endguest
            </nav>
        </div>
    </div>
</div>