@extends('layouts.app')

@section('context', $data['post']->published ? 'Published' : 'Draft')

@section('actions')
    <button href="#" form="form-edit" type="submit" class="btn btn-sm btn-outline-primary my-auto">Save and publish</button>
    <a  id="sidebarCollapse" class="nav-link px-3 text-secondary" href="#" role="button" data="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="fas fa-sliders-h fa-fw fa-rotate-270"></i>
    </a>
    @if($data['post']->published)
        <a href="{{ '#'/*route('stats.show', $data['post']->id)*/ }}" class="nav-link px-3 text-secondary" >View stats</a>
        <div class="dropdown-divider"></div>
   @endif
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('components.forms.post.edit')
            </div>
        </div>
        @include('components.side.post.edit')
        @include('components.modals.post.delete')

    </div>
@endsection

@push('scripts')
    @if ($errors->has('slug'))
        <script type="text/javascript">
            $(document).ready(function () {
                $('#modal-settings').modal('show');
            });
        </script>
    @endif
@endpush