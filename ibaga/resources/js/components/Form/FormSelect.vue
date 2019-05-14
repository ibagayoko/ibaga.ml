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
                        // name:this.name,
                        // class:this.classes,
                        // type:this.type,
                        // placeholder:this.placeholder,
                        // value:this.value,
                        // min:this.min,
                        // max:this.max,
                        // minlength:this.minlength,
                        // maxlength:this.maxlength,
                        // disabled:this.disabled,
                        // readOnly:this.readOnly,
                        // autoFocus:this.autoFocus,
                        // required:this.required,
                        // ...$props
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
                    "custom-select": true,
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
    <Fragment v-if="label">
        <select :class="classes" v-bind="$attrs">
            <slot />
        </select>
        <span v-if="feedback1" class="invalid-feedback">{{ feedback1 }}</span>
    </Fragment>
    <FormGroup v-else :label="label">
        <select :class="classes" v-bind="$attrs">
            <slot />
        </select>
        <span v-if="feedback1" class="invalid-feedback">{{ feedback1 }}</span>
    </FormGroup>
</template>