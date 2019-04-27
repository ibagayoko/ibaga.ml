<script type="text/ecmascript">
    export default  {
        components: {},
        name: 'CardHeader',
        props: [ "className", "backgroundURL"],
        data() {
            return {
                styleObject: 
                    this.backgroundURL
          ? Object.assign({
              backgroundImage: `url(${this.backgroundURL})`,
            })
          : null
                
            }
        },
        mounted() {
        },
        methods: {},
        computed: {
      classObject: function () {
        return {
          "card-header":true,
            className:true,
        }
      }
    },
    }
</script>

<template>
        <div
      v-bind:class="classObject"
      v-bind:style="styleObject"
    >
      <slot/>
    </div>
</template>