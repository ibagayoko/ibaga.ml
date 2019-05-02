<template>
    <div class="my-3 my-md-5">
      <Container>
        <GridRow>
          <GridCol width="12">
            <Card>
                <CardHeader v-if="title">
                  <CardTitle>{{title}}</CardTitle>
                </CardHeader>
              <slot name="header"/>
              <CardBody><slot /></CardBody>
              <slot name="footer" />
            </Card>
          </GridCol>
        </GridRow>
      </Container>
    </div>
</template>

<script>
    import { Container, Card, GridRow, GridCol, CardBody, CardTitle, CardHeader  } from "../";
    export default {
        name:"PageCard",
        components:{
            Container, Card, GridRow, GridCol
        },
        props:{
            className:String,
        },
        mounted() {
            console.log('Page Component mounted.')
        },
        computed:{
            classes () {
                return {}
        }
        }
    }
</script>
