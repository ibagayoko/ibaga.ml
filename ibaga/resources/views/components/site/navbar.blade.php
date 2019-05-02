<Site-Nav :items="{{ json_encode($menu)}}" :collapse="this.collapseMobileMenu">
    <template slot="nav">
        {{-- <I-Nav
        tabbed="true"
        class-name="border-0 flex-column flex-lg-row"
        :items="items"
        > --}}
        {{-- <Nav-Item
        key="key"
        value="item.value"
        to="item.to"
        icon="item.icon"
        sub-items="item.subItems"
        has-sub-nav="!!item.subItems"
        active="computeActive(item)"
        useExact="item.useExact"
      > --}}
      </Nav-Item>
        </I-Nav>
    </template>
    <template slot=rightColumnComponent>
        {{-- seacrh bar --}}
    </template>
</Site-Nav>