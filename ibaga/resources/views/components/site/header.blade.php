<Site-Header
href= "/"
alt="{{ config("app.name") }}"
image-url= "{{ asset('assets/images/logo/logo.svg') }}">
<template slot="navItems">
    @stack('headerRight')
</template>
<template slot="accountDropdown">
    @auth()
      <Dropdown>
        <a class="nav-link pr-0 leading-none" slot="trigger">
          <Avatar  image-url="{{ Auth::user()->avatar }}" ></Avatar>
          <span class="ml-2 d-none d-lg-block">
            <span class="text-default">{{ Auth::user()->name }}</span>
            <small class="text-muted d-block mt-1">Administrateur</small>
          </span>

        </a>
        <div slot="content" class=" dropdown-menu dropdown-menu-center dropdown-menu-arrow show " data-placement="left">
          <Dropdown-Item icon="user" to="{{ route('users.showProfile', Auth::user()->username) }}">Prolile </Dropdown-Item>
          <Dropdown-Item icon="settings">Settings </Dropdown-Item>
          <Dropdown-Item icon="mail">Inbox </Dropdown-Item>
          <Dropdown-Item-Divider></Dropdown-Item-Divider>
          <Dropdown-Item icon="help-circle">Need help?</Dropdown-Item>
          <Dropdown-Item href="{{ route('logout') }}" icon="log-out" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign out</Dropdown-Item>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
            </div>
      </Dropdown>
      @endauth
      
      @guest()
        <div class="col-12 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="{{ route('home') }}">Sign in</a>
        </div>
      @endguest
  </template>


</Site-Header>