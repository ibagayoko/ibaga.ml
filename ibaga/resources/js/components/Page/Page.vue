<template>
    <div v-bind:class="classes">
        <slot />
    </div>
</template>

<script>
    export default {
        name:"Page",
        props:{
            className:String,
            ignoreCol:Boolean
        },
        mounted() {
            console.log('Page Component mounted.')
        },
        computed:{
            classes () {
            const className = {col: !this.ignoreCol}
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
