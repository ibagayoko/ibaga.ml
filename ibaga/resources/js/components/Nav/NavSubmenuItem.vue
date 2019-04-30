<template>
    <a :href="to"   v-bind:class="classes">
        <!-- <span v-if="icon" class="mr-3 icon"> -->
            <Icon v-if="icon" prefix="fe" :name="icon"/>{{ " " }}
        <!-- </span> -->
        <slot />
    </a>
</template>

<script>
import {Icon} from '../'
    export default {
        name:"NavSubmenuItem",
        props:{
            active:{default:false},
            icon:Boolean,
            className:String,
            to:String
        },
        mounted() {
            console.log('NavSubmenuItem Component mounted.')
        },
        computed:{
            classes () {
            const className = {"nav-item":true}
            className[`active`] = this.active
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
