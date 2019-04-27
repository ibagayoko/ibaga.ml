<script type="text/ecmascript">
    export default  {
        components: {},
        name: 'CardBody',
        props: [ "className"],
        data() {
            return {
                colorClass:`card-body`,
                
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