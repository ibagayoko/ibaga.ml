<script type="text/ecmascript">

    export default  {
        components: {},
        name: 'Icon',
        props: [   
        "prefix",
        "name",
        "className",
        "link",
        "isAriaHidden",
        "payment",
        "flag",
  ],
        data() {
            let eventProps = {};
            const prefix = (this.payment && "payment") || (this.flag && "flag") || "fe";
            return {
                colorClass:`${prefix} ${prefix}-${this.name}`,
            }
        },
        mounted() {
        },
        methods: {},
    }
</script>

<template>
        <i v-if="!link" v-bind:class="[this.colorClass, className]">
        <slot/>
        </i>
        <a v-else class="icon"  :aria-hidden="true" >
            <i v-bind:class="[this.colorClass, className]"></i>
        </a>
</template>