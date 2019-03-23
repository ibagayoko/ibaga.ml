<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Process an image upload.
     *
     */
    public function store(): string
    {
        $path = request()->image->store(null, "images");
        return json_encode([
        'url' => Storage::disk("images")->url($path),
        ]);
    }
}
