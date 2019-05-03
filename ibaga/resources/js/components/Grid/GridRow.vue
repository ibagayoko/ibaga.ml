<template>
    <div v-bind:class="classes">
        <slot />
    </div>
</template>

<script>
    export default {
        name:"GridRow",
        props:{
            className:String,
            cards:Boolean, 
            deck:Boolean, 
            gutters:{default:""}, 
            alignItems:{default:""}, 
            justifyContent:{default:""},
            },
        mounted() {
            // console.log('Component mounted.')
        },
        computed:{
            classes () {
            const className = {row: true}


            className[`row-cards`] = this.cards,
            className["row-deck"]= this.deck,

            className[`gutters-${this.gutters}`] = this.gutters
            className[`align-items-${this.alignItems}`] = this.alignItems

            className[`justify-content-${this.justifyContent}`] = this.justifyContent

            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
