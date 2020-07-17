<?php

namespace App\Listeners;

use App\Events\PostViewed;
use App\Models\Post;

class StoreViewData
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param PostViewed $event
     *
     * @return void
     */
    public function handle(PostViewed $event)
    {
        if (! $this->wasRecentlyViewed($event->post)) {
            $view_data = [
                'post_id' => $event->post->id,
                'ip'      => request()->getClientIp(),
                'agent'   => request()->header('user_agent'),
                'referer' => request()->header('referer'),
            ];

            $event->post->views()->create($view_data);

            $this->storeInSession($event->post);
        }
    }

    /**
     * Check if a given post exists in the session.
     *
     * @param Post $post
     *
     * @return bool
     */
    private function wasRecentlyViewed(Post $post): bool
    {
        $viewed = session()->get('viewed_posts', []);

        return array_key_exists($post->id, $viewed);
    }

    /**
     * Add the post ID into the session.
     *
     * @param Post $post
     *
     * @return void
     */
    private function storeInSession(Post $post)
    {
        $key = 'viewed_posts.'.$post->id;
        session()->put($key, time());
    }
}
