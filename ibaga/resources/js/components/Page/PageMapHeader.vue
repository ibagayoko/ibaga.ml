<template>
    <div v-bind:class="classes">
        <slot />
    </div>
</template>

<script>
    export default {
        name:"PageMapHeader",
        props:{
            className:String,
        },
        mounted() {
            // console.log('PageMapHeader Component mounted.')
        },
        computed:{
            classes () {
            const className = {"map-header": true}
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
