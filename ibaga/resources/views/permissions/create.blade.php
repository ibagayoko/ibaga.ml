@extends('layouts.dashboard')
@php
    $links =[];
    $linksName = [];
@endphp

@push('navRight')

{{-- <button href="#" form="add-permission-form" type="submit" class="btn btn-sm btn-outline-primary my-auto">Save and publish</button> --}}

@endpush

@section('content')
<Page-Content title="{{ __('Add Permission') }}" >
        <Grid-Row :cards="true" :deck="true">
                <Grid-Col width=12>
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                             @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                             @endforeach
                          </ul>
                        </div>
                      @endif
                  <Card>
                     
                      <form method="POST" name="add-permission-form" action="{{ route('permissions.store') }}">
                            <card-Body>
                                @csrf
                                <Form-Group is-required="true" label="Name">
                                    <Form-Input
                                    type="text"
                                    required
                                    placeholder="{{ __("permission.form.name") }}"
                                    name="name"
                                    value="{{ old('name') }}"
                                    />
                                </Form-Group>
                            
                               
                                <form-group label="Role">
                                    <role-select :roles="{{ $data['roles'] }}" :assigned="{{ json_encode(old('roles',null)) }}"></role-select>
                                </form-group>

                            </card-Body>
                            <card-Footer class-name="text-right">
                                <i-Button type="submit" color="primary">
                                    Add Permission
                                </i-Button>
                            </Card-Footer>
                      </form>
                  </Card>
</Page-Content>
@endsection

@push('scripts')
<script defer>
document.addEventListener('DOMContentLoaded', function(){ 
        
        $(document).ready(function() {
            $('#dataTable').DataTable();
        } );
    }, false)
      </script>
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function(){ 
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '{{ route('permissions.destroy', ['permission' => '__permission']) }}'.replace('__permission', $(this).data('id'));
            $('#delete_modal').modal('show');
        });
    }, false)
    </script>
@endpush