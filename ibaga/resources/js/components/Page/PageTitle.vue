<template>
    <h1 v-bind:class="classes">
        <slot />
    </h1>
</template>

<script>
    export default {
        name:"PageTitle",
        props:{
            className:String,
        },
        mounted() {
            console.log('Page Component mounted.')
        },
        computed:{
            classes () {
            const className = {"page-title": true}
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
