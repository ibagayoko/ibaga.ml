<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\View;

class HomeController extends Controller
{
    /**
     * The number of days to generate statistics for.
     *
     * @const int
     */
    const DAYS_PRIOR = 30;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::withCount('views')->orderByDesc('created_at')->paginate();
        $tags  = Tag::all();
        $users = User::all();
        $views = View::whereBetween('created_at', [
            now()->subDays(self::DAYS_PRIOR)->toDateTimeString(),
            now()->toDateTimeString(),
        ])->select('created_at')->get();

        $collection = collect(View::viewTrend($views, self::DAYS_PRIOR));
        $values = $collection->values();
        $keys = $collection->keys();

        $keys = $keys->all();

        $values = $values->all();

        $data = [
            'posts' => [
                'all'       => $posts,
                'count'    => [
                    'total' => $posts->count(),
                    'published' => $posts->where('published_at', '<=', now()->toDateTimeString())->count(),
                    'drafts'    => $posts->where('published_at', '>', now()->toDateTimeString())->count(),
                    ],
            ],
            'tags' => [
                'all' => $tags,
                'count' => $tags->count(),
            ],
            'users' => [
                'all' => $users,
                'count' => $users->count(),
            ],
            'views' => [
                'count' => $views->count(),
                'trend' => [
                    ["x"] + $keys, 
                    ["data1"]+ $values
                ], //json_encode([["x"]+ $keys, ["data1"]+$values]),
            ],
        ];

       

        return view('home', compact('data'));
    }
}
