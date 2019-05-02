<script type="text/ecmascript">
// Todo bind event function
// import { Icon } from "../";
    export default  {
        components: {
            // Icon
        },
        name: 'Avatar',
        props: [
            "className",
            "children",
            "imageUrl",
            "size",
            "status",
            "placeholder",
            "icon",
            "color",
        ],
        data() {
            return {
                styleObject: this.imageUrl ? Object.assign(
              {
                backgroundImage: `url(${this.imageUrl})`,
              },
              this.style
            )
          : this.style
                
            }
        },
        mounted() {
        },
        methods: {},
        computed: {
      classObject: function () {
        return {
          avatar: true,
      [`avatar-${this.size}`]: !!this.size,
      "avatar-placeholder": this.placeholder,
      [`avatar-${this.color}`]: !!this.color,
            [`${this.className}`]:true
        }
      }
    },
    }
</script>

<template>
        <span v-bind:class="classObject"
        v-bind:style="styleObject"
      >
        <Icon v-if="icon" :name="icon" />
         <span v-if="status" :class="`avatar-status bg-${status}`" />
        <slot/>
        </span>
</template>