@extends('layouts.dashboard')

@section('context', $data['post']->published ? 'Published' : 'Draft')
@push('headerRight')
<button href="#" form="form-edit" type="submit" class="btn btn-sm btn-outline-primary my-auto">Save and publish</button>
    
@endpush
@push('navRight')
    <a  id="sidebarCollapse" class="nav-link text-secondary" href="#" role="button">
        <i class="fe fe-sliders"></i>
    </a>
    @if($data['post']->published)
        <a href="{{ route('stats.show', $data['post']->id) }}" class="nav-link text-secondary" >Stats</a>
   @endif
@endpush

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
@section('footer')
    
@endsection


@push('scripts')
@include('components.side.post.toggle-scripts')
@endpush


@push('scripts')
    @if ($errors->has('slug') || $errors->has('summary'))
        <script type="text/javascript" defer>
            document.addEventListener('DOMContentLoaded', function () {
                $('#modal-settings').modal('show');
                showSidePastSettings()

            });
        </script>
    @endif
@endpush