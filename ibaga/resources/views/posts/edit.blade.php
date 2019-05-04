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
        {{-- <div class="dropdown-divider"></div> --}}
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
    @if ($errors->has('slug'))
        <script type="text/javascript">
            $(document).ready(function () {
                $('#modal-settings').modal('show');
            });
        </script>
    @endif
@endpush

@push('scripts')
<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function () {
        // $("#sidebar").mCustomScrollbar({
        //     theme: "minimal"
        // });
        function hideSidePostSettings() {

            // hide sidebar
            $('#sidebar').removeClass('settings-menu-expanded');
            $("#subview").addClass('settings-menu-pane-out-right');
            // hide overlay
            $("#subview").removeClass('settings-menu-pane-in');
            $('.overlay').removeClass('active');
        }

        $('#dismiss, .overlay, button.close-side-settings').on('click', function () {
            hideSidePostSettings();
        });
        hideSidePostSettings();
        
        $('#sidebarCollapse').on('click', function () {
            console.log('click')
            // open sidebar
            $('#sidebar').addClass('settings-menu-expanded');
            // fade in the overlay
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });

        $("button[data-subview-back]").on('click', function(){
            console.log('back')
            $("#subview").addClass('settings-menu-pane-out-right')
            $("#subview").removeClass('settings-menu-pane-in');
        })

        $('.toggle-subview').on('click', function () {
            console.log('click sub')
            // // open sidebar
            // $('#sidebar').addClass('settings-menu-pane-out-left');
            // // fade in the overlay
            // $('.overlay').addClass('active');
            // $('.collapse.in').toggleClass('in');
            $("#subview").removeClass('settings-menu-pane-out-right')
            $("#subview>div").removeClass('active');
            $("#subview").addClass('settings-menu-pane-in');
            $($(this).data('sub-target')).addClass('active');
        });
    });
</script>
@endpush