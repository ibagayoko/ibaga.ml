<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Process an image upload.
     */
    public function store(): string
    {
        $path = request()->image->store('posts/uploads');

        return json_encode([
        'url' => Storage::url($path),
        ]);
    }
}
