<script type="text/ecmascript">
    export default {
        props:["flex", "isOption", "desktopOnly", "className", "position", "contentStyle"],
        data() {
            return {
                shouldShowContent: false,
                isOpen:false
            }
        },
        watch: {
            shouldShowContent(val) {
                if (val) {
                    this.$emit('showing');
                }
            }
        },
        methods: {
            toggle() {
                this.shouldShowContent =this.isOpen= !this.shouldShowContent;
            },
            hide() {
                this.shouldShowContent=this.isOpen= false;
            },
        },
        computed:{
            classes(){
                return   {
        dropdown: true,
        "d-none": this.desktopOnly,
        "d-md-flex": this.desktopOnly || this.flex === "md",
        [`d-${this.flex}-flex`]: ["xs", "sm", "lg", "xl"].includes(this.flex),
        "d-flex": this.flex === true,
        "card-options-dropdown": this.isOption,
        show: this.isOpen,
        [`${this.className}`]:true
      }
            }
        }
    }
</script>

<template>
    <div v-click-outside="hide" v-bind:class="classes">
        <div v-on:click.prevent="toggle">
            <slot name="trigger"></slot>
        </div>
         <div :style="contentStyle" >
        <slot name="content" v-if="shouldShowContent"></slot>
         </div>
    </div>
</template>
<style>
.dropleft .dropdown-menu {
    top: 100%;
    right: 100%;
    left: auto;
    margin-top: 0;
    margin-right: -2rem;
}
.dropdown-menu-arrow.dropdown-menu-center:before,
.dropdown-menu-arrow.dropdown-menu-center:after {
  left: 50%;
  right: 50%;
}
.dropcenter .dropdown-menu {
    top: 1.75rem;
    /* right: 50%; */
    left: 50%;
    margin-top: 12px;
    margin-left: 0.125rem;
}
</style>
