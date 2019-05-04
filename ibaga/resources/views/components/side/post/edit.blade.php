<div id="sidebar" class="settings-menu-container">
        <div id="entry-controls">
          <div class="settings-menu-pane-in  settings-menu settings-menu-pane">
            <div class="settings-menu-header">
              <h4>Post Settings</h4>
              <button class="close settings-menu-header-action close-side-settings" >
              <svg version="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M12.707 12L23.854.854a.5.5 0 0 0-.707-.707L12 11.293.854.146a.5.5 0 0 0-.707.707L11.293 12 .146 23.146a.5.5 0 0 0 .708.708L12 12.707l11.146 11.146a.5.5 0 1 0 .708-.706L12.707 12z"></path>
              </svg>
              <span class="hidden">Close</span>
              </button>
            </div>
            <div class="settings-menu-content">
              <div id="ember165" class="ember-view">
                <featured-image-uploader
                form="form-edit"
                :post-id="'{{ $data['post']['id'] }}'"
                :current-caption="'{{  $data['post']['featured_image_caption'] }}'"
                :unsplash="'{{ config('app.unsplash.access_key') }}'"
                :current-image-url="'{{  $data['post']['featured_image']}}'">
                </featured-image-uploader>
              </div>
                <slug :model="{name:'{{ $data['post']["slug"] }}'}" inline-template>
                  <div class="form-group">
                    <label for="url">Post URL</label>
                    {{-- hide in create form <a class="post-view-link" target="_blank" href="http://localhost:2368/p//">
                     Preview
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                      <path
                        d="M24 24H8V8.062l4-.063v-4H4v24h24v-10h-4zM16 4l4 4-6 6 4 4 6-6 4 4V4z"
                      ></path>
                     </svg>
                    </a> --}}
                  
                  <div class="">
                   
                    
                    <input
                    form="form-edit"
                      name="slug"
                      v-model="name"
                      id="url"
                      class="form-control"
                      type="text"
                    />
                  </div>
                  <p  class="ghost-url-preview description ember-view">
                    localhost:2368/@{{ slug }}/
                  </p>
                </div>
              </slug>
      
                <div class="form-group">
                  <label>Publish Date</label>
                  <date-time-picker form="form-edit" value="{{ $data['post']['published_at'] }}"></date-time-picker>
                </div>
      
                <div class="form-group">
                  <label for="tag-input">Tags</label>
                <tag-select form="form-edit" :tags="{{ $data['tags'] }}" :tagged="{{ $data['post']['tags']}}"></tag-select>
                </div>
      
                <div  class="form-group ember-view">
                  <label for="custom-excerpt">Summary</label>
                  <textarea form="form-edit" name="summary" class="form-control border-0 px-0" rows="1"
                                  placeholder="A descriptive summary.." title="Summary">{{ $data['post']['summary'] }}</textarea>
                </div>
            
                <ul class="nav-list nav-list-block">
                  <li
                    class="nav-list-item toggle-subview" data-sub-target="#mediasub"
                  >
                    <button type="button" >
                      <b>Meta Data</b>
                      <span>Extra content for search engines</span>
                    </button>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                      <path
                        fill="#010101"
                        d="M37.802 23.247l-26.286-23a1 1 0 0 0-1.317 1.506L35.624 24 10.199 46.247a1 1 0 1 0 1.317 1.506l26.286-23a1.001 1.001 0 0 0 0-1.506z"
                      ></path>
                    </svg>
                  </li>
                  <li
                    class="nav-list-item toggle-subview" data-sub-target="#twittersub"
                  >
                    <button type="button" >
                      <b>Twitter Card</b>
                      <span>Customise structured data for Twitter</span>
                    </button>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                      <path
                        fill="#010101"
                        d="M37.802 23.247l-26.286-23a1 1 0 0 0-1.317 1.506L35.624 24 10.199 46.247a1 1 0 1 0 1.317 1.506l26.286-23a1.001 1.001 0 0 0 0-1.506z"
                      ></path>
                    </svg>
                  </li>
                  <li
                    class="nav-list-item toggle-subview" data-sub-target="#fbsub"
                  >
                    <button type="button" >
                      <b>Facebook Card</b>
                      <span>Customise Open Graph data</span>
                    </button>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                      <path
                        fill="#010101"
                        d="M37.802 23.247l-26.286-23a1 1 0 0 0-1.317 1.506L35.624 24 10.199 46.247a1 1 0 1 0 1.317 1.506l26.286-23a1.001 1.001 0 0 0 0-1.506z"
                      ></path>
                    </svg>
                  </li>
               
                </ul>
      
                <div class="form-group for-checkbox">
                  <label
                    class="checkbox"
                    for="featured"
                  >
                    <input form="form-edit" id="featured" name="featured" class="gh-input post-settings-featured" type="checkbox" />
                    <span class="input-toggle-component"></span>
                    <p
                      class="liquid-tether-target liquid-tether-element-attached-middle liquid-tether-element-attached-center liquid-tether-target-attached-middle liquid-tether-enabled"
                    >
                      Feature this post
                    </p>
                  </label>
                </div>
                <div class="form-group for-checkbox">
                    <label
                      class="checkbox"
                      for="published"
                    >
                      <input form="form-edit" id="published" name="published" class="gh-input post-settings-featured" 
                      @if ($data['post']['published']==true)
                       checked 
                       @endif 
                       type="checkbox" />
                      <span class="input-toggle-component"></span>
                      <p
                        class="liquid-tether-target liquid-tether-element-attached-middle liquid-tether-element-attached-center liquid-tether-target-attached-middle liquid-tether-enabled"
                      >
                      Publish
                      </p>
                    </label>
                  </div>
      
      
                <button
                  class="gh-btn gh-btn-link gh-btn-icon settings-menu-delete-button"
                  type="button" data-toggle="modal" data-target="#modal-delete"
                >
                  <span
                    ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                      <path
                        d="M30.688 4H22V.687a.694.694 0 0 0-.688-.688H10.687a.694.694 0 0 0-.688.688V4H1.311c-.375 0-.625.313-.625.688s.25.625.625.625h3.375v26c0 .375.25.688.625.688h21.375c.375 0 .625-.313.625-.688v-26h3.375c.375 0 .625-.25.625-.625S31.061 4 30.686 4zM11.313 1.313h9.375v2.688h-9.375zM26 30.688H6V5.313h20zM10.688 9.313a.694.694 0 0 0-.688.688v15.313c0 .375.313.688.688.688s.625-.313.625-.688V10.001c0-.375-.25-.688-.625-.688zm5.312 0a.694.694 0 0 0-.688.688v15.313c0 .375.313.688.688.688s.688-.313.688-.688V10.001A.694.694 0 0 0 16 9.313zm4.688.687v15.313c0 .375.25.688.625.688s.688-.313.688-.688V10c0-.375-.313-.688-.688-.688s-.625.313-.625.688z"
                      ></path>
                    </svg>
                    Delete Post</span>
                </button>
              {{-- </form> --}}
            </div>
          </div>
      
          <div id="subview" class="settings-menu-pane-out-right settings-menu settings-menu-pane">
         
            <div id="mediasub">
                <meta-data form="form-edit" title="{{ $data['post']["title"] }}" description="{{ $data['meta']["meta_description"] }}"></meta-data>
            </div>
            <div id="twittersub">
                <twitter-card form="form-edit" title="{{ $data['meta']["twitter_title"] }}" description="{{  $data['meta']["twitter_description"] }}"></twitter-card>
            </div>
            <div id="fbsub">
                <facebook-card form="form-edit" title="{{  $data['meta']["og_title"] }}" description="{{  $data['meta']["og_description"] }}" ></facebook-card>
            </div>
          
          </div>
        </div>
    </div>
      