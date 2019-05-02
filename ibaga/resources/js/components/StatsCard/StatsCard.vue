<template>
     <Card v-if="layout==2" :class-Name="className">
        <CardBody>
          <div :class="`card-value float-right text-${movementColor}`">
            {{ movementString }}
          </div>
          <h3 class="h3 mt-0 mb-4 mb-1 ">{{total}}</h3>
          <IText :muted="true">{{label}}</IText>
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
        <h3 class="h3 m-0">{{total}}</h3>
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

