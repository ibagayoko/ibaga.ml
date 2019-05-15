<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;

class TagController extends Controller
{
    /**
     * Show a paginated list of tags.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'tags' => Tag::orderByDesc('created_at')->withCount('posts')->get(),
        ];

        return view('tags.index', compact('data'));
    }

    /**
     * Show the form for creating a new tag.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'id' => Str::uuid(),
        ];

        return view('tags.create', compact('data'));
    }

    /**
     * Show the form for editing a tag.
     *
     * @param string $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $data = [
            'tag' => Tag::findOrFail($id),
        ];

        return view('tags.edit', compact('data'));
    }

    /**
     * Store a newly created tag in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $data = [
            'id'   => request('id'),
            'name' => request('name'),
            'slug' => request('slug'),
        ];

        validator($data, [
            'name' => 'required',
            'slug' => 'required|'.Rule::unique('tags', 'slug')->ignore(request('id')).'|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i',
        ])->validate();

        $tag = new Tag(['id' => request('id')]);
        $tag->fill($data);
        $tag->save();

        return redirect(route('tag.edit', $tag->id))->with('notify', 'Saved!');
    }

    /**
     * Update a tag in storage.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(string $id)
    {
        $tag = Tag::findOrFail($id);

        $data = [
            'id'   => request('id'),
            'name' => request('name'),
            'slug' => request('slug'),
        ];

        validator($data, [
            'name' => 'required',
            'slug' => 'required|'.Rule::unique('tags', 'slug')->ignore(request('id')).'|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i',
        ])->validate();

        $tag->fill($data);
        $tag->save();

        return redirect(route('tag.edit', $tag->id))->with('notify', 'Saved!');
    }

    /**
     * Soft delete a tag in storage.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect(route('tag.index'));
    }
}
