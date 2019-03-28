<script type="text/ecmascript">
    export default {
        props: ['title', 'description', 'baseUrl', 'form', 'author'],
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
<div class="faebook">
              <!---->
              <!---->
              <div class="settings-menu-header subview">
                <button
                  class="back settings-menu-header-action"
                  data-subview-back="#sidebar"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                    <path
                      fill="#010101"
                      d="M37.802 46.247L12.376 24 37.801 1.753A1 1 0 1 0 36.484.247l-26.286 23a1.004 1.004 0 0 0 .001 1.506l26.286 23a.997.997 0 0 0 1.411-.095 1 1 0 0 0-.094-1.411z"
                    ></path>
                    </svg>
                    <span class="hidden">Back</span>
                </button>
                <h4>Facebook Card</h4>
                <div style="width:23px;"></div>
              </div>
      
              <div class="settings-menu-content">
                  <div id="ember780" class="form-group ember-view">
                    <label for="og-title">Facebook Title</label>
                    <input
                    ref="title"
                    v-model="ntitle"
                      name="og_title"
                      id="og-title"
                      class="post-setting-og-title ember-text-field gh-input ember-view"
                      type="text"
                    />
                    <p
                      id="ember781"
                      style="display: none;"
                      class="response ember-view"
                    ></p>
                  </div>
                  <div id="ember782" class="form-group ember-view">
                    <label for="og-description">Facebook Description</label>
                    <textarea
                    ref="description"
                    :form="form"
                    v-model="ndescription"
                      name="og_description"
                      id="og-description"
                      class="post-setting-og-description ember-text-area gh-input ember-view"
                    ></textarea>
                    <p
                      id="ember783"
                      style="display: none;"
                      class="response ember-view"
                    ></p>
                  </div>
                  <div class="form-group">
                    <label>Preview</label>
                    <div class="gh-og-preview">
                      <!---->
                      <div class="gh-og-preview-content">
                        <div class="gh-og-preview-title">{{ ntitle }}</div>
                        <div class="gh-og-preview-description">{{ ndescription }}</div>
                        <div class="gh-og-preview-footer">
                          <div class="gh-og-preview-footer-left">
                            localhost:2368
                            <span class="gh-og-preview-footer-left-divider">|</span>
                            by
                            <span class="gh-og-preview-footer-author">{{ author }}</span>
                          </div>
                          <div class="gh-og-preview-footer-right"></div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
      
              <!---->
            </div>
</template>

