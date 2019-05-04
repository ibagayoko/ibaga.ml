<template>
    <a :href="to" :ref="rootRef"  v-bind:class="classes">
        <Icon v-if="icon" :name="icon"/>{{ " " }}
        <slot />
    </a>
</template>

<script>
    export default {
        name:"NavLink",
        props:{
            active:{default:false},
            icon:String,
            className:String,
            to:String,
            hasSubNav:Boolean,
            rootRef:String,
            useExact:Boolean,
        },
        mounted() {
            // console.log('NavLink Component mounted.')
        },
        computed:{
            classes () {
            const className = {"nav-link":true}
            className[`active`] = this.active
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
