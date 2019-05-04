<ol class="dd-list">

        @foreach ($items as $item)
        
            <li class="dd-item" data-id="{{ $item->id }}">
                <div class="pull-right item_actions">
                    <div class="btn btn-sm btn-danger pull-right delete" data-id="{{ $item->id }}">
                            <icon name="trash"></icon> {{ __('generic.delete') }}
                    </div>
                    <div class="btn btn-sm btn-primary pull-right edit"
                        data-id="{{ $item->id }}"
                        data-title="{{ $item->title }}"
                        data-url="{{ $item->url }}"
                        data-target="{{ $item->target }}"
                        data-icon_class="{{ $item->icon_class }}"
                        data-color="{{ $item->color }}"
                        data-route="{{ $item->route }}"
                        data-parameters="{{ json_encode($item->parameters) }}"
                    >
                        <icon name="edit"></icon> {{ __('generic.edit') }}
                    </div>
                </div>
                <div class="dd-handle">
                    <span>{{ $item->title }}</span> <small class="url">{{ $item->link() }}</small>
                </div>
                @if(!$item->children->isEmpty())
                    @include('menu.admin', ['items' => $item->children])
                @endif
            </li>
        
        @endforeach
        
        </ol>