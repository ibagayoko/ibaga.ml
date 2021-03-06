@extends('layouts.dashboard')

@push('headerRight')
    <a href="{{ route('post.create') }}" class="btn btn-sm btn-outline-primary my-auto mx-3">
        New post
    </a>
@endpush
@php


@endphp
@section('content')
<Page-Content  title="Posts" sub-title="Chois pour editer">
    <post-list :models="{{ $data['posts'] }}" inline-template>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="d-flex justify-content-between">
                        {{-- <h1 class="mb-4 mt-2">Posts</h1> --}}
                        <div>
                            <i-button icon="list" v-on:click.native="activeListView()"></i-button>
                            <i-button icon="grid" v-on:click.native="activeCardView()"></i-button>
                        </div>
                        <dropdown class-name="my-auto" flex="md" :content-Style='{right:"50%"}'>
                               <i-Button slot="trigger" icon="search"></i-Button>
                            <template slot="content">

                                <div   class="dropdown-menu dropdown-menu-right show py-0" style="min-width: 15rem;" >
                                        <form class="pl-2 w-100">
                                            <div class="form-group mb-0">
                                                <input v-model="search"
                                                type="text"
                                                name="q"
                                                class="form-control border-0 pl-0"
                                                id="search"
                                                placeholder="Search..."
                                                autofocus>
                                            </div>
                                        </form>
                                    </div>
                                </template>
                        </dropdown>
                    </div>

                    @if(count($data['posts']))
                    <fragment v-if="view=='card'">
                    <grid-row :cards="true" :deck="true" class="pt-5"  >
                    <grid-col sm="6" lg="4" v-for="post in filteredList">
                    <blog-card 
                    aside="true"
                    
                    :title="post.title" 
                    :img-src="post.featured_image" 
                    :author-name="post.author.name" 
                    :description="post.summary" 
                    {{-- date="{{ $post->published_at->format('M d, Y') }}" --}}
                    img-alt=""
                    {{-- avatar-img-src="https://tabler.github.io/tabler/demo/faces/female/18.jpg" --}}
                    :post-href="'/posts/' + post.id + '/edit'"
                    :avatar-img-src="post.author.avatar"
                    icon-name="link"
                    :icon-href="'{{ route('blog.post', '__slug') }}'.replace('__slug', post.slug)"
                    />
                    </grid-col>
                    <div class="d-flex justify-content-center">
                        <a href="#!" class="btn btn-link" @click="limit += 7" v-if="load">{{ __('buttons.general.load') }} <i class="fa fa-fw fa-angle-down"></i></a>
                    </div>

                    <p class="mt-4" v-if="!filteredList.length">No posts matched the given search criteria.</p>
                    </grid-row>
                    </fragment>
                        <div v-cloak v-if="view=='list'" class="pt-5"  >
                           
                            <div class="d-flex border-top py-3 align-items-center" v-for="post in filteredList">
                                <div class="mr-auto py-1">
                                    <p class="mb-1">
                                        <a :href="'/posts/' + post.id + '/edit'" class="font-weight-bold lead">@{{ post.title }}</a>
                                    </p>
                                    <p class="mb-1" v-if="post.summary">@{{ post.summary }}</p>
                                    <p class="text-muted mb-0">
                                        <span v-if="post.published_at <= new Date().toJSON().slice(0, 19).replace('T', ' ')">Published @{{post.published_at }}</span>
                                        <span v-else class="text-danger">Draft</span>
                                        ―
                                        Updated @{{ timeAgo(post.updated_at) }}
                                    </p>
                                </div>
                                <div class="ml-auto d-none d-lg-block">
                                    <a :href="'/posts/' + post.id + '/edit'">
                                        <div v-if="post.featured_image"
                                             class="mr-2"
                                             :style="{ backgroundImage: 'url(' + post.featured_image + ')' }"
                                             style="background-size: cover;width: 57px; height: 57px; -webkit-border-radius: 50%;-moz-border-radius: 50%;border-radius: 50%;"></div>
                                        <span v-else class="fa-stack fa-2x align-middle">
                                        <i class="fas fa-circle fa-stack-2x text-black-50"></i>
                                        <i class="fas fa-fw fa-stack-1x fa-camera fa-inverse"></i>
                                    </span>
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <a href="#!" class="btn btn-link" @click="limit += 7" v-if="load">{{ __('buttons.general.load') }} <i class="fa fa-fw fa-angle-down"></i></a>
                            </div>

                            <p class="mt-4" v-if="!filteredList.length">No posts matched the given search criteria.</p>
                        </div>
                    @else
                        <p class="mt-4">No posts were found, start by <a href="{{ route('post.create') }}">adding a new post</a>.</p>
                    @endif
                </div>
            </div>
        </div>
    </post-list>

</Page-Content>
  
@endsection