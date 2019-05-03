<template>
    <div   v-bind:class="classes">
        <slot />
    </div>
</template>

<script>
    export default {
        name:"ListGroup",
        props:{
            transparent:Boolean,
            isCardBody:Boolean,
            className:String,
        },
        mounted() {
            // console.log('List Component mounted.')
        },
        computed:{
            classes () {
            const className = {"list-group mb-0": true}
            className[`list-group-transparent`] = this.transparent
            className[`card-list-group`] = this.isCardBody
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
