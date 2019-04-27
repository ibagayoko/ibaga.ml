<script type="text/ecmascript">
    export default  {
        components: {},
        name: 'CardOptions',
        props: [ "className"],
        data() {
            return {
                colorClass:`card-options`,
                
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