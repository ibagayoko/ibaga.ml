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