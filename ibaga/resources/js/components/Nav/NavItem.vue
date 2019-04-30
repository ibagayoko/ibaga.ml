<template>
    <div v-if="type==='li'" v-click-outside="hide"  v-on:click="_handlOnClick"   v-bind:class="classes">
        <!-- navlink -->
        <NavLink
          :class-name="className"
          :to="to"
          :icon="icon"
          :hasSubNav="hasSubI"
          :active="active"
          useExact="useExact"
        >
          {{ value }}
          <slot/>
        </NavLink>
        <DropDowMenu v-if="hasSubI" arrow :show="isOpen" :position="possition">
            <!-- subItems -->
            <slot name="sub-item"/>
            <NavSubItem  v-for="(item, key) in subItems" :key="key" 
            :value="item.value" :to="item.to" :icon="item.icon">
            </NavSubItem>
        </DropDowMenu>
    </div>
    <div v-else v-click-outside="hide"  v-on:click="_handlOnClick"   v-bind:class="classes">
        <!-- navlink -->
        <NavLink
          :class-name="className"
          :to="to"
          :icon="icon"
          :hasSubNav="hasSubI"
          :active="active"
          useExact="useExact"
        >
          {{ value }}
          <slot/>
        </NavLink>
        <DropDowMenu v-if="hasSubI" arrow :show="isOpen" :position="possition">
            <!-- subItems -->
            <slot name="sub-item"/>
            <NavSubItem  v-for="(item, key) in subItems" :key="key" 
            :value="item.value" :to="item.to" :icon="item.icon">
            </NavSubItem>
        </DropDowMenu>
    </div>
</template>

<script>
import {Icon} from '../'
    export default {
        name:"NavItem",
        props:{
            active:{default:false},
            icon:Boolean,
            className:String,
            value:String,
            to:String,
            href:String,
            type:String,
            hasSubNav:Boolean,
            position:String,
            subItems: []
        },
        methods:{
            data() {
                return {
                    isOpen:false
                }
            },
            _handlOnClick(){
                this.isOpen=!this.isOpen
            },
            hide() {
                this.isOpen = false;
            },
        },
        mounted() {
            console.log('NavItem Component mounted.')
        },
        computed:{
            classes () {
            const className = {"nav-item":true}
            className[`active`] = this.active
            className[`${this.className}`] = true
            return className
        },
        hasSubI(){
                return this.hasSubNav || this.subItems.length>0 || this.$slots['sub-item']
        }
        }
    }
</script>
