<form role="form" id="form-create" method="POST" action="{{ route('post.store') }}"
      enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" hidden value="{{ $data['id'] }}">

    <div class="form-group row my-3">
        <div class="col-lg-12">
            <textarea name="title" class="form-control-lg form-control border-0 pl-0 serif" rows="1"
                      placeholder="Title" style="font-size: 42px; resize: none;">{{ old('title') }}</textarea>
        </div>
    </div>

    <editor :unsplash="'{{ config('app.unsplash.access_key') }}'"  value="{{ old('body') }}"></editor>

    {{-- @include('components.modals.post.create.settings') --}}
    {{-- @include('components.modals.post.create.publish') --}}
    @include('components.modals.post.create.image')
    {{-- @include('components.modals.post.create.seo') --}}
</form>