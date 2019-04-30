<template>
    <div    v-bind:class="classes">
        <slot />
    </div>
</template>

<script>
    export default {
        name:"NavSubmenu",
        props:{
            className:String,
        },
        mounted() {
            console.log('NavSubmenu Component mounted.')
        },
        computed:{
            classes () {
            const className = {"nav":true}
            className[`nav-submenu`] = true
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
