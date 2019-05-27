<Site-Nav :collapse="this.collapseMobileMenu">
    <template slot="nav">
        <I-Nav
        tabbed="true"
        class-name="border-0 flex-column flex-lg-row"
        {{-- :items="{{ json_encode($menu)}}" --}}
        >
        @foreach ($items as $item)
            
        <Nav-Item
            {{-- key="key" --}}
            value="{{ __($item->title) }}"
            to="{{ $item->link()}}"
            icon="{{ $item->icon_class }}"
            {{-- sub-items="item.subItems" --}}
            :has-sub-nav="{{ count($item->children)? "true" : "false" }}"
            active="{{ $item->active }}"
            :use-Exact="true"
            >
            @if (count($item->children))
                
            <template slot="sub-item">
                @foreach ($item->children as $child)
                    
                <Nav-Sub-Item value="{{ __($child->title) }}" to="{{ $child->link() }}" icon="{{ $child->icon_class }}">
                </Nav-Sub-Item>
                @endforeach
            </template>
            @endif
            </Nav-Item>
            @endforeach
        </I-Nav>
    </template>
    <template slot="rightColumnComponent">
        {{-- seacrh bar --}}
        @stack('navRight')
    </template>
</Site-Nav>