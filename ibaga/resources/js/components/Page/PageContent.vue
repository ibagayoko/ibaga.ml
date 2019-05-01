<template>
    <div v-bind:class="classes">
        <Container>
            <PageHeader v-if="this.title || subTitle || options" :title="this.title" :sub-title="subTitle" :options="options" />
        <slot />

        </Container>
    </div>
</template>

<script>
import { Container} from "../";
import { PageHeader } from '.';
    export default {
        name:"PageContent",
        props:["className", "title", "subTitle", "options"],
        components:{
            Container
        },
        mounted() {
            console.log('Page Component mounted.')
        },
        computed:{
            classes () {
            const className = {"page-content":true}
            className[`${this.className}`] = true
            return className
        }
        }
    }
</script>
