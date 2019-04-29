<template>
    <div v-bind:class="classes">
        <slot />
    </div>
</template>

<script>
    export default {
        name:"PageOptions",
        props:{
            className:String,
        },
        mounted() {
            console.log('Page Component mounted.')
        },
        computed:{
            classes () {
            const className = {"page-options d-flex": true}
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
