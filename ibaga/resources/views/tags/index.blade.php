@extends('layouts.dashboard')

@push('headerRight')
    <a href="{{ route('tag.create') }}" class="btn btn-sm btn-outline-primary my-auto mx-3">
        New tag
    </a>
@endpush

@section('content')
    <tag-list :models="{{ $data['tags'] }}" inline-template>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="d-flex justify-content-between">
                        <h1 class="mb-4 mt-2">Tags</h1>
                        <div class="dropdown my-auto">
                            <a href="#" id="navbarDropdown" class="nav-link px-0 text-secondary pt-0" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style="margin-top: -8px">
                                <i class="fas fa-search"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right py-0" style="min-width: 15rem;" aria-labelledby="dropdownMenuButton">
                                <form class="pl-2 pr-4 mr-5">
                                    <div class="form-group mb-0">
                                        <input v-model="search"
                                               type="text"
                                               class="form-control border-0 px-0 py-0"
                                               id="search"
                                               placeholder="Search..."
                                               autofocus>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if(count($data['tags']))
                        <div v-cloak>
                            <div class="d-flex border-top py-3 align-items-center" v-for="tag in filteredList">
                                <div class="mr-auto">
                                    <p class="mb-0 py-1">
                                        <a :href="'/tags/' + tag.id + '/edit'"
                                           class="font-weight-bold lead">@{{ tag.name }}</a>
                                    </p>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-muted mr-3">@{{ tag.posts_count }} Post(s)</span>
                                    Created @{{ timeAgo(tag.created_at) }}
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-center">
                                <a href="#!" class="btn btn-link" @click="limit += 7" v-if="load">{{ __('buttons.general.load') }} <i class="fa fa-fw fa-angle-down"></i></a>
                            </div>
                            <p class="mt-4" v-if="!filteredList.length">No tags matched the given search criteria.</p>
                        </div>
                    @else
                        <p class="mt-4">No tags were found, start by <a href="{{ route('tag.create') }}">adding a new tag</a>.</p>
                    @endif
                </div>
            </div>
        </div>
    </tag-list>
@endsection

@php
    $links = $linksName = [];
@endphp
@section('footer')
{{-- ndik --}}
    
@endsection