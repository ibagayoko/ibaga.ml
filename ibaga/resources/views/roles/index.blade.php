@extends('layouts.dashboard')
@php
    $links =[];
    $linksName = [];
@endphp

@push('navRight')

<a href="{{ route('roles.create') }}" class="btn btn-sm btn-outline-primary my-auto mx-3">
    <i class="fe fe-plus"></i> {{ __('generic.add_new') }}
</a>
@endpush

@section('content')
<Page-Content title="{{ __('Roles') }}" >
        <Grid-Row :cards="true" :deck="true">
                <Grid-Col width=12>
                        <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Users</a>
                        <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
                        <hr>
                  <Card>
                    <I-Table
                    tid="dataTable" 
                      :responsive="true"
                      :highlight-Row-On-Hover="true"
                      has-Outline
                      vertical-Align="center"
                      :cards="true"
                      class-Name="text-nowrap"
                    >

                    <Table-Header slot=header>
                            <Table-Row>
                              <Table-Col-Header>Role</Table-Col-Header>
                              <Table-Col-Header>Permission</Table-Col-Header>
                                <Table-Col-Header></Table-Col-Header>
                            </Table-Row>
                    </Table-Header>
                    <Table-Body>
                        @foreach ($data["roles"] as $item)
                            
                        <Table-Row>
                            <Table-Col>{{ $item->name}}</Table-Col>
                            <Table-Col>{{ str_replace(array('[',']','"'),'', $item->permissions()->pluck('name')) }}</Table-Col>
                            <Table-col  align-Content="right">
                               
                                    <i-Button
                                      color="secondary"
                                      size="sm"
                                      icon="edit"
                                      :link="true"
                                      root-tag="a"
                                      to="{{ route('roles.edit', $item->id) }}"
                                      >
                                      {{ __('generic.edit') }}
                                    </i-Button>
                                    <i-Button  data-id="{{ $item->id }}" size="sm" class-name="delete" color="danger" icon="trash" :link="true">
                                            {{ __('generic.delete') }}
                                    </i-Button>
                                </Table-col>
                        </Table-Row>
                        @endforeach
                    </Table-Body>
                    </I-Table>
                  </Card>
                </Grid-Col>
        </Grid-Row>
                    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('generic.close') }}">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title">
                                            <i class="fe fe trash"></i> {{ __('generic.delete_question') }} Menu ?
                                        </h4>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="#" id="delete_form" method="POST">
                                            {{ method_field("DELETE") }}
                                            {{ csrf_field() }}
                                            <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('generic.delete_this_confirm') }} Menu">
                                        </form>
                                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('generic.cancel') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            $('#delete_form')[0].action = '{{ route('roles.destroy', ['role' => '__role']) }}'.replace('__role', $(this).data('id'));
            $('#delete_modal').modal('show');
        });
    }, false)
    </script>
@endpush