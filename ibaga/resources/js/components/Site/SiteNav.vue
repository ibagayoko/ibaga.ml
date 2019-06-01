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
        data(){
          return {
            collapseState:this.collapse
          }
        }, 
        mounted() {
          this.$root.$on("collapse", (e)=>{
            this.collapseEvent();
          })
        },
        methods:{
          collapseEvent(){
            this.collapseState = !this.collapseState
          }
        },
        computed:{
            classes () {
              return {"header d-lg-flex p-0":true, collapse:this.collapseState}
        }
        }
    }
</script>
