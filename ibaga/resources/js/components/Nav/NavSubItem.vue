<template>
    <DropdownItem :to="to" :icon="icon"   v-bind:class="classes">
    {{ value }}   
        <slot />
    </DropdownItem>
</template>

<script>
import {Icon} from '../'
    export default {
        name:"NavSubItem",
        props:{
            icon:String,
            className:String,
            to:String,
            value:String,
            hasSubNav:String
        },
        mounted() {
            // console.log('NavSubItem Component mounted.')
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
