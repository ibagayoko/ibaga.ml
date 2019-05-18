<script type="text/ecmascript-6">
    import Multiselect from 'vue-multiselect'

    export default {
        props: {
            permissions: {
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
            const allPermissions = this.permissions.map(obj => {
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
                options: allPermissions
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
                placeholder="Select some permissions..."
                tag-placeholder="Add a new Role"
                label="name"
                track-by="id"
                :options="options"
                :taggable="true"
                :multiple="true"
                @tag="addRole">
                <!-- :multiple="false" -->
        </multiselect>

        <div class="permissions">
            <template v-for="(permission, index) in value" >
                <input :key="index" hidden type="hidden" :form="form" :name="`permissions[name][${index}]`" :value="permission.name">
                <input :key="index" hidden type="hidden" :form="form" :name="`permissions[id][${index}]`" :value="permission.id">
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
