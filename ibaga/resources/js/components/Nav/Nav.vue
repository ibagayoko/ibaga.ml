<template>
    <ul v-bind:class="classes">
        <NavItem v-for="(item, key) in items"
          :key="key"
          :value="item.value"
          :to="item.to"
          :icon="item.icon"
          :sub-items="item.subItems"
          :has-sub-nav="!!item.subItems"
          :active="computeActive(item)"
          :useExact="item.useExact"
        >
        </NavItem>
        <slot />
    </ul>
</template>

<script>
    export default {
        name:"INav",
        props:{
            tabbed:{default:true},
            items:{default:()=>[]},
            className:String,
            
        },
        methods:{
            data(){
              
                return {
                }
            }
        },
        methods:{
          computeActive(navItem){
            const  pathName  = location.href;

          if (
            navItem.active !== null &&
            navItem.active !== undefined &&
            navItem.active === true
          ) {
            return true;
          }

          if (navItem.to !== null && navItem.to !== undefined && navItem.to === pathName) {
            return true;
          }

          if (navItem.subItems !== null && navItem.subItems !== undefined) {
            if (
              navItem.subItems.find(
                item =>
                  item.to !== null && item.to !== undefined && item.to === pathName
              )
            ) {
              return true;
            }
          }

          return false;
        }
        },
        mounted() {
            // console.log('INav Component mounted.')
        },
        computed:{
            classes () {
            const className = {}
            className[`nav`] = true
            className[`nav-tabs`] = this.tabbed
            className[`${this.className}`] = true
            return className
        },
      
    }
    }
</script>
