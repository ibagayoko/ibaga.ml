<script type="text/ecmascript-6">

    export default {

        props: ['models'],

        data() {
            return {
                search: '',
                tagList: this.models ? this.models : []
            }
        },

        computed: {
            /**
             * Filter tags by their name.
             *
             * @source https://codepen.io/AndrewThian/pen/QdeOVa
             */
            filteredList() {
                return this.tagList.filter(tag => {
                    return tag.name.toLowerCase().includes(this.search.toLowerCase())
                })
            }
        },
    }
</script>