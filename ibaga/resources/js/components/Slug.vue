<script type="text/ecmascript-6">
    export default {
        props: ['model','form'],

        data() {
            return {
                name: this.model ? this.model.name : ''
            }
        },

        computed: {
            slug() {
                return this.slugify(this.name);
            }
        },

        methods: {
            /**
             * Convert a string to a slug.
             *
             * @source https://gist.github.com/mathewbyrne/1280286
             */
            slugify(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/--+/g, '-')
            }
        }
    }
</script>