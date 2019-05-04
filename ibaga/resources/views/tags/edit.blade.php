@extends('layouts.dashboard')

@push('navRight')
    <a href="#" class="btn btn-sm btn-outline-primary my-auto"
       onclick="event.preventDefault();document.getElementById('form-edit').submit();"
       aria-label="Save">Save changes</a>

    <Dropdown>
        {{-- <template slot="trigger"> --}}

            <a id="" class="nav-link px-3 text-secondary leading-none"  slot="trigger" href="#" role="button" aria-haspopup="true" aria-expanded="false" >
                <icon name="sliders"></icon>
            </a>
        {{-- </template> --}}

        <div slot="content" class="dropdown-menu dropdown-menu-right show" aria-labelledby="dropdownMenuButton">
            <a href="#" class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete">Delete</a>
        </div>
    </Dropdown>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('components.forms.tag.edit')
                @include('components.modals.tag.delete')
            </div>
        </div>
    </div>
@endsection

@section('footer')
    
@endsection