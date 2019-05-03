<script type="text/ecmascript">
    export default {
        props:[
        "classname",
        ],
        data() {
            return {
            }
        },
        methods: {
        },
        computed:{
            classes(){
                return {"dropdown-divider": true, [`${this.classname}`]:this.classname}
            }
        }
    }
</script>

<template>
    <div v-bind:class="classes" >
      <slot />
    </div>
</template>