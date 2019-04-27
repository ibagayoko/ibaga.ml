<script type="text/ecmascript">
    export default  {
        components: {},
        name: 'CardTitle',
        props: [ "className"],
        data() {
            return {
                colorClass:`card-title`,
                
            }
        },
        mounted() {
        },
        methods: {},
    }
</script>

<template>
        <h3 v-bind:class="[colorClass, className]">
        <slot/>
        </h3>
</template>