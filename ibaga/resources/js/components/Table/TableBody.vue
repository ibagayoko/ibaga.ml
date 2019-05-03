<template>
    <tbody v-bind:class="classes" :col-span="colSpan">
        <slot />
    </tbody>
</template>

<script>
    export default {
        name:"TableBody",
        props:{
            className:String,
            colSpan:Boolean
        },
        mounted() {
            // console.log('TableBody Component mounted.')
        },
        computed:{
            classes () {
            const className = {}
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
