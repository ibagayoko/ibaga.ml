<script type="text/ecmascript">
    export default  {
        components: {},
        name: 'CardMap',
        props: [ "className", "placeholder"],
        data() {
            return {
                colorClass:`card-body`,
                styleObject: 
                    placeholder
          ? Object.assign({
              backgroundImage: `url(${placeholder})`,
            })
          : null
                
            }
        },
        mounted() {
        },
        methods: {},
    }
</script>

<template>
        <div v-bind:class="[placeholder? 'card-map-placeholder':'',colorClass, className]" v-bind:style="styleObject">
        <slot/>
        </div>
</template>