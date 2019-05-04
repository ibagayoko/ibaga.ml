<Site-Header
href= "/"
alt="{{ config("app.name") }}"
image-url= "{{ asset('assets/imgs/logo.svg') }}">
<template slot="navItems">
    @stack('headerRight')
</template>
    <template slot="accountDropdown">
      <Dropdown>
        <a class="nav-link pr-0 leading-none" slot="trigger">
          <Avatar  image-url="{{ Auth::user()->avatar }}" ></Avatar>
          <span class="ml-2 d-none d-lg-block">
            <span class="text-default">{{ Auth::user()->name }}</span>
            <small class="text-muted d-block mt-1">Administrateur</small>
          </span>

        </a>
        <div slot="content" class=" dropdown-menu dropdown-menu-center dropdown-menu-arrow show " data-placement="left">
          <Dropdown-Item icon="user">Prolile </Dropdown-Item>
          <Dropdown-Item icon="settings">Prolile </Dropdown-Item>
          <Dropdown-Item icon="mail">Inbox </Dropdown-Item>
          <Dropdown-Item-Divider></Dropdown-Item-Divider>
          <Dropdown-Item icon="help-circle">Need help?</Dropdown-Item>
          <Dropdown-Item href="{{ route('logout') }}" icon="log-out" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign out</Dropdown-Item>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
            </div>
      </Dropdown>
      
</template>

</Site-Header>