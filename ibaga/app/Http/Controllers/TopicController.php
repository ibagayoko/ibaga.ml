<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TopicController extends Controller
{
    /**
     * Get all of the topics.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'topics' => Topic::orderByDesc('created_at')->withCount('posts')->get(),
        ];

        return view('topics.index', compact('data'));
    }

    /**
     * Create a new topic.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'id' => Str::uuid(),
        ];

        return view('topics.create', compact('data'));
    }

    /**
     * Edit a given topic.
     *
     * @param string $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $data = [
            'topic' => Topic::findOrFail($id),
        ];

        return view('topics.edit', compact('data'));
    }

    /**
     * Save a new topic.
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

        $messages = [
            'unique' => __('validation.unique'),
        ];

        validator($data, [
            'name' => 'required',
            'slug' => 'required|'.Rule::unique('topics', 'slug')->ignore(request('id')).'|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i',
        ], $messages)->validate();

        $topic = new Topic(['id' => request('id')]);
        $topic->fill($data);
        $topic->save();

        return redirect(route('topic.edit', $topic->id))->with('notify', __('nav.notify.success'));
    }

    /**
     * Save a given topic.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(string $id)
    {
        $topic = Topic::findOrFail($id);

        $data = [
            'id'   => request('id'),
            'name' => request('name'),
            'slug' => request('slug'),
        ];

        $messages = [
            'unique' => __('validation.unique'),
        ];

        validator($data, [
            'name' => 'required',
            'slug' => 'required|'.Rule::unique('topics', 'slug')->ignore(request('id')).'|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/i',
        ], $messages)->validate();

        $topic->fill($data);
        $topic->save();

        return redirect(route('topic.edit', $topic->id))->with('notify', __('nav.notify.success'));
    }

    /**
     * Delete a given topic.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect(route('topic.index'));
    }
}
