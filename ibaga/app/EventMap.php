<?php

namespace App;

trait EventMap
{
    /**
     * All of the event / listener mappings.
     *
     * @var array
     */
    protected $events = [
        Events\PostViewed::class => [
            Listeners\StoreViewData::class,
        ],
    ];
}
