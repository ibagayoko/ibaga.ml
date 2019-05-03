<template>
<Fragment>
      <div class="footer" v-if="(links || note)">
        <Container>
          <GridRow>
            <GridCol :lg="8">
              <GridRow v-if="links">
                    <GridCol :width="6" :md="3">
                      <List :unstyled="true" class-name="mb-0">
                        <ListItem><a :href="links[0]">{{ linksName[0] }}</a></ListItem>
                        <ListItem><a :href="links[1]">{{ linksName[1] }}</a></ListItem>
                      </List>
                    </GridCol>
                    <GridCol :width="6" :md="3">
                      <List :unstyled="true" class-name="mb-0">
                        <ListItem><a :href="links[2]">{{ linksName[2] }}</a></ListItem>
                        <ListItem><a :href="links[3]">{{ linksName[3] }}</a></ListItem>
                      </List>
                    </GridCol>
                    <GridCol :width="6" :md="3">
                      <List :unstyled="true" class-name="mb-0">
                       <ListItem><a :href="links[4]">{{ linksName[4] }}</a></ListItem>
                        <ListItem><a :href="links[5]">{{ linksName[5] }}</a></ListItem>
                      </List>
                    </GridCol>
                    <GridCol :width="6" :md="3">
                      <List :unstyled="true" class-name="mb-0">
                        <ListItem><a :href="links[6]">{{ linksName[6] }}</a></ListItem>
                        <ListItem><a :href="links[7]">{{ linksName[7] }}</a></ListItem>
                      </List>
                    </GridCol>
              </GridRow>
            </GridCol>
            <GridCol :lg="4" class-name="mt-4 mt-lg-0">
              {{note}}
            </GridCol>
          </GridRow>
        </Container>
      </div>
      <footer v-if="hasSlotLink" class="footer">
        <Container>
          <GridRow class-name="align-items-center flex-row-reverse">
            <GridCol :auto="true" class-name="ml-auto">
              <GridRow class-name="align-items-center">
                <slot name="nav"/>
              </GridRow>
            </GridCol>
            <GridCol :width="12" :lg-Auto="true" class-name="mt-3 mt-lg-0 text-center">
              <slot name="copyright"/>
            </GridCol>
          </GridRow>
        </Container>
      </footer>

</Fragment>
</template>

<script>
    export default {
        name:"SiteFooter",
        props:{
            links:{default:[]},
            linksName:{default:[]},

            note:String

        },
        mounted() {
            // console.log('SiteLogo Component mounted.')
        },
        computed:{
            hasSlotLink () {
            return this.$slots["copyright"] || this.$slots["nav"]
        }
        }
    }
</script>
