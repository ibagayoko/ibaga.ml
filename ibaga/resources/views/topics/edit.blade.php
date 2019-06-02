@extends('layouts.dashboard')

@push('headerRight')
    <a href="#" class="btn btn-sm btn-outline-primary my-auto"
       onclick="event.preventDefault();document.getElementById('form-edit').submit();"
       aria-label="Save">{{ __('buttons.topics.update') }}</a>

    <Dropdown>
        <a slot="trigger"  class="nav-link px-3 text-secondary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-sliders-h fa-fw fa-rotate-270"></i>
        </a>
        <div slot="content" class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a href="#" class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete">{{ __('buttons.general.delete') }}</a>
        </div>
    </Dropdown>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('components.forms.topic.edit')
                @include('components.modals.topic.delete')
            </div>
        </div>
    </div>
@endsection

@section('footer')
    
@endsection