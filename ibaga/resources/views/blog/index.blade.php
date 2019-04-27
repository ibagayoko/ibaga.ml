@extends('blog.layouts.app')

@section('title', sprintf('%s — %s', config('app.name'), 'Blog'))

@push('styles')
    @include('blog.partials.styles')
@endpush

@section('actions')
    <a href="{{ route('post.create') }}" class="btn btn-sm btn-outline-primary">
        New post
    </a>
@endsection
@section('body')
    <div class="container">
        @include('blog.partials.navbar')

        @if($data['topics']->isNotEmpty())
            <div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-between">
                    @foreach($data['topics'] as $topic)
                        <a class="p-2 text-muted" href="{{ route('blog.topic', $topic->slug) }}">{{ $topic->name }}</a>
                    @endforeach
                </nav>
            </div>
        @endif

        @if(count($data['posts']) > 0)
            @foreach($data['posts'] as $post)
                @if($loop->first)
                    <div class="jumbotron p-4 p-md-5 text-white rounded @if(empty($post->featured_image)) bg-dark @endif"
                         @if(!empty($post->featured_image)) style="background: linear-gradient(rgba(0, 0, 0, 0.85),rgba(0, 0, 0, 0.85)),url({{ $post->featured_image }}); background-size: cover" @endif>
                        <div class="col-md-8 px-0">
                            <h1 class="display-4 font-italic"><a href="{{ route('blog.post', $post->slug) }}"
                                                                 class="text-white text-decoration-none">{{ $post->title }}</a>
                            </h1>
                            <p class="lead my-3"><a href="{{ route('blog.post', $post->slug) }}"
                                                    class="text-white text-decoration-none">{{ $post->summary }}</a></p>
                            <p class="lead mb-0"><a href="{{ route('blog.post', $post->slug) }}"
                                                    class="text-white font-weight-bold">Continue reading...</a></p>
                        </div>
                    </div>
                    
                @endif
            @endforeach
        @endif
    </div>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    Recent posts
                </h3>
                <div class="row">
                @if(count($data['posts']) > 0)
                    @foreach($data['posts'] as $post)
                        {{-- @if(!$loop->first)
                            <div class="blog-post col-md-5 mr-1 ml-1 @if(empty($post->featured_image)) bg-dark @endif"  @if(!empty($post->featured_image)) style="background: linear-gradient(rgba(0, 0, 0, 0.85),rgba(0, 0, 0, 0.85)),url({{ $post->featured_image }}); background-size: cover" @endif>
                                <h2 class="blog-post-title"><a href="{{ route('blog.post', $post->slug) }}" class="text-white text-decoration-none">{{ $post->title }}</a></h2>
                                <p class="blog-post-meta small">{{ $post->published_at->format('M d') }} — {{ $post->readTime }}</p>
                                <p><a href="{{ route('blog.post', $post->slug) }}" class="text-white text-decoration-none">{{ $post->summary }}</a></p>
                            </div>
                        @endif --}}
                        <blog-card 
                        
                        title="{{ $post->title  }}" 
                        img-src="{{ $post->featured_image }}" 
                        author-name="{{ $post->author->name }}" 
                        description="{{ $post->summary }}" 
                        date="{{ $post->published_at->format('M d, Y') }}"
                        img-alt=""
                        {{-- avatar-img-src="https://tabler.github.io/tabler/demo/faces/female/18.jpg" --}}
                        post-href="{{ route('blog.post', $post->slug) }}"
                        avatar-img-src="{{ sprintf('%s%s%s', 'https://secure.gravatar.com/avatar/', md5(strtolower(trim($post->author->email))), '?s=200') }}"
                        />
                        {{-- <div class=" col-md-12 mr-1 ml-1 my-1"> --}}

                            {{-- @include('blog.partials.gradient-card', ["post" => $post]) --}}
                        {{-- </div> --}}
                    @endforeach

                    
                @else
                    <p class="mt-4">No posts were found, start by <a href="{{ route('post.create') }}">adding a
                            new post</a>.</p>
                @endif

                </div>
                {{ $data['posts']->links() }}

            </div>

            <aside class="col-md-4 blog-sidebar">
                <div class="p-4">
                    <h4 class="font-italic">Tags</h4>
                    <ol class="list-unstyled mb-0">
                        @foreach($data['tags'] as $tag)
                            <li><a href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a></li>
                        @endforeach
                    </ol>
                </div>
            </aside>
        </div>
    </main>
@endsection