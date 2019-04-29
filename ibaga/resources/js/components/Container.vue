<template>
    <div  v-bind:class="classes">
       <slot />
    </div>
</template>

<script>
    export default {
        name:"Container",
        props: ["className"],
        mounted() {
            console.log('Component mounted.')
        },
         computed:{
            classes () {
            const className = { "container":true}
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>

<style scoped>
    
@charset "UTF-8";
/**
Container customization
 */

.container.center {
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
