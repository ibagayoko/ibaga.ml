

<script>

    export default {
        name: "Alert",
        props: {
          className:{default:""},
          href:String,

        },
        data(){
            return {
                isDismissed: false
            }
        },
        methods:{
            _handleOnDismissClick:() => {
        if (this.props.onDismissClick) this.$emit("dismiss");
        this.isDismissed =  true 
        }
        },
        computed: {
      classObject: function () {
        return {
          "alert-link": true,
      [`${this.className}`]:true
        }
      }
    },
    }
</script>
<template>
    <a v-bind:class="classObject" :href="href">
        <slot />
    </a>
</template>
<style scoped>
</style>