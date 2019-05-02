<script type="text/ecmascript-6">


    export default {
        props: {color:{dafault:"primary" }, className:String},

        data() {
            return {
            }
        },
        computed:{
            classes(){
                return {
                    badge: true,
                [`badge-${this.color}`]: this.color,
                [`${this.className}`]: this.className,
                }
            }
        }
    }
</script>

<template>
    <span v-bind:class="classes">
        <slot/>
    </span>
</template>