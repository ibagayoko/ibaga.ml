<template>
    <div class="header py-4">
      <Container :class-name="align">
        <div class="d-flex">
          <slot/>
              <SiteLogo :href="href" :alt="alt" :src="imageUrl" />
              <div class="d-flex order-lg-2 ml-auto">
                <slot name="navItems" />
                <slot name="notificationsTray"/>
                <slot name="accountDropdown"/>
              </div>
              <a
                class="header-toggler d-lg-none ml-3 ml-lg-0"
                v-on:click="onMenuToggleClick"
              >
                <span class="header-toggler-icon" />
              </a>
        </div>
      </Container>
    </div>
</template>

<script>
    export default {
        name:"SiteHeader",
        props:{
            href:String,
            align:String,
            imageUrl:String,
            alt:String
        },
        mounted() {
            // console.log('SiteHeader Component mounted.')
        },
        methods:{
          onMenuToggleClick(){
            this.$root.$emit("collapse", this.collapseMobileMenu )
            this.collapseMobileMenu = !this.collapseMobileMenu
          },
          data(){
            return {
              collapseMobileMenu:false
            }
          }
        },
        computed:{
        }
    }
</script>
