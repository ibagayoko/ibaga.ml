<template>
    <a  class="header-brand" :href="href" v-bind:class="classes" >
        <img class="header-brand-img" v-bind:src="this.src" :alt="alt" />
    </a>
</template>

<script>
    export default {
        name:"SiteLogo",
        props:{
            href:String,
            src:String,
            alt:String,
            
        },
        mounted() {
            console.log(this.src)
            console.log('SiteLogo Component mounted.')
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
