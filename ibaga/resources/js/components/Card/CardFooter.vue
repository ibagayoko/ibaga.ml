<script type="text/ecmascript">
    export default  {
        components: {},
        name: 'CardFooter',
        props: [ "className"],
        data() {
            return {
                colorClass:`card-footer`,
                
            }
        },
        mounted() {
        },
        methods: {},
    }
</script>

<template>
        <div v-bind:class="[colorClass, className]">
        <slot/>
        </div>
</template>