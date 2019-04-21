<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
