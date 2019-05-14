<script type="text/ecmascript-6">


    export default {
        props: {className:String},

        data() {
            return {
            }
        },
        computed:{
            classes(){
                return {
                [`media-list`]: true,
                [`${this.className}`]: this.className,
                }
            }
        }
    }
</script>

<template>
    <ul v-bind:class="classes">
        <slot/>
    </ul>
</template>