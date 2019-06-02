<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('can:view,'.Post::class, ['only' => ['show']]);
        $this->middleware('can:create,'.Post::class, ['only' => ['create', 'store']]);
        $this->middleware('can:update,'.Post::class, ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete,'.Post::class, ['only' => ['destroy']]);
        // $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Return posts.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = [
            'posts' => Post::orderByDesc('created_at')->with(['tags', 'author'])->get(),
        ];

        return view('posts.index', compact('data'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'id'     => Str::uuid(),
            'tags'   => Tag::all(),
            'topics'   => Topic::all(),
        ];

        return view('posts.create', compact('data'));
    }

    /**
     * Show the form for editing an existing post.
     *
     * @param string $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        $data = [
            'post'   => $post,
            'meta'   => $post->meta,
            'tags'   => Tag::all(),
            'topics' => Topic::all(),
        ];

        return view('posts.edit', compact('data'));
    }

    /**
     * Store a newly created post in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $data = [
            'id'                     => request('id'),
            'slug'                   => request('slug'),
            'title'                  => request('title', 'Post Title'),
            'summary'                => request('summary', null),
            'body'                   => request('body', null),
            'published_at'           => Carbon::parse(request('published_at'))->toDateTimeString(),
            'published'              => request('published', 'off') == 'on' ? true : false,
            'featured_image'         => request('featured_image', null),
            'featured_image_caption' => request('featured_image_caption', null),
            'user_id'                => auth()->user()->id,
            'meta'                   => [
                'meta_description'    => request('meta_description', null),
                'og_title'            => request('og_title', null),
                'og_description'      => request('og_description', null),
                'twitter_title'       => request('twitter_title', null),
                'twitter_description' => request('twitter_description', null),
            ],
        ];

        validator($data, [
            'title'        => 'required',
            'slug'         => 'required|'.Rule::unique('posts', 'slug')->ignore(request('id')).'|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i',
            'published_at' => 'required|date',
            'user_id'      => 'required',
            'summary'      => 'required',
        ])->validate();

        $post = new Post(['id' => request('id')]);
        $post->fill($data);
        $post->meta = $data['meta'];
        $post->save();

        if (! is_null(request('tags'))) {
            $post->tags()->sync(
                $this->collectTags(request('tags') ?? [])
            );
        }

        if (! is_null(request('topic'))) {
            $post->topic()->sync(
                $this->assignTopics([request('topic')] ?? [])
            );
        }

        return redirect(route('post.edit', $post->id))->with('notify', 'Saved!');
    }

    /**
     * Update a post in storage.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(string $id)
    {
        $post = Post::findOrFail($id);

        $data = [
            'id'                     => request('id'),
            'slug'                   => request('slug'),
            'title'                  => request('title', $post->title),
            'summary'                => request('summary', $post->summary),
            'body'                   => request('body', $post->body),
            'published_at'           => Carbon::parse(request('published_at'))->toDateTimeString(),
            'published'              => request('published', false) ? true : false,
            'featured_image'         => request('featured_image', $post->featured_image),
            'featured_image_caption' => request('featured_image_caption', $post->featured_image_caption),
            'user_id'                => $post->user->id,
            'meta'                   => [
                'meta_description'    => request('meta_description', null),
                'og_title'            => request('og_title', null),
                'og_description'      => request('og_description', null),
                'twitter_title'       => request('twitter_title', null),
                'twitter_description' => request('twitter_description', null),
            ],
        ];

        validator($data, [
            'title'        => 'required',
            'slug'         => 'required|'.Rule::unique('posts', 'slug')->ignore($id).'|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i',
            'published_at' => 'required',
            'user_id'      => 'required',
        ])->validate();

        $post->fill($data);
        $post->meta = $data['meta'];
        $post->save();

        if (! is_null(request('tags'))) {
            $post->tags()->sync(
                $this->collectTags(request('tags') ?? [])
            );
        }

        if (! is_null(request('topic'))) {
            $post->topic()->sync(
                $this->assignTopics([request('topic')] ?? [])
            );
        }

        return redirect(route('post.edit', $post->id))->with('notify', 'Saved!');
    }

    /**
     * Soft delete a post in storage.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect(route('post.index'));
    }

    /**
     * Collect tags from the request.
     *
     * @param array $incomingTags
     *
     * @return array
     *
     * @source https://gihtub.com/writingink/wink
     */
    private function collectTags(array $incomingTags): array
    {
        $tags = Tag::all();

        return collect($incomingTags)->map(function ($incomingTag) use ($tags) {
            $tag = $tags->where('slug', $incomingTag['slug'])->first();

            if (! $tag) {
                $tag = Tag::create([
                    'id'   => $id = Str::uuid(),
                    'name' => $incomingTag['name'],
                    'slug' => $incomingTag['slug'],
                ]);
            }

            return (string) $tag->id;
        })->toArray();
    }

    /**
     * Assign a post to a selected topic.
     *
     * @param array $incomingTopics
     *
     * @return array
     *
     * @source https://gihtub.com/writingink/wink
     */
    private function assignTopics(array $incomingTopics): array
    {
        $topics = Topic::all();

        return collect($incomingTopics)->map(function ($incomingTopic) use ($topics) {
            $topic = $topics->where('slug', $incomingTopic['slug'])->first();

            if (! $topic) {
                $topic = Topic::create([
                    'id'   => $id = Str::uuid(),
                    'name' => $incomingTopic['name'],
                    'slug' => $incomingTopic['slug'],
                ]);
            }

            return (string) $topic->id;
        })->toArray();
    }
}
