<script type="text/ecmascript">

    export default  {
        components: {},
        inheritAttrs: false,
        
        name: 'FormSelect',
        props: [   
        "label",
        "className",
        "error",
        "valid",
        "tick",
        "invalid",
        "cross",
        "feedback",
        "readOnly",
        "name",
        "value",
        "disabled"
  ],
        data() {
            return {
                inpProps:{
                },
                feedback1: this.error || this.feedback
            }
        },
        mounted() {
        },
        methods: {},
        computed:{
            classes(){
                return {
                    "form-control": true,
                    "is-valid": this.valid,
                    "state-valid": this.tick,
                    "is-invalid": this.invalid || !!this.error,
                    "state-invalid": this.cross || !!this.error,
                    [`${this.className}`] : this.className
                }
            }
        }
    }
</script>

<template>
            <!-- <slot></slot> -->
    <Fragment v-if="!label">
        <textarea :class="classes" v-bind="$attrs">{{ this.$slots.default[0].text }}</textarea>
        <span v-if="feedback1" class="invalid-feedback">{{ feedback1 }}</span>
    </Fragment>
    <FormGroup v-else :label="label">
        <textarea :class="classes" v-bind="$attrs">{{ this.$slots.default[0].text }}</textarea>
        <span v-if="feedback1" class="invalid-feedback">{{ feedback1 }}</span>
    </FormGroup>
</template>