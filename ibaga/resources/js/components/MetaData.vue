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
                <!-- <form data-ember-action="" data-ember-action-738="738"> -->
                  <div id="ember731" class="form-group ember-view">
                    <label for="meta-title">Meta Title</label>
                    <input
                      ref="title"
                      :form="form"
                      name="meta_title"
                      id="meta-title"
                      class="post-setting-meta-title ember-text-field gh-input ember-view"
                      type="text"
                      v-model="ntitle"
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
                      class="post-setting-meta-description ember-text-area gh-input ember-view"
                    ></textarea>
                    <p>
                      Recommended: <b>156</b> characters. You’ve used
                      <span class="word-count" style="color: rgb(159, 187, 88);"
                        >{{ this.ndescription.length }}</span
                      >
                    </p>
                    <p
                      id="ember734"
                      style="display: none;"
                      class="response ember-view"
                    ></p>
                  </div>
                  <div id="ember735" class="form-group ember-view">
                    <label for="canonicalUrl">Canonical URL</label>
                    <input
                      name="post-setting-canonicalUrl"
                      id="ember736"
                      class="post-setting-canonicalUrl ember-text-field gh-input ember-view"
                      type="text"
                    />
                    <p
                      style="display: none;"
                      class="response ember-view"
                    ></p>
                  </div>
                  <div class="form-group">
                    <label>Search Engine Result Preview</label>
                    <div class="seo-preview">
                      <div class="seo-preview-title">{{ this.ntitle }}</div>
                      <div class="seo-preview-link">
                        http://localhost:2368/hkjnlkfnnm/
                      </div>
                      <div class="seo-preview-description">{{ this.ndescription }}</div>
                    </div>
                  </div>
                <!-- </form> -->
              </div>
              <!---->
            </div>   
</template>


<style scoped>
/* Settings Menu
/* ---------------------------------------------------------- */


/* Container
/* ---------------------------------------------------------- */

.settings-menu-container {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    width: 350px;
    max-width: 100%;
    overflow: hidden;
    background: var(--lightgrey);
    /* background: color-mod(var(--lightgrey) l(+4%)); */
    transition: transform 0.4s cubic-bezier(0.1, 0.7, 0.1, 1);
    transform: translate3d(350px, 0px, 0px);
}

.settings-menu-expanded.settings-menu-container {
    transform: translate3d(0, 0px, 0px)!important;
}

.settings-menu-container .settings-menu-pane {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    overflow: auto;
    opacity: 1;
    transform: translate3d(0, 0px, 0px);
    -webkit-overflow-scrolling: touch;
}

@media (min-width: 901px) {
    .settings-menu-container .settings-menu-pane {
        transition: transform 0.4s cubic-bezier(0.1, 0.7, 0.1, 1);
    }
}

.settings-menu-container .settings-menu-pane.settings-menu-pane-out-left {
    transform: translate3d(-100%, 0px, 0px);
}

.settings-menu-container .settings-menu-pane.settings-menu-pane-out-right {
    transform: translate3d(100%, 0px, 0px);
}

.settings-menu-container .settings-menu-pane.settings-menu-pane-in {
    transform: translate3d(0, 0px, 0px);
}


/* Header
/* ---------------------------------------------------------- */

.settings-menu-header {
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 24px;
}

.settings-menu-header h4 {
    margin: 0;
    font-size: 1.6rem;
    line-height: 1.375;
    font-weight: normal;
}

.settings-menu-header .close {
    margin-right: -15px;
    padding: 10px 15px;
    font-size: 12px;
    line-height: 12px;
}

.settings-menu-header .close svg {
    width: 12px;
    height: 12px;
    fill: var(--darkgrey);
}

.settings-menu-header.subview h4 {
    text-align: center;
}

.settings-menu-header.subview .back {
    margin-left: -15px;
    padding: 10px 15px;
    line-height: 14px;
}

.settings-menu-header.subview .back svg {
    width: 14px;
    height: 14px;
}

.settings-menu-header.subview .back svg path {
    fill: var(--darkgrey);
}

/* Content
/* ---------------------------------------------------------- */

.settings-menu-content {
    padding: 0 24px 24px;
}

.settings-menu-content label code {
    font-weight: normal;
}

.settings-menu-content .gh-image-uploader {
    margin: 0 0 1.6rem 0;
}

.settings-menu-content .gh-image-uploader .description {
    font-size: 1.4rem;
}

.settings-menu-content .gh-image-uploader form {
    padding: 35px 45px;
}

.settings-menu-content .gh-image-uploader.-with-image {
    width: auto;
    min-height: 50px;
    max-height: 250px;
    margin-top: 0;
}

.settings-menu-content textarea {
    height: 108px;
}

.settings-menu-content textarea.gh-input {
    font-size: 1.5rem;
    line-height: 1.3em;
}

.settings-menu-content .gh-cm-editor-textarea {
    min-height: 170px;
}

.settings-menu-content .nav-list {
    margin-top: 3rem;
}

.settings-menu-content .word-count {
    font-weight: bold;
}

.ghost-url-preview {
    width: 98%;
    /* Preview never wider than input */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.settings-menu-delete-button {
    padding-left: 0;
    color: var(--red);
    font-size: 1rem;
    text-transform: uppercase;
}

.settings-menu-delete-button span {
    padding: 0;
    font-size: inherit;
}

.settings-menu-delete-button svg {
    margin-bottom: 1px;
}

.settings-menu-delete-button svg path {
    stroke: var(--red);
    fill: var(--red);
    stroke-width: 1px;
}

.settings-menu-delete-button:hover,
.settings-menu-delete-button:hover svg path {
    stroke: color-mod(var(--red) lightness(-10%));
    fill: color-mod(var(--red) lightness(-10%));
    color: color-mod(var(--red) lightness(-10%));
}

.post-setting-custom-excerpt {
    font-size: 1.5rem;
    line-height: 1.35em;
}

.settings-menu-content .CodeMirror {
    height: 170px;
    min-height: 170px;
    padding: 0;
}

.settings-menu-content .CodeMirror:hover {
    cursor: text;
}

.settings-menu-content .CodeMirror-scroll {
    min-height: 170px;
}

.settings-menu-content .for-radio .input-toggle-component,
.settings-menu-content .for-checkbox .input-toggle-component {
    background: #fff;
}


/* Background
/* ---------------------------------------------------------- */

.settings-menu-expanded .content-cover,
.mobile-menu-expanded .content-cover {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 900;
    transition: transform 0.4s cubic-bezier(0.1, 0.7, 0.1, 1);
    /* Not off the screen, to give a parallax effect */
}
.settings-menu-expanded .content-cover {
    transform: translate3d(-350px, 0px, 0px);
}
.mobile-menu-expanded .content-cover {
    transform: translate3d(205px, 0px, 0px);
}


/* Badges
/* ---------------------------------------------------------- */
.gh-setting-title .gh-badge {
    font-size: 13px;
}



#subview>div{
    display: none;
    height: 100vh;
    background: var(--lightgrey);
}
#subview>div.active{
    display: block!important;
}
</style>