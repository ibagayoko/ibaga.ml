<template>
<Fragment>
      <div class="footer" v-if="(links || note)">
        <Container>
          <GridRow>
            <GridCol :lg="8">
              <GridRow v-if="links">
                    <GridCol :width="6" :md="3">
                      <List :unstyled="true" class-name="mb-0">
                        <ListItem>{{links[0]}}</ListItem>
                        <ListItem>{{links[1]}}</ListItem>
                      </List>
                    </GridCol>
                    <GridCol :width="6" :md="3">
                      <List :unstyled="true" class-name="mb-0">
                        <ListItem>{{links[2]}}</ListItem>
                        <ListItem>{{links[3]}}</ListItem>
                      </List>
                    </GridCol>
                    <GridCol :width="6" :md="3">
                      <List :unstyled="true" class-name="mb-0">
                        <ListItem>{{links[4]}}</ListItem>
                        <ListItem>{{links[5]}}</ListItem>
                      </List>
                    </GridCol>
                    <GridCol :width="6" :md="3">
                      <List :unstyled="true" class-name="mb-0">
                        <ListItem>{{links[6]}}</ListItem>
                        <ListItem>{{links[7]}}</ListItem>
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
      <footer v-if="(nav || copyright)" class="footer">
        <Container>
          <GridRow class-name="align-items-center flex-row-reverse">
            <GridCol auto="true" class-name="ml-auto">
              <GridRow class-name="align-items-center">
                <slot name="nav"/>
              </GridRow>
            </GridCol>
            <GridCol :width="12" lg-Auto class-name="mt-3 mt-lg-0 text-center">
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
            links:[],
            note:String

        },
        mounted() {
            console.log('SiteLogo Component mounted.')
        },
        computed:{
            hasSlotLink () {
            return this.$slot["copyright"] || this.$slot["nav"]
        }
        }
    }
</script>
