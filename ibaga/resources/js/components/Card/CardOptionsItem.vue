<script type="text/ecmascript">
import { Icon } from "../";
    export default  {
        components: {
            Icon
        },
        name: 'CardOptionsItem',
        props: [ "className", "type", "icon" ],
        data() {
            let cl = ""
            if(type === "collapse")
            cl = "card-options-collapse"
      else if(type === "close")
      cl = "card-options-remove"
      else if(type === "fullscreen")
      cl = "card-options-fullscreen"
            return {
                colorClass:`${cl}`,
                
            }
        },
        mounted() {
        },
        methods: {
            iconName:() => {
    if (this.icon) {
      return this.icon;
    }
    switch (type) {
      case "collapse":
        return "chevron-up";
      case "close":
        return "x";
      case "fullscreen":
        return "maximize";
      default:
        return "";
    }
  
        },
        dataToggle : () => {
    switch (type) {
      case "collapse":
        return "card-collapse";
      case "close":
        return "card-remove";
      case "fullscreen":
        return "card-remove";
      default:
        return "";
    }
  },
        }
    }
</script>

<template>
        <a v-bind:class="[colorClass, className]" :data-toggle="this.dataToggle">
        <Icon :name="this.iconName"/>
        </a>
</template>