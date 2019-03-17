<form role="form" id="form-edit" method="POST" action="{{ route('post.update', $data['post']->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group row my-3">
        <div class="col-lg-12">
            <textarea name="title" class="form-control-lg form-control border-0 pl-0 serif" rows="1"
                      placeholder="Title" style="font-size: 42px; resize: none;">{{ $data['post']->title }}</textarea>
        </div>
    </div>

    <editor value="{{ $data['post']->body }}" :unsplash="'{{ config('app.unsplash.access_key') }}'"></editor>

    @include('components.modals.post.edit.settings')
    @include('components.modals.post.edit.publish')
    @include('components.modals.post.edit.image')
    @include('components.modals.post.edit.seo')
</form>