<script type="text/ecmascript">

    export default  {
        components: {},
        name: 'FormInputGroupPrepend',
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
                    "input-group-prepend":true,
                    [`${this.className}`] : this.className
                }
            }
        }
    }
</script>

<template>
    <span :class="classes" ><slot /></span>
</template>