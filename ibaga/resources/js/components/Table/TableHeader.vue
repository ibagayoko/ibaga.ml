<template>
    <thead v-bind:class="classes">
        <slot />
    </thead>
</template>

<script>
    export default {
        name:"TableHeader",
        props:{
            className:String,
        },
        mounted() {
            console.log('TableHeader Component mounted.')
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
