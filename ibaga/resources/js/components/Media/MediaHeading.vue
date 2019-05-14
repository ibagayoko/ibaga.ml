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
                [`media-heading`]: true,
                [`${this.className}`]: this.className,
                }
            }
        }
    }
</script>

<template>
    <div v-bind:class="classes">
        <slot/>
    </div>
</template>