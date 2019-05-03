<template>
    <ul   v-bind:class="classes">
        <slot />
    </ul>
</template>

<script>
    export default {
        name:"List",
        props:{
            unstyled:Boolean,
            seperated:Boolean,
            inline:Boolean,
            className:String,
        },
        mounted() {
            // console.log('List Component mounted.')
        },
        computed:{
            classes () {
            const className = {}
            className[`list`] = !this.unstyled
            className[`list-unstyled`] = this.unstyled
            className[`list-seperated`] = this.seperated
            className[`list-inline`] = this.inline
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
