<template>
    <tr v-bind:class="classes">
        <slot />
    </tr>
</template>

<script>
    export default {
        name:"TableRow",
        props:{
            className:String,
        },
        mounted() {
            // console.log('TableRow Component mounted.')
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
