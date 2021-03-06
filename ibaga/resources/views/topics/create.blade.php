@extends('layouts.dashboard')

@push('headerRight')
    <a href="#" class="btn btn-sm btn-outline-primary my-auto mx-3"
       onclick="event.preventDefault();document.getElementById('form-create').submit();"
       aria-label="Save">{{ __('buttons.general.save') }}</a>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('components.forms.topic.create')
            </div>
        </div>
    </div>
@endsection
@section('footer')
    
@endsection