<template>
    <div class="header py-4">
      <Container :class-name="align">
        <div class="d-flex">
          <slot/>
              <SiteLogo :href="href" :alt="alt" :src="imageURL" />
              <div class="d-flex order-lg-2 ml-auto">
                <slot name="navItems"/>
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
            imageURL:String,
            alt:String,
            onMenuToggleClick:String,
        },
        mounted() {
            console.log('SiteHeader Component mounted.')
        },
        methods:{
          onMenuToggleClick(){
            this.$emit("MenuToggleClick")
          }
        },
        computed:{
        }
    }
</script>
