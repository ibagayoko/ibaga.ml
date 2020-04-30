<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends AbstractModel
{
    //
    use SoftDeletes;
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
    protected $table = 'topics';
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Get the posts relationship.
     *
     * @return HasManyThrough
     */
    public function posts(): HasManyThrough
    {
        return $this->HasManyThrough(
            Post::class,
            PostsTopics::class,
            'topic_id', // Foreign key on posts_topics table...
            'id', // Foreign key on posts table...
            'id', // Local key on topics table...
            'post_id' // Local key on posts_topics table...
        );
    }
}
