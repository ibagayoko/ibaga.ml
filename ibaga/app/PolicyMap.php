<?php

namespace App;

use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;

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
            User::class => UserPolicy::class,
        ];
    }
}
