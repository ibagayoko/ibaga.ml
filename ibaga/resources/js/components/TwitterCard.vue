<script type="text/ecmascript">
    export default {
        props: ['title', 'description', 'baseUrl', 'form'],
        data() {
            return {
                ntitle: this.title ? this.title : '',
                ndescription: this.description ? this.description : ''
            }
        },
        mounted() {
            // this.$refs.input.style.width = this.value.length ? '25px' : '108px';
            this.$refs.title.placeholder = this.title.length ? '' : this.title;
            this.$refs.description.placeholder = this.title.length ? '' : this.description;
        },
        methods: {
           
        }
    }
</script>

<template>
<div class="twitter" >
  <div class="settings-menu-header subview">
    <button class="back settings-menu-header-action" data-subview-back="#sidebar" data-ember-action="" data-ember-action-752="752">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
        <path
          fill="#010101"
          d="M37.802 46.247L12.376 24 37.801 1.753A1 1 0 1 0 36.484.247l-26.286 23a1.004 1.004 0 0 0 .001 1.506l26.286 23a.997.997 0 0 0 1.411-.095 1 1 0 0 0-.094-1.411z"></path>
        </svg>
      <span class="hidden">Back</span>
    </button>
    <h4>Twitter Card</h4>
    <div style="width:23px;"></div>
  </div>
      
  <div class="settings-menu-content">
      <div class="form-group ember-view">
        <label for="twitter-title">Twitter Title</label>
        <input :form="form" ref="title" v-model="ntitle" name="twitter_title" 
          class="form-control border-0 px-0" type="text"
        />
        <p style="display: none;" class="response ember-view"></p>
      </div>
      <div class="form-group ember-view">
        <label for="twitter-description">Twitter Description</label>
        <textarea
          ref="description"
          v-model="ndescription"
          name="twitter_description"
          :form="form"
          class="form-control border-0 px-0"
        ></textarea>
        <p style="display: none;" class="response ember-view"></p>
      </div>
      <div class="form-group">
        <label>Preview</label>
        <div class="gh-twitter-preview">
          <div class="gh-twitter-preview-content">
            <div class="gh-twitter-preview-title">{{ this.ntitle }}</div>
            <div class="gh-twitter-preview-description">{{ this.ndescription }}</div>
            <div class="gh-twitter-preview-footer">
              <div class="gh-twitter-preview-footer-left">
                url
              </div>
              <div class="gh-twitter-preview-footer-right"></div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
</template>
