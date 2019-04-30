<template>
<div v-bind:class="classes">
      <Container>
        <slot />
        <!-- {children || ( -->
          <GridRow class-name="align-items-center">
            <GridCol :lg="3" class-name="ml-auto" :ignore-col="true">
              <!-- {/* @TODO: add InlineSearchForm  */} -->
              <!-- {/* {rightColumnComponent || (withSearchForm && <InlineSearchForm />)} */} -->
              <slot name="rightColumnComponent"/>
            </GridCol>
            <GridCol className="col-lg order-lg-first">
              <INav
                tabbed
                class-name="border-0 flex-column flex-lg-row"
                :items="items"
              />
            </GridCol>
          </GridRow>
        <!-- )} -->
      </Container>
    </div>
</template>

<script>
    export default {
        name:"SiteNav",
        props:{
            items:[],
            collapse:Boolean,
            withSearchForm:{default:true},

        },
        mounted() {
            console.log('SiteNav Component mounted.')
        },
        computed:{
            classes () {
              let cls = {"header d-lg-flex p-0":true}
              cls[`${this.collapse}`] = this.collapse 
            return cls
        }
        }
    }
</script>
