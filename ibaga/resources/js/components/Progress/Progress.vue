<script type="text/ecmascript">
    export default {
        name:"IProgress",
        props:{
              className: String,
              size: String,
        },
        data() {
            return {}
        },
        created() {
        },
        computed: {
            classes:function(){
                return {
                    progress:true,
                    [`progress-${this.size}`]: !!this.size ,
                    [`${this.className}`]:true
                }
            }
        },
        methods: {}
    }
</script>

<template>
        <div :class="classes">
      <slot />
    </div>
</template>