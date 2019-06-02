<script type="text/ecmascript-6">

    import moment from 'moment';
    
    export default {
        props: ['models'],

        data() {
            return {
                search: '',
                postList: this.models ? this.models : [],
                view:'list',
                limit: 10,
                load: false
            }
        },
        methods:{
            activeListView(){
                this.view = 'list'

            },
             activeCardView(){
                this.view = 'card'
                
            }
        },

        computed: {
            /**
             * Filter posts by their title.
             *
             * @source https://codepen.io/AndrewThian/pen/QdeOVa
             */
            filteredList() {
                let filtered = this.postList.filter(post => {
                    return post.title.toLowerCase().includes(this.search.toLowerCase())
                })

                this.load = Object.keys(filtered).length > this.limit;
                return this.limit ? filtered.slice(0, this.limit) : this.topicList;
            }
        },
    }
</script>