<template>
    <a :href="to"   v-bind:class="classes">
        <span v-if="icon" class="mr-3 icon">
            <Icon prefix="fe" :name="icon"/>{{ " " }}
        </span>
        <slot />
    </a>
</template>

<script>
import {Icon} from '../'
    export default {
        name:"ListIGrouptem",
        props:{
            active:Boolean,
            action:Boolean,
            icon:Boolean,
            className:String,
            to:String
        },
        mounted() {
            // console.log('ListIGrouptem Component mounted.')
        },
        computed:{
            classes () {
            const className = {"list-group-item":true}
            className[`list-group-item`] = this.action
            className[`active`] = this.active
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
