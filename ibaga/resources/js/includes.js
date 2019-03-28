import Vue from 'vue';
import VueNotification from "@kugatsu/vuenotification";


// Components
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
Vue.component('tag-list', require('./components/TagList').default);
Vue.component('facebook-card', require('./components/FacebookCard').default);
Vue.component('post-list', require('./components/PostList').default);
Vue.component('line-chart', require('./components/LineChart').default);


// Plugins
Vue.use(VueNotification, {
    timer: 20,
    infiniteTimer:true
  });


// Directives
Vue.directive('loading', require('./components/loadingButton'));
Vue.directive('click-outside', require('./components/clickOutside'));