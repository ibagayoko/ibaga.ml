<script type="text/ecmascript-6">


    export default {
        props: {
            className:String,
            avatar:{
                default:()=>false
            },
            objectUrl:String,
            size:String,
            rounded:Boolean,
            alt:String,

        },

        data() {
            return {
            }
        },
        computed:{
            classes(){
                return {
                [`media-object`]: true,
                [`${this.className}`]: this.className,
                }
            },
            imgClass(){
                return {
                    "d-flex":true,
                    "rounded":this.rounded
                }
            }
        }
    }
</script>

<template>
    <div v-bind:class="classes">
        <Avatar v-if="avatar" :size="size" :image-url="objectURL" />
        <img v-else-if="url" :class="imgClass"  :src="objectURL" :alt="alt" />
        <slot/>
    </div>
</template>