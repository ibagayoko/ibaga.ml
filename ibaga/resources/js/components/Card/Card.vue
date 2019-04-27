
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
  "title",
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
    let state = {
    isClosed: this.isClosed || false,
    isCollapsed: this.isCollapsed || false,
    isFullscreen: false,
    }
    return {state}
},
methods: {
  handleCloseOnClick : () => {
    //   this.setState(s => ({
      this.isClosed = !this.isClosed
    // }));
  },

  handleCollapseOnClick : () => {
    // this.setState(s => ({
        this.isCollapsed = this.isCollapsed
    // }));
  },

  handleFullscreenOnClick :() => {
      this.isFullscreen = !this.isFullscreen
  },

},
      computed: {
      classObject: function () {
        return {
          card: true,
          aside: this.aside || false,
            "card-collapsed": this.isCollapsed,
            "card-fullscreen": this.isFullscreen,
            // `${this.className}`:true,
            [`${this.className}`]:true
        }
      }
    },
}

</script>

<template>
  <div v-bind:class="[classObject]" v-if="!isClosed">
    <!-- {card_status} -->
    <CardStatus v-if="statusColor" :color="statusColor" :side="statusSide"/>
    <!-- {card_header} -->

    <CardHeader v-if="title">
      <CardTitle>{{ title }}</CardTitle>

      <CardOptions>
        <CardOptionsItem
          v-if="options || isClosable"
          v-on:click.native="this.handleCollapseOnClick"
          type="collapse"
        />
        <CardOptionsItem
          v-if="options || isFullscreenable"
          type="fullscreen"
          v-on:click.native="this.handleFullscreenOnClick"
        />
        <CardOptionsItem v-if="options || isClosable" type="close" v-on:click.native="handleCloseOnClick"/>
      </CardOptions>
    </CardHeader>

    <!-- {card_alert} -->
    <CardAlert v-if="alert && alertColor" color="{alertColor}">
      <slot name="alert"/>
      <!-- {alert} -->
    </CardAlert>
    <!-- {card_body || children} -->
    <CardBody v-if="body">{{ body }}</CardBody>
    <slot name="children"></slot>
    <!-- {card_footer} -->
    <CardFooter v-if="footer">{{ footer }}</CardFooter>
  </div>
</template>