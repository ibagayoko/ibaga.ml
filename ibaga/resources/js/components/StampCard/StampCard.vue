<script type="text/ecmascript">
    export default {
        name:"StampCard",
        props:{
              className: String,
              icon: String,
              color: String,
        },
        data() {
            return {}
        },
        created() {
        },
        computed: {
            classes:function(){
                return `p-3 ${this.className}`;
                
            }
        },
        methods: {}
    }
</script>

<template>
        <Card :class-name="classes">
          <div class="d-flex align-items-center">
              <Stamp :color="color" :icon="icon" className="mr-3" />
              <div>
                  <h4 class="h4" v-if="this.$slots['header']">
                      <slot name="header"/>
                  </h4>
                  <slot />
                  <ITextSmall :muted="true" v-if="this.$slots['footer']">
                  <slot name="footer"/>
                  </ITextSmall>
              </div>
          </div>
    </Card>
</template>