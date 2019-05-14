<script type="text/ecmascript">

    export default  {
        components: {},
        name: 'FormInputGroup',
        props: [   
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
                    "input-group":true,
                    [`${this.className}`] : this.className
                }
            }
        }
    }
</script>

<template>
    <div :class="classes" >
        <FormInputGroupPrepend v-if="$slots['prepend']">
            <slot name="prepend" />
        </FormInputGroupPrepend>
        <slot />
        <slot name="append" />
    </div>
</template>