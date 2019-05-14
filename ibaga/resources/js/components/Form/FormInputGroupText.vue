<script type="text/ecmascript">

    export default  {
        components: {},
        name: 'FormInputGroupText',
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
                    "input-group-text":true,
                    [`${this.className}`] : this.className
                }
            }
        }
    }
</script>

<template>
    <span :class="classes" ><slot /></span>
</template>