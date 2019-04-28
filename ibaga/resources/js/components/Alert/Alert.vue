

<script>
import {Icon, Avatar, IButton} from '../'

    export default {
        name: "Alert",
        components:{
            Avatar,
            Icon,
            IButton
        },
        props: {
          className,
          type: {default: 'success', type: String},
          icon,
          hasExtraSpace,
          isDismissible,
          avatar,

        },
        data(){
            return {
                isDismissed: false
            }
        },
        methods:{
            _handleOnDismissClick:() => {
        if (this.props.onDismissClick) this.$emit("dismiss");
        this.isDismissed =  true 
        }
        },
        computed: {
      classObject: function () {
        return {
          "alert": true,
      [`alert-${this.type}`]: !!this.type,
      "mt-5 mb-6": this.hasExtraSpace,
      "alert-dismissible": this.isDismissible,
      "alert-avatar": !!this.avatar,
      [`${this.className}`]:true
        }
      }
    },
    }
</script>
<template>
    <div v-if="!isDismissed"  v-bind:class="classObject">
         <IButton v-if="isDismissible" class-name="close" v-on:click="_handleOnDismissClick" ></IButton>
          <Avatar v-if="avatar" :image-url="avatar" />
          <Icon v-if="icon" :name="icon" class-name="mr-2" is-aria-hidden="true" />
        <slot />
    </div>
</template>
<style scoped>
</style>