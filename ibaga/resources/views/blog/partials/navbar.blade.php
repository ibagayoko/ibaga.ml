<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <a class="btn btn-sm btn-outline-secondary" href="https://cnvs.io" target="_blank">Learn more</a>
        </div>
        <div class="col-4 text-center">
            <a class="blog-header-logo text-dark navbar-brand"
               href="{{ route('blog.index') }}">{{ config('app.name', 'Blog') }}
               <img src="/assets/imgs/person.svg"  width="40" height="40" class="d-inline-block align-top" alt="">
            </a>
        </div>

        @auth()
            <div class="col-4 d-flex justify-content-end align-items-center">
                <div class="dropdown">
                    <a href="#" id="navbarDropdown" class="nav-link px-0 py-0 text-secondary" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim(auth()->user()->email))), '?s=200') }}"
                             class="rounded-circle my-0"
                             style="width: 31px"
                             alt="{{ auth()->user()->name }}"
                        >
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('post.index') }}">Posts</a>
                        <a class="dropdown-item" href="{{ route('tag.index') }}">Tags</a>
                        {{-- <a class="dropdown-item" href="{{ route('topic.index') }}">Topics</a> --}}
                        <a class="dropdown-item" href="{{ route('stats.index') }}">Stats</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Sign out') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        @endauth

        @guest()
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="{{ route('home') }}">Sign in</a>
            </div>
        @endguest
    </div>
</header>