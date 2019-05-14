<script type="text/ecmascript">

    export default  {
        components: {},
        name: 'FormLabel',
        props: [   
        "label",
        "isRequired",
        "className",
        "aside",
  ],
        data() {
          return {}  
        },
        mounted() {
        },
        methods: {},
        computed:{
            classes(){
                return {
                    "form-label":true,
                    [`${this.className}`] : this.className
                }
            }
        }
    }
</script>

<template>
        <label :class="classes">
            <span v-if="aside" class="form-label-small">{{ aside }}</span>
            <slot></slot>
        </label>
</template>