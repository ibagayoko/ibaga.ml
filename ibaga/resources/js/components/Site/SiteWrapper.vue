<template>
        <Page :ignore-col="true">
        <PageMain>
          <slot name="header">
          </slot>
          <slot name="nav" />
          <slot />
        </PageMain>
        <slot name="footer"> </slot>
      </Page>
</template>

<script>
// import {Page, PageMain} from '../'
    export default {
        name:"SiteWrapper",
        props:{
        },
        mounted() {
            // console.log('SiteLogo Component mounted.')
        },
        computed:{
        }
    }
</script>
