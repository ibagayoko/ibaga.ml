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
<div class="active" >
              <div class="settings-menu-header subview">
                <button class="back settings-menu-header-action" data-subview-back="#sidebar" data-ember-action-730="730">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                      <path fill="#010101"
                      d="M37.802 46.247L12.376 24 37.801 1.753A1 1 0 1 0 36.484.247l-26.286 23a1.004 1.004 0 0 0 .001 1.506l26.286 23a.997.997 0 0 0 1.411-.095 1 1 0 0 0-.094-1.411z">
                      </path>
                  </svg>
                  <span class="hidden">Back</span>
                </button>
                <h4>Meta Data</h4>
                <div style="width:23px;"></div>
              </div>
              <div class="settings-menu-content">
                  <div id="ember731" class="form-group ember-view">
                    <label for="meta-title">Meta Title</label>
                    <input
                      ref="title"
                      :form="form"
                      name="meta_title"
                      class="form-control border-0 px-0"
                      type="text"
                      v-model="ntitle"
                      disabled
                    />
                    <p>
                      Recommended: <b>70</b> characters. You’ve used
                      <span class="word-count" style="color: rgb(159, 187, 88);"
                        >{{ this.ntitle.length }}</span>
                    </p>
                    <p
                      id="ember732"
                      style="display: none;"
                      class="response ember-view"
                    ></p>
                  </div>
                  <div id="ember733" class="form-group ember-view">
                    <label for="meta-description">Meta Description</label>
                    <textarea
                    :form="form"
                      ref="description"
                      v-model="ndescription"
                      name="meta_description"
                      id="meta-description"
                      class="form-control border-0 px-0"
                    ></textarea>
                    <p>
                      Recommended: <b>156</b> characters. You’ve used
                      <span class="word-count" style="color: rgb(159, 187, 88);"
                        >{{ this.ndescription.length }}</span
                      >
                    </p>
                    <p style="display: none;" class="response ember-view"></p>
                  </div>
                  <div class="form-group">
                    <label>Search Engine Result Preview</label>
                    <div class="seo-preview">
                      <div class="seo-preview-title">{{ this.ntitle }}</div>
                      <div class="seo-preview-link">
                        http://url.url/url
                      </div>
                      <div class="seo-preview-description">{{ this.ndescription }}</div>
                    </div>
                  </div>
              </div>
            </div>   
</template>

