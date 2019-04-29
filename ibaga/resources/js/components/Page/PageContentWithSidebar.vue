<template>
        <PageContent>
            <slot name="header" />
            <GridRow>
                <GridCol lg="3" class-name="order-lg-1 mb4">
                    <slot name="sidebar" />
                </GridCol>
                <GridCol lg="9"><slot /></GridCol>
            </GridRow>

        </PageContent>
</template>

<script>
import { GridRow, GridCol} from "../";
import { PageHeader, PageContent } from './';
    export default {
        name:"PageContentWithSidebar",
        props:["className"],
        components:{
            PageHeader, PageContent,
            GridRow, GridCol
        },
        props:{
            className:String,
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
