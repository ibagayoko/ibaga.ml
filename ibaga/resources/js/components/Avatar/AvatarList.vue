<template>
    <div  v-bind:class="classes">
        <slot />
    </div>
</template>

<script>
    export default {
        name:"AvatarList",
        props:["stacked", "className"],
        mounted() {
            console.log('Component mounted.')
        },

        computed:{
            lasses () {
            const className = { "avatar-list":true}


            className["avatar-list-stacked"] = this.stacked
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
