<?php

namespace App\Models;

class Email extends AbstractModel
{
    /**
     * The attributes that should be casted.
     *
     * @var array
     */
    protected $casts = [
        'attachments' => 'array',
    ];
}
