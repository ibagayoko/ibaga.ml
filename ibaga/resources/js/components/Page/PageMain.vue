<template>
    <div v-bind:class="classes">
        <slot />
    </div>
</template>

<script>
    export default {
        name:"PageMain",
        props:{
            className:String,
        },
        mounted() {
            console.log('PageMain Component mounted.')
        },
        computed:{
            classes () {
            const className = {"page-main": true}
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
