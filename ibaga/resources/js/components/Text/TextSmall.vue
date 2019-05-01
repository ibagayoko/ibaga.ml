<template>
    <Text root-tag="small" :color="color" :wrap="wrap" :muted="muted" size="sm"   :class-name="className">
       <slot />
    </Text>
</template>

<script>
    export default {
        name:"ITextSmall",
        props: {
            color:{default:""},
            wrap:String,
            muted:String,
            className:String},
        mounted() {
            console.log('TextSmall mounted.')
        },
         computed:{
            classes () {
            const className = { "container":true}
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>

