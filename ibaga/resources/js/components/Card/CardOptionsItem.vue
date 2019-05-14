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
            if(this.type === "collapse")
            cl = "card-options-collapse"
      else if(this.type === "close")
      cl = "card-options-remove"
      else if(this.type === "fullscreen")
      cl = "card-options-fullscreen"
            return {
                colorClass:`${cl}`,
                
            }
        },
        mounted() {
        },
        methods: {
         
       
        },
        computed:{
           dataToggle (){
    switch (this.type) {
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
     iconName(){
    if (this.icon) {
      return this.icon;
    }
    switch (this.type) {
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
        }
    }
</script>

<template>
        <a v-bind:class="[colorClass, className]" :data-toggle="dataToggle">
        <Icon :name="this.iconName"/>
        </a>
</template>