<script type="text/ecmascript">
    export default  {
        components: {},
        name: 'IText',
        props: {   
        color:{default:""},
        rootTag:{default:"div"},
        className:String,
        wrap:Boolean,
        muted:Boolean,
        size:{default:""},
        align:"left" | "center" | "right" | "justify",
        left:Boolean,
        center:Boolean,
        right:Boolean,
        justify:Boolean,
        transform:"lowercase" | "uppercase" | "capitalize",
        lowercase:Boolean,
        uppercase:Boolean,
        capitalize:Boolean,
        tracking:"tight" | "normal" | "wide",
        trackingTight:Boolean,
        trackingNormal:Boolean,
        trackingWide:Boolean,
        leading:"none" | "tight" | "normal" | "loose",
        leadingNone:Boolean,
        leadingTight:Boolean,
        leadingNormal:Boolean,
        leadingLoose:Boolean,


    },
        data() {
            let eventProps = {};
            const prefix = (this.payment && "payment") || (this.flag && "flag") || "fe";
            return {
                colorClass:`card-options ${prefix} ${prefix}-${name}`,
            }
        },
        mounted() {
        },
        methods: {},
        computed:{
            

            classes () {
            const align =
                this.align ||
                (this.left && "left") ||
                (this.center && "center") ||
                (this.right && "right") ||
                (this.justify && "justify") ||
                "";

            const transform =
                this.transform ||
                (this.lowercase && "lowercase") ||
                (this.uppercase && "uppercase") ||
                (this.capitalize && "capitalize") ||
                "";
                const tracking = 
                this.tracking ||
                (this.trackingTight && "tight") ||
                (this.trackingNormal && "normal") ||
                (this.trackingWide && "wide") ||
                "";
              const leading =
                this.leading ||
                (this.leadingNone && "none") ||
                (this.leadingTight && "tight") ||
                (this.leadingNormal && "normal") ||
                (this.leadingLoose && "loose") ||
                "";
            const className = {}
            className[`text-wrap p-lg-6`] = this.wrap
            className[`text-${this.color}`] = this.color
            className[`${this.size}`] = this.size
            className[`text-muted`] = this.muted
            className[`text-${align}`] = align
            className[`text-${transform}`] = transform
            className[`tracking-${tracking}`] = tracking
            className[`leading-${leading}`] = leading
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>

<template>
        <div v-if="rootTag==='div'" v-bind:class="classes">
        <slot/>
        </div>
        <small v-else-if="rootTag==='small'" v-bind:class="classes">
        <slot/>
        </small>
        <p v-else-if="rootTag==='p'" v-bind:class="classes">
        <slot/>
        </p>

</template>