<script type="text/ecmascript">
    export default {
        props:["icon",
        "classname",
  "value",
  "badge",
  "badgeType",
  "to",],
        data() {
            return {
                shouldShowContent: false
            }
        },
        watch: {
            shouldShowContent(val) {
                if (val) {
                    this.$emit('showing');
                }
            }
        },
        methods: {
            toggle() {
                this.shouldShowContent = !this.shouldShowContent;
            },
            hide() {
                this.shouldShowContent = false;
            },
        },
        computed:{
            classes(){
                return {"dropdown-item": true, [`${this.classname}`]:true}
            }
        }
    }
</script>

<template>
    <a v-bind:class="classes" :href="to">
        <span v-if="badge" class="float-right">
          <Badge :color="badgeType">{{ badge}}</Badge>
        </span>
          <Icon v-if="icon" :name="icon" class-Name="dropdown-icon" />{{ value}}
      <slot />
    </a>
</template>