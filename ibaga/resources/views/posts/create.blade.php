@extends('layouts.dashboard')

@push('styles')
@endpush



@section('context', 'Creation')

@push('navRight')
    <button href="#" form="form-create" type="submit" class="btn btn-sm btn-outline-primary my-auto">Save and publish</button>
    <a  id="sidebarCollapse" class="nav-link px-3 text-secondary" href="#" role="button" data="dropdown"
        aria-haspopup="true" aria-expanded="false" >
        <i class="fe fe-sliders"></i>
    </a>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('components.forms.post.create')
            </div>
        </div>
        @include('components.side.post.create')
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