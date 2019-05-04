<script type="text/javascript">
        let fadebg ;
        function hideSidePostSettings() {

            // hide sidebar
            $('#sidebar').removeClass('settings-menu-expanded');
            $("#subview").addClass('settings-menu-pane-out-right');
            // hide overlay
            $("#subview").removeClass('settings-menu-pane-in');
            // remove the overlay
            $('body').removeClass('overlay modal-open');
            $('.modal-backdrop.show').remove()
        }

        function showSidePastSettings(){
            // open sidebar
            $('#sidebar').addClass('settings-menu-expanded');
            // fade in the overlay
            $('body').addClass('overlay modal-open');
            fadebg.on("click", hideSidePostSettings)
            $('body').append(fadebg)
        }

    document.addEventListener('DOMContentLoaded', function () {
        fadebg = $('<div class="modal-backdrop fade show"></div>')


        $(`#dismiss,
            .modal-backdrop, 
            button.close-side-settings`)
            .on('click', hideSidePostSettings);
        
        
        $('#sidebarCollapse').on('click', showSidePastSettings);

        $("button[data-subview-back]").on('click', function(){
        //    back from a subview of the sidebar
            $("#subview").addClass('settings-menu-pane-out-right')
            $("#subview").removeClass('settings-menu-pane-in');
        })

        $('.toggle-subview').on('click', function () {
            console.log('click sub')
            // open a subview sidebar 
            $("#subview").removeClass('settings-menu-pane-out-right')
            $("#subview>div").removeClass('active');
            $("#subview").addClass('settings-menu-pane-in');
            $($(this).data('sub-target')).addClass('active');
        });
        // hidden sidebar from the sart
        hideSidePostSettings();
    });


</script>