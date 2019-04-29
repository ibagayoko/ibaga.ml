<template>
    <div v-bind:class="classes">
        <PageTitle v-if="title" >{{ title }}</PageTitle>
        <PageSubTitle v-if="subTitle" >{{ subTitle }}</PageSubTitle>
        <PageOptions v-if="options" >{{ options }}</PageOptions>
        <slot />
    </div>
</template>

<script>
import {PageTitle, PageOptions, PageSubTitle} from './';
    export default {
        name:"PageHeader",
        components:{
            PageTitle, PageOptions, PageSubTitle
        },
        props:{
            className:String,
            title:String,
            subTitle:String,
            options:String,
        },
        mounted() {
            console.log('PageHeader Component mounted.')
        },
        computed:{
            classes () {
            const className = {"page-header": true}
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
