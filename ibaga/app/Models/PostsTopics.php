<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PostsTopics extends Pivot
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts_topics';
}
