<template>
    <th v-bind:class="classes" :col-span="colSpan">
        <slot />
    </th>
</template>

<script>
    export default {
        name:"TableColHeader",
        props:{
            className:String,
            colSpan:String,
            alignContent:String
        },
        mounted() {
            console.log('TableColHeader Component mounted.')
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
