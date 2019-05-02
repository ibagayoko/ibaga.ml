<script>
// import c3 from 'c3'
import { debounce, cloneDeep, defaultsDeep } from 'lodash'
import "./c3jscustom.css";
export default {
  name: 'C3Chart',
  props: {
    cstyle:{
      type: Object,
      default: () => ({})
    },
    size:{
      type: Object,
      default: () => ({})
    },
    config: {
      type: Object,
      default: () => ({})
    },
    data: {
      type: Object,
      default: () => ({})
    },
    type: {
      type: String,
      default: 'bar'
    },
    axis:{
      type: Object,
      default: () => ({})
    },
    legend:{
      type: Object,
      default: () => ({})
    },
    point:{
      type: Object,
      default: () => ({})
    },
    padding:{
      type: Object,
      default: () => ({})
    },
    tooltip:{
      type: Object,
      default: () => ({})
    },
  },
  watch: {
    data: {
      handler: 'reload',
      deep: true
    },
    type: 'transform'
  },
  methods: {
    getArgs () {
      const data = this.getData()
      const config = this.getConfig()
      return defaultsDeep({ data }, config)
    },
    getData () {
      const { type } = this
      const data = cloneDeep(this.data)
      return defaultsDeep({ type }, data)
    },
    getConfig () {
      const config = cloneDeep(this.config)
      const color = {
        pattern: ['#0a4f8a', '#0a88c2', '#75bcdd', '#E0E1E2', '#21BA45', '#DB2828', '#31CCEC', '#F2C037']
      }
      const axis = !!this.axis ? this.axis : {
        x: {
          type: 'category',
          padding: {
            left: 0,
            right: 0
          },
          tick: {
            multiline: false
          }
        }
      }
      const {legend, padding, tooltip, point, size} = this
      return defaultsDeep({ axis, color, legend, padding, tooltip, point, size}, config)
    },
    update: debounce(function update () {
      const data = this.getData()
      this.$chart.load(data)
      this.$emit('update', data)
    }, 500),
    transform: debounce(function transform (...args) {
      this.$chart.transform(...args)
    }, 100),
    reload: debounce(function reload () {
      this.$emit('reloading')
      this.$chart.unload()
      this.$nextTick(() => {
        this.update()
      })
    }, 700)
  },
  mounted () {
    const args = this.getArgs()
    this.$chart = c3.generate({
      bindto: this.$refs.root,
      ...args
    })
    this.$emit('init', args)
  },
  beforeDestroy () {
    this.$chart = this.$chart.destroy()
  }
}
</script>

<template>
  <div v-bind:style="cstyle"  ref="root" class="chart-root"></div>
</template>

<style >
@import url("./c3jscustom.css");
</style>
