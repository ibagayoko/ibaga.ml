<script type="text/ecmascript-6">

    import moment from 'moment';
    
    export default {
        props: ['models'],

        data() {
            return {
                search: '',
                postList: this.models ? this.models : []
            }
        },

        computed: {
            /**
             * Filter posts by their title.
             *
             * @source https://codepen.io/AndrewThian/pen/QdeOVa
             */
            filteredList() {
                return this.postList.filter(post => {
                    return post.title.toLowerCase().includes(this.search.toLowerCase())
                })
            }
        },
    }
</script>