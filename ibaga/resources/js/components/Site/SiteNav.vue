<template>
<div v-bind:class="classes">
      <Container>
        <!-- {children || ( -->
          <GridRow class-name="align-items-center">
           
            <GridCol class-Name="col-lg order-lg-first">
          <slot name="nav"/>
              <INav
                tabbed="true"
                class-name="border-0 flex-column flex-lg-row"
                :items="items"
              />
            </GridCol>
             <GridCol :lg="3" class-name="ml-auto" :ignore-col="true">
               <GridRow>
              <!-- {/* @TODO: add InlineSearchForm  */} -->
              <!-- {/* {rightColumnComponent || (withSearchForm && <InlineSearchForm />)} */} -->
              <slot name="rightColumnComponent"/>
               </GridRow>
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
            items:{default:()=> []},
            collapse:{default:false},
            withSearchForm:{default:true},

        },
        mounted() {
         
            // console.log('SiteNav Component mounted.')
            this.collapseEvent()
        },
        methods:{
          collapseEvent(){
this.$on("collapse", function(e){
            this.collapse = !this.collapse
          })
          }
        },
        computed:{
            classes () {
              let cls = {"header d-lg-flex p-0":true}
              cls[`collapse`] = this.collapse 
            return cls
        }
        }
    }
</script>
