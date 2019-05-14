<template>
    <List inline  v-bind:class="classes">
        <ListItem v-for="(item, key) in items" :key="key">
            <IButton v-if="asButtons" :color="item.color" size="sm" :social="item.name" :to="item.to">{{ item.label }}</IButton>
            <a v-if="!asButtons" :href="item.to" :data-original-title="item.tooltip">
                <Icon :prefix="prefix" :name="item.name" />
            </a>
        </ListItem>
        <slot />
    </List>
</template>

<script>
    export default {
        name:"ListItem",
        props:{
            prefix:{default:()=>"fe"},
            asButtons:{defaullt:()=>false},
            items:Object,

            className:String,
        },
        mounted() {
            // console.log('List Component mounted.')
        },
        computed:{
            classes () {
            const className = {}
            className[`social-links`] = true
            className[`${this.className}`] = this.className
            return className
        }
        }
    }
</script>
