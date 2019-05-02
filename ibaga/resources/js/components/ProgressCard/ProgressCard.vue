<script type="text/ecmascript">
    export default {
        name:"ProgressCard",
        props:{
              className: String,
              progressColor: String,
              progressWidth: Number,
        },
        data() {
            return {}
        },
        created() {
        },
        computed: {
            classes:function(){
                return {
                    [`${this.className}`]:true
                }
            }
        },
        methods: {}
    }
</script>

<template>
        <Card :class-name="classes">
      <CardBody class-Name="text-center">
        <Header size="5"><slot name="header"/></Header>
        <div class="display-4 font-weight-bold mb-4"><slot/></div>
        <IProgress size="sm">
          <ProgressBar :color='progressColor' :width='progressWidth' />
        </IProgress>
      </CardBody>
    </Card>
</template>