<script type="text/ecmascript">
    export default {
        name:"ProgressBar",
        props:{
              className: String,
              color: String,
              width: Number,
        },
        data() {
            return {}
        },
        created() {
        },
        computed: {
            classes:function(){
                return {
                    "`progress-bar":true,
                    [`bg-${this.color}`]: !!this.color ,
                    [`${this.className}`]:true
                }
            }
        },
        methods: {}
    }
</script>

<template>
        <div :class="classes" :style="{ width: `${width}%` }">
      <slot />
    </div>
</template>