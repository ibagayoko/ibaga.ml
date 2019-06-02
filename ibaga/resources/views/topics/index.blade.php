@extends('layouts.dashboard')

@push('headerRight')
    <a href="{{ route('topic.create') }}" class="btn btn-sm btn-outline-primary my-auto mx-3">
        {{ __('buttons.topics.create') }}
    </a>
@endpush

@section('content')
    <topic-list :models="{{ $data['topics'] }}" inline-template>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="d-flex justify-content-between">
                        <h1 class="mb-4 mt-2">{{ __('topics.header') }}</h1>
                        <dropdown class-name="my-auto" flex="md" >
                            <i-Button slot="trigger" icon="search"></i-Button>
                            <div slot="content" class="dropdown-menu dropdown-menu-right show py-0" style="min-width: 15rem;" aria-labelledby="dropdownMenuButton">
                                <form >
                                    <div class="form-group mb-0">
                                        <input v-model="search"
                                               type="text"
                                               class="form-control border-0 px-2 py-0"
                                               id="search"
                                               placeholder="{{ __('topics.search.input') }}..."
                                               autofocus>
                                    </div>
                                </form>
                            </div>
                        </dropdown>
                        {{-- </div> --}}
                    </div>

                    @if(count($data['topics']))
                        <div v-cloak>
                            <div class="d-flex border-top py-3 align-items-center" v-for="topic in filteredList">
                                <div class="mr-auto">
                                    <p class="mb-0 py-1">
                                        <a :href="'/topics/' + topic.id + '/edit'"
                                           class="font-weight-bold lead">@{{ topic.name }}</a>
                                    </p>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-muted mr-3">@{{ topic.posts_count }} {{ __('topics.posts') }}</span>
                                    {{ __('topics.details.created') }} @{{ moment(topic.created_at).fromNow() }}
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <a href="#!" class="btn btn-link" @click="limit += 7" v-if="load">{{ __('buttons.general.load') }} <i class="fa fa-fw fa-angle-down"></i></a>
                            </div>

                            <p class="mt-4" v-if="!filteredList.length">{{ __('topics.search.empty') }}</p>
                        </div>
                    @else
                        <p class="mt-4">{{ __('topics.empty.description') }} <a href="{{ route('topic.create') }}">{{ __('topics.empty.action') }}</a>.</p>
                    @endif
                </div>
            </div>
        </div>
    </topic-list>
@endsection

@section('footer')
    
@endsection