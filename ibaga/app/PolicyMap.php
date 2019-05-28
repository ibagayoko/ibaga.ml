<?php

namespace App;

use App\Models\Post;
use App\Policies\PostPolicy;

trait PolicyMap
{
    /**
     * All of the model / policy mappings.
     *
     * @var array
     */
    protected function policyMap()
    {
        $this->policies = [
            Post::class => PostPolicy::class,
        ];
    }
}
