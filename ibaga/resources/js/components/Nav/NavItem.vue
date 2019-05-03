<template>
    <li v-if="type==='li'" v-click-outside="hide"  v-on:click="_handlOnClick"   v-bind:class="classes">
        <!-- navlink -->
        <Dropdown class-name="dropcenter" :content-Style='{right:"50%"}'>
        <NavLink
            slot="trigger"
          :class-name="className"
          :to="to"
          :icon="icon"
          :hasSubNav="hasSubI"
          :active="active"
          :useExact="useExact"
        >
          {{ value }}
          <slot/>
        </NavLink>
        <div slot="content"  class="dropdown-menu dropdown-menu-left dropdown-menu-arrow show" v-if="hasSubI" arrow  >
            <!-- subItems -->
            <slot name="sub-item"/>
            <NavSubItem  v-for="(item, key) in subItems" :key="key" 
            :value="item.value" :to="item.to" :icon="item.icon">
            </NavSubItem>
        </div>
        </Dropdown>
    </li>
    <div v-else v-click-outside="hide"  v-on:click="_handlOnClick"   v-bind:class="classes">
        <!-- navlink -->
        <Dropdown class-name="dropcenter" :content-Style='{right:"50%"}'>
        <NavLink
            slot="trigger"
          :class-name="className"
          :to="to"
          :icon="icon"
          :hasSubNav="hasSubI"
          :active="active"
          :useExact="useExact"
        >
          {{ value }}
          <slot/>
        </NavLink>
        <div slot="content"  class="dropdown-menu dropdown-menu-left dropdown-menu-arrow show" v-if="hasSubI" arrow :show="isOpen" :position="possition">
            <!-- subItems -->
            <slot name="sub-item"/>
            <NavSubItem  v-for="(item, key) in subItems" :key="key" 
            :value="item.value" :to="item.to" :icon="item.icon">
            </NavSubItem>
        </div>
        </Dropdown>
    </div>
</template>

<script>
import {Icon} from '../'
    export default {
        name:"NavItem",
        props:{
            active:{default:false},
            icon:String,
            className:String,
            value:String,
            to:String,
            href:String,
            type:{default:"li"},
            hasSubNav:Boolean,
            position:String,
            useExact:Boolean,
            subItems: {default:() => ({})}
        },
        methods:{
            data() {
                return {
                    isOpen:false
                }
            },
            _handlOnClick(){
                // this.isOpen=!this.isOpen
            },
            hide() {
                // this.isOpen = false;
            },
        },
        mounted() {
            // console.log('NavItem Component mounted.')
        },
        computed:{
            classes () {
            const className = {"nav-item":true}
            className[`active`] = this.active
            className[`${this.className}`] = true
            return className
        },
        hasSubI(){
                return this.hasSubNav || this.$slots['sub-item'] || (this.subItems && this.subItems.length>0)
        }
        }
    }
</script>
