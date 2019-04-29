<template>
    <td v-bind:class="classes" :col-span="colSpan">
        <slot />
    </td>
</template>

<script>
    export default {
        name:"TableCol",
        props:{
            className:String,
            colSpan:String,
            alignContent:String
        },
        mounted() {
            console.log('TableCol Component mounted.')
        },
        computed:{
            classes () {
            const className = {}
            className[`text-${this.alignContent}`] = this.alignContent
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
