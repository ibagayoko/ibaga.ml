<template>
    <div v-bind:class="classes">
        <slot />
    </div>
</template>

<script>
    export default {
        name:"GridCol",
        props:{
            
  className:String,
  width:{default:0},
  xs:{default:0},
  sm:{default:0},
  md:{default:0},
  lg:{default:0},
  xl:{default:0},
  xsAuto:Boolean,
  smAuto:Boolean,
  mdAuto:Boolean,
  lgAuto:Boolean,
  xlAuto:Boolean,
  auto:Boolean,
  offset:{default:0},
  offsetXs:{default:0},
  offsetSm:{default:0},
  offsetMd:{default:0},
  offsetLg:{default:0},
  offsetXl:{default:0},
  ignoreCol:{default:false},

            },
        mounted() {
            // console.log('Component mounted.')
        },
        computed:{
            classes () {
            const className = {col: !this.ignoreCol}
      className[`col-${this.width }`]= this.width
      className[`col-xs-${ this.xs}`]= this.xs
      className[`col-xs-auto this.`]= this.xsAuto
      className[`col-sm-${ this.sm}`]= this.sm
      className[`col-sm-auto this.`]= this.smAuto
      className[`col-md-${ this.md}`]= this.md
      className[`col-md-auto this.`]= this.mdAuto
      className[`col-lg-${ this.lg}`]= this.lg
      className[`col-lg-auto this.`]= this.lgAuto
      className[`col-xl-${ this.xl}`]= this.xl
      className[`col-xl-auto this.`]= this.xlAuto
      className["col-auto"]= this.auto
      className[`offset-${this.offset }`]= this.offset
      className[`offset-xs-${ this.offsetXs}`]= this.offsetXs
      className[`offset-sm-${ this.offsetSm}`]= this.offsetSm
      className[`offset-md-${ this.offsetMd}`]= this.offsetMd
      className[`offset-lg-${ this.offsetLg}`]= this.offsetLg
      className[`offset-xl-${ this.offsetXl}`]= this.offsetXl
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
