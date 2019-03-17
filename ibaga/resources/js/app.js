
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import Base from './base';
import {Bus} from './bus.js';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('page-header', require('./components/PageHeader').default);
Vue.component('preloader', require('./partials/Preloader').default);

Vue.component('alert', require('./components/Alert').default);
Vue.component('dropdown', require('./components/DropDown').default);
Vue.component('modal', require('./components/Modal').default);
Vue.component('fullscreen-modal', require('./components/FullscreenModal').default);
Vue.component('notification', require('./components/Notification').default);
// Vue.component('mini-editor', require('./components/MiniEditor').default);
Vue.component('editor', require('./components/Editor').default);
Vue.component('form-errors', require('./components/FormErrors').default);
Vue.component('image-picker', require('./components/ImagePicker').default);
Vue.component('cropper-modal', require('./components/CropperModal').default);
Vue.component('date-time-picker', require('./components/DateTimePicker').default);
Vue.component('featured-image-uploader', require('./components/FeaturedImageUploader').default);
Vue.component('multiselect', require('./components/MultiSelect').default);
Vue.component('meta-data', require('./components/MetaData').default);
Vue.component('twitter-card', require('./components/TwitterCard').default);
Vue.component('slug', require('./components/Slug').default);
Vue.component('tag-select', require('./components/TagSelect').default);
Vue.component('facebook-card', require('./components/FacebookCard').default);
Vue.component('post-list', require('./components/PostList').default);
Vue.directive('loading', require('./components/loadingButton'));
Vue.directive('click-outside', require('./components/clickOutside'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.mixin(Base);

const app = new Vue({
    el: '#app',

    data() {
        return {
            alert: {
                type: null,
                autoClose: 0,
                message: '',
                confirmationProceed: null,
                confirmationCancel: null,
            },

            notification: {
                type: null,
                autoClose: 0,
                message: ''
            }
        }
    },

    mounted() {
        Bus.$on('httpError', message => this.alertError(message));
    },

});
