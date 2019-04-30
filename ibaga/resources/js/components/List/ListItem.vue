<template>
    <li   v-bind:class="classes">
        <slot />
    </li>
</template>

<script>
    export default {
        name:"ListItem",
        props:{
            inline:Boolean,
            className:String,
        },
        mounted() {
            console.log('List Component mounted.')
        },
        computed:{
            classes () {
            const className = {}
            className[`list-inline-item`] = this.inline
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
