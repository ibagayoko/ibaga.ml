<script type="text/ecmascript">
    export default {
        name:"Stamp",
        props:{
              className: String,
              icon: String,
              color: {type:String, default:""},
              size:{type:String, default:"md"}
        },
        data() {
            return {}
        },
        created() {
        },
        computed: {
            classes:function(){
                return {
                    stamp:true,
                    [`stamp-${this.size}`]:this.size,
                    [`bg-${this.color}`]:this.color,
                    [`${this.className}`]:true
                }
            }
        },
        methods: {}
    }
</script>

<template>
        <span v-bind:class="classes">
            <Icon v-if="icon" :name="icon" />
                  <slot />
        </span>
</template>