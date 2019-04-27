<script type="text/ecmascript">
    export default  {
        components: {},
        name: 'CardStatus',
        props: [ "className", "color", "side"],
        data() {
            return {
                colorClass:`card-status bg-${color} mb-0`,
            }
        },
        mounted() {
        },
        methods: {},
    }
</script>

<template>
        <div
      v-bind:class="[colorClass, className, side? 'card-status-left':'']"
    >
      <slot/>
    </div>
</template>