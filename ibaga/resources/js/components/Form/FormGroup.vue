<script type="text/ecmascript">

    export default  {
        components: {},
        name: 'FormGroup',
        props: [   
        "label",
        "isRequired",
        "className",
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
                    "form-group":true,
                    [`${this.className}`] : this.className
                }
            }
        }
    }
</script>

<template>
        <div :class="classes">
            <FormLabel v-if="label">
                {{ label }}
                <span v-if="isRequired" class="form-required">*</span>
            </FormLabel>
            <slot></slot>
        </div>
</template>