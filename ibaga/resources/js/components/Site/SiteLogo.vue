<template>
    <a  class="header-brand" :href="href" v-bind:class="classes" :col-span="colSpan">
        <img class="header-brand-img" :src="src" :alt="alt" />
    </a>
</template>

<script>
    export default {
        name:"SiteLogo",
        props:{
            href:String,
            src:String,
            alt:String
        },
        mounted() {
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
