<script type="text/ecmascript">
    export default  {
        components: {},
        name: 'CardAlert',
        props: [ "className", "color"],
        data() {
            return {
                colorClass:`card-alert alert alert-${color} mb-0`,
                
            }
        },
        mounted() {
        },
        methods: {},
    }
</script>

<template>
        <div
      v-bind:class="[colorClass, className]"
    >
      <slot/>
    </div>
</template>