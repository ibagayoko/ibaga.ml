<template>
    <button v-bind:class="classes">
        <Icon v-if="social" :name="social" prefix="fa" :class-name="iconClass()" />
        <Icon v-if="icon" :name="icon" prefix="fa" :class-name="iconClass()" />
     <slot />
    </button>
</template>

<script>
import { Icon } from "../";
    export default {
        name:"IButton",
        props:{
                size:{ default:""},
    outline:Boolean,
    link:Boolean,
    block:Boolean,
    className:String,
    disabled:Boolean,
    color:{ default:""},
    square:Boolean,
    pill:Boolean,
    icon:String,
    social:{ default:""},
    loading:Boolean,
    tabIndex:Number,
    isDropdownToggle:Boolean,
    isOption:Boolean,
    to:"",
        },
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
        hasChild () {
      return !!this.$slots.default
    },
    iconClass(){
        return this.hasChild() ? 'mr-2' : ""
    },
        classes () {
            const className = {btn: true}


            className[`btn-block`] = this.block,
            className[`btn-outline-${color}`] = this.outline && !!this.color,
            className[`btn-link`]= this.link,
            className["disabled"] = this.disabled,
            className[`btn-${color}`] = !!this.color && !this.outline,
            className[`btn-${social}`] = !!this.social,
            className["btn-square"]= this.square,
            className["btn-pill"]= this.pill,
            className["btn-icon"]= !this.children,
            className["btn-loading"]= this.loading,
            className["dropdown-toggle"]= this.isDropdownToggle,
            className["btn-option"]= this.isOption,

            className[`btn-outline-${this.type}`] = this.outline
            className[`btn-${this.type}`] = !this.outline

            className[`btn-${this.size}`] = !!this.size

            className[`${this.className}`] = true
            return className
        }
    }
    }
</script>
