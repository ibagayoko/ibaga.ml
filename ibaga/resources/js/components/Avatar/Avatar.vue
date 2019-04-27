<script type="text/ecmascript">
// Todo bind event function
import { Icon } from "../";
    export default  {
        components: {
            Icon
        },
        name: 'Avatar',
        props: [
            "className",
            "children",
            "imageURL",
            "style",
            "size",
            "status",
            "placeholder",
            "icon",
            "color",
            "onClick",
            "onMouseEnter",
            "onMouseLeave",
            "onPointerEnter",
            "onPointerLeave",
        ],
        data() {
            return {
                styleObject: this.imageURL
          ? Object.assign(
              {
                backgroundImage: `url(${this.imageURL})`,
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
         <span v-if="status" class-name="`avatar-status bg-${status}`" />
        <slot/>
        </span>
</template>