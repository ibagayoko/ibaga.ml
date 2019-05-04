<Site-Header
href= "/"
alt="{{ config("app.name") }}"
image-url= "{{ asset('assets/imgs/logo.svg') }}">
<template slot="navItems">
    @stack('headerRight')
    {{-- <Nav-Item type="div" class-Name="d-none d-md-flex"> --}}
    {{-- <i-Button
      to="https://github.com/tabler/tabler-react"
      target="_blank"
      outline
      size="sm"
      root-tag="a"
      color="primary"
    >
      Source code
    </i-Button> --}}
  {{-- </Nav-Item> --}}
</template>
  {{-- <Nav-Item type="div" class-Name="d-none d-md-flex"> --}}
    <template slot="accountDropdown">
      <Dropdown class=""
      {{-- position="bottom-end" --}}
      {{-- isNavLink --}}
      {{-- triggerClassName="pr-0 leading-none" --}}
      >
      {{-- <template slot=trigger> --}}
        <a class="nav-link pr-0 leading-none" slot="trigger">
          <Avatar  image-URL=avatarURL ></Avatar>
          <span class="ml-2 d-none d-lg-block">
            <span class="text-default">Ismail</span>
            <small class="text-muted d-block mt-1">Administrateur</small>
          </span>

        </a>
      {{-- </template> --}}
        
      
      {{-- <template slot=content> --}}

          <div slot="content" class=" dropdown-menu dropdown-menu-center dropdown-menu-arrow show " data-placement="left">
              <Dropdown-Item icon="tag">Action </Dropdown-Item>
              <Dropdown-Item icon="edit-2">
                @{{" "}}Another action@{{ "" }}
              </Dropdown-Item>
              <Dropdown-Item-Divider></Dropdown-Item-Divider>
              <Dropdown-Item icon="link">
                {{" "}}
                Separated link
              </Dropdown-Item>
            </div>
      {{-- </template> --}}
      </Dropdown>
      
  {{-- </Nav-Item> --}}
</template>

</Site-Header>