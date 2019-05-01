<template>
    <table v-if="!responsive" v-bind:class="classes" :col-span="colSpan">
        <slot name="header"/>
        <slot />
    </table>
    <div v-else class="table-responsive">
        <table v-bind:class="classes" :col-span="colSpan">
        <slot name="header"/>
        <slot />
    </table>
    </div>
</template>

<script>
    export default {
        name:"ITable",
        props:{
            className:String,
            cards: {default:false},
            striped: {default:false},
            responsive: {default:false},
            cards:Boolean,
            striped:Boolean,
            responsive:Boolean,
            highlightRowOnHover:Boolean,
            hasOutline:Boolean,
            verticalAlign:String,
            colSpan:Boolean,
        },
        mounted() {
            console.log('Table Component mounted.')
        },
        computed:{
            classes () {
            const className = {table:true}
            className[`card-table`] = this.cards
            className[`table-striped`] = this.striped
            className[`table-hover`] = this.highlihtRowOnHoer
            className[`table-outline`] = this.hasOutline
            className[`table-outline`] = this.hasOutline
            className[`table-vcenter`] = this.verticalAlign === "center"
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
