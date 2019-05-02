<script type="text/ecmascript-6">

    import moment from 'moment';
    
    export default {
        props: ['models'],

        data() {
            return {
                search: '',
                postList: this.models ? this.models : [],
                view:'list'
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
                return this.postList.filter(post => {
                    return post.title.toLowerCase().includes(this.search.toLowerCase())
                })
            }
        },
    }
</script>