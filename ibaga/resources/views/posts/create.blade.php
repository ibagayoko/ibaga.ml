@extends('layouts.app')

@section('context', 'Creation')

@section('actions')
    <button href="#" form="form-create" type="submit" class="btn btn-sm btn-outline-primary my-auto">Save and publish</button>
    <a  id="sidebarCollapse" class="nav-link px-3 text-secondary" href="#" role="button" data="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="fas fa-sliders-h fa-fw fa-rotate-270"></i>
    </a>
@endsection

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

@push('scripts')
    @if ($errors->has('slug'))
        <script type="text/javascript">
            $(document).ready(function () {
                $('#modal-settings').modal('show');
            });
        </script>
    @endif
@endpush