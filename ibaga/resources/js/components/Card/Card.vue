
<script>
import CardHeader from "./CardHeader";
import CardTitle from "./CardTitle";
import CardBody from "./CardBody";
import CardOptions from "./CardOptions";
import CardOptionsItem from "./CardOptionsItem";
import CardStatus from "./CardStatus";
import CardAlert from "./CardAlert";
import CardFooter from "./CardFooter";
import CardMap from "./CardMap";


export default   {
  name:"Card",
  props: [
  "className",
  "titre",
  "body",
  "RootComponent",
  "options",
  "isCollapsible",
  "isCollapsed",
  "isClosable",
  "isClosed",
  "isFullscreenable",
  "statusColor",
  "statusSide",
  "alert",
  "alertColor",
  "footer",
  "aside",
  ],
components: {
  CardHeader,
  CardBody,
  CardTitle,
  CardOptions,
  CardOptionsItem,
  CardStatus,
  CardAlert,
  CardFooter,
  CardMap,
},
data(){
    return {
    Closed: this.isClosed || false,
    Collapsed: this.isCollapsed || false,
    isFullscreen: false,
    }
    // return {state}
},
methods: {
  handleCloseOnClick ()  {
      this.Closed = !this.Closed
  },

  handleCollapseOnClick ()  {

        this.Collapsed = !this.Collapsed
  },

  handleFullscreenOnClick()  {
      this.isFullscreen = !this.isFullscreen
  },

},
      computed: {
      classes: function () {
        return {
          card: true,
          aside: this.aside || false,
            "card-collapsed": this.Collapsed,
            "card-fullscreen": this.isFullscreen,
            // `${this.className}`:true,
            [`${this.className}`]:this.className
        }
      }
    },
}

</script>

<template>
  <div v-bind:class="classes" v-if="!Closed">
    <!-- {card_status} -->
    <CardStatus v-if="statusColor" :color="statusColor" :side="statusSide"/>
    <!-- {card_header} -->

    <CardHeader v-if="!!titre">
      <CardTitle>{{ titre }}</CardTitle>

      <CardOptions>
        <CardOptionsItem
          v-if="options || isClosable"
          v-on:click.native="handleCollapseOnClick"
          type="collapse"
        />
        <CardOptionsItem
          v-if="options || isFullscreenable"
          v-on:click.native="handleFullscreenOnClick"
          type="fullscreen"
        />
        <CardOptionsItem 
          v-if="options || isClosable" 
          v-on:click.native="handleCloseOnClick"
          type="close" 
          />
      </CardOptions>
    </CardHeader>

    <!-- {card_alert} -->
    <CardAlert v-if="alert && alertColor" :color="alertColor">
      <slot name="alert"/>
      <!-- {alert} -->
    </CardAlert>
    <!-- {card_body || children} -->
    <CardBody v-if="body">{{ body }}</CardBody>
    <slot></slot>
    <!-- {card_footer} -->
    <CardFooter v-if="footer">{{ footer }}</CardFooter>
  </div>
</template>