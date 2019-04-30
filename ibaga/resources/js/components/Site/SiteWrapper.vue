<template>
        <Page>
        <PageMain>
          <slot name="header" />
          <slot name="nav" />
          <slot />
        </PageMain>
        <slot name="footer" />
      </Page>
</template>

<script>
    export default {
        name:"SiteWrapper",
        props:{
        },
        mounted() {
            console.log('SiteLogo Component mounted.')
        },
        computed:{
        }
    }
</script>
