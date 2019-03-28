<script type="text/ecmascript-6">
    // import VueNotification from "@kugatsu/vuenotification";
    export default {
        
        props: ['type', 'message', 'autoClose', 'position'],

         components: {
        },
        data() {
            return {
            }
        },
        mounted() {
            let options = { 
                     timer: this.autoClose, 
                     infiniteTimer: !this.autoClose,
                     showCloseIcn:true
                      }
            switch (this.type) {
                case 'error':
                this.$notification.error(this.message, options);
                    break;
            
                case 'new':
                this.$notification.new(this.message, options);
                    break;

                default:
                    break;
            }
        },
        methods: {
        
        }
    }
</script>

<template>

</template>

<style>
    #notificationBody {
        z-index: 99999;
        position: fixed;
        bottom: 20px;
        right: 10px;
    }
</style>