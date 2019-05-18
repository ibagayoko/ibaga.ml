<script type="text/ecmascript-6">
    import Multiselect from 'vue-multiselect'

    export default {
        props: {
            roles: {
                type: Array,
                required: false
            },
            assigned: {
                // type: Object,
                required: false
            },
            form:{
                type:String,
                required:false
            }
        },


        components: {
            Multiselect
        },

        data() {
            const allRoles = this.roles.map(obj => {
                let filtered = {};
                filtered['name'] = obj.name;
                filtered['id'] = obj.id;

                return filtered;
            });
            let allAssigned = []
            if(!!this.assigned){
                allAssigned = this.assigned['id'].map((id, index) => {
                let filtered = {};
                filtered['name'] = this.assigned['name'][index];
                filtered['id'] = id;

                return filtered;
            });
            }
            return {
                value: this.assigned ? allAssigned : [],
                options: allRoles
            }
        },

        methods: {
            onChange(value, id){
                if(this.value== null){
                    this.value = [];
                }
            },
            addRole(newRole) {

            },
        }
    }
</script>

<template>
    <div>
        <multiselect
                v-model="value"
                placeholder="Select some roles..."
                tag-placeholder="Add a new Role"
                label="name"
                track-by="id"
                :options="options"
                :taggable="true"
                :multiple="true"
                @tag="addRole">
                <!-- :multiple="false" -->
        </multiselect>

        <div class="roles">
            <template v-for="(role, index) in value">
                <input hidden type="hidden" :form="form" :name="`roles[name][${index}]`" :value="role.name">
                <input hidden type="hidden" :form="form" :name="`roles[id][${index}]`" :value="role.id">
            </template>
        </div>
    </div>
</template>

<style rel="stylesheet" type="text/css" src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style type="text/css">
    .multiselect__select {
        display: none;
    }

    .multiselect__tags {
        border: none;
        padding-left: 0;
        padding-right: 0;
    }

    .multiselect__tag,
    .multiselect__option--highlight,
    .multiselect__option--highlight::after,
    .multiselect__tag-icon:focus,
    .multiselect__tag-icon:hover {
        background: #3490dc;
    }

    .multiselect,
    .multiselect__input,
    .multiselect__single {
        font-size: 14px;
        padding: 0;
        border-radius: 0;
    }

    .multiselect__input:focus::placeholder,
    .multiselect__input:focus::-webkit-input-placeholder,
    .multiselect__input::placeholder,
    .multiselect__input::-webkit-input-placeholder,
    .multiselect__placeholder {
        color: #6c757d;
        opacity: 1;
        padding-top: 0;
        line-height: 1;
    }

    .multiselect__input {
        line-height: 1;
    }

    .multiselect__tag {
        padding-bottom: 2px;
    }
</style>
