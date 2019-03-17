@extends('layouts.app')

@section('context', $data['post']->published ? 'Published' : 'Draft')

@section('actions')
    <a href="#" class="btn btn-sm btn-outline-primary my-auto" data-toggle="modal" data-target="#modal-publish">Save and publish</a>

    <div class="dropdown">
        <a id="navbarDropdown" class="nav-link px-3 text-secondary" href="#" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="fas fa-sliders-h fa-fw fa-rotate-270"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            @if($data['post']->published)
                <a href="{{ route('stats.show', $data['post']->id) }}" class="dropdown-item">View stats</a>
                <div class="dropdown-divider"></div>
            @endif
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-settings">General settings</a>
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-image">Featured image</a>
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-seo">SEO & Social</a>
            <a href="#" class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete">Delete</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('components.forms.post.edit')
                @include('components.modals.post.delete')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if ($errors->has('slug'))
        <script type="text/javascript">
            $(function () {
                $('#modal-settings').modal('show');
            });
        </script>
    @endif
@endpush
