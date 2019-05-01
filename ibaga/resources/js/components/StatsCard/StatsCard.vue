<template>
     <Card v-if="layout==2" :class-Name="className">
        <CardBody #children>
          <div :class-Name="`card-value float-right text-${movementColor()}`">
            {{movementString}}
          </div>
          <HeaderH3 class-Name="mb-1">{{total}}</HeaderH3>
          <IText muted>{{label}}</IText>
        </CardBody>
        <div v-if="chart" class="card-chart-bg">
        <slot />
        </div>
      </Card>
    <Card v-else :class-Name="className" >
      <CardBody class-Name="p-3 text-center">
        <IText :color="movementColor" class-name="text-right">
          {{movementString}}
          <Icon
            :name='`${!movement ? "minus" : movement > 0 ? "chevron-up" : "chevron-down"}`'
          />
        </IText>
        <h3 class-Name="m-0">{{total}}</h3>
        <!-- <Header class-Name="m-0">{{total}}</Header> -->
        <IText color="muted" class-Name=" mb-4">
          {{label}}
        </IText>
      </CardBody>
    </Card>
</template>

<script>
    export default {
        name:"StatsCard",
        props: {
            layout:{ default:1},
            movement:Number,
            total:String,
            label:String,
            chart:Boolean,
            className:String},
        methods:{
            
        },
        mounted() {
            console.log('StatsCard mounted.')
        },
         computed:{
        movementString(){
            return `${this.movement > 0 ? "+" : ""}${this.movement}%`;
            },

        movementColor(){
            return !this.movement ? "yellow" : this.movement > 0 ? "green" : "red";
            }

        }
    }
</script>

