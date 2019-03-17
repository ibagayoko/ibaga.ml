<div id="sidebar" class="settings-menu-container">
        <div id="entry-controls">
          <div class="settings-menu-pane-in  settings-menu settings-menu-pane">
            <div class="settings-menu-header">
              <h4>Post Settings</h4>
              <button class="close settings-menu-header-action" data-ember-action=""data-ember-action-164="164">
              <svg version="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M12.707 12L23.854.854a.5.5 0 0 0-.707-.707L12 11.293.854.146a.5.5 0 0 0-.707.707L11.293 12 .146 23.146a.5.5 0 0 0 .708.708L12 12.707l11.146 11.146a.5.5 0 1 0 .708-.706L12.707 12z"></path>
              </svg>
              <span class="hidden">Close</span>
              </button>
            </div>
            <div class="settings-menu-content">
              <div id="ember165" class="ember-view">
                <section id="ember166" class="gh-image-uploader ember-view">
                  <div class="failed">Something went wrong :(</div>
                  <div class="progress-container">
                    <div class="progress">
                      <div class="bar fail" style="width: 0"></div>
                    </div>
                  </div>
                  <button
                    class="gh-btn gh-btn-green"
                    data-ember-action=""
                    data-ember-action-416="416"
                  >
                    <span>Try Again</span>
                  </button>
      
                  <!---->
                </section>
              </div>
              {{-- <form> --}}
                <slug :model="{name:'haha'}" inline-template>
                <div class="form-group">
                  <label for="url">Post URL</label>
                  <a
                    class="post-view-link"
                    target="_blank"
                    href="http://localhost:2368/p/487f494c-16fe-444f-b428-a66cbdbd2207/"
                  >
                    Preview
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                      <path
                        d="M24 24H8V8.062l4-.063v-4H4v24h24v-10h-4zM16 4l4 4-6 6 4 4 6-6 4 4V4z"
                      ></path>
                    </svg>
                  </a>
                  
                  <div class="gh-input-icon gh-icon-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path
                        d="M14.5 12.5l.086.086a2 2 0 0 0 2.828 0l3.965-3.964a3.01 3.01 0 0 0 0-4.243l-1.758-1.757a3.008 3.008 0 0 0-4.242 0l-3.965 3.964a2 2 0 0 0 0 2.829l.086.085m-2 2l-.086-.085a2 2 0 0 0-2.828 0l-3.965 3.964a3.01 3.01 0 0 0 0 4.243l1.758 1.757a3.008 3.008 0 0 0 4.242 0l3.965-3.964a2 2 0 0 0 0-2.829L12.5 14.5m-4.389 1.389l7.778-7.778"
                        stroke="#000"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-miterlimit="10"
                        fill="none"
                      ></path>
                    </svg>
                    
                    <input
                    form="form-create"
                      name="slug"
                      v-model="name"
                      id="url"
                      class="post-setting-slug ember-text-field gh-input ember-view"
                      type="text"
                    />
                  </div>
                  <p id="ember169" class="ghost-url-preview description ember-view">
                    localhost:2368/@{{ slug }}/
                  </p>
                </div>
            </slug>
      
                <div class="form-group">
                  <label>Publish Date</label>
                  <div class="gh-date-time-picker">
                    {{-- <div id="ember172" class="ember-basic-dropdown ember-view">
                      <div
                        aria-owns="ember-basic-dropdown-content-ember172"
                        tabindex="-1"
                        data-ebd-id="ember172-trigger"
                        role="button"
                        id="ember174"
                        class="ember-basic-dropdown-trigger ember-power-datepicker-trigger ember-basic-dropdown-trigger--in-place ember-view">
                        <div class="gh-date-time-picker-date ">
                          <input readonly="" type="text" />
                          <svg version="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M23.5 2H20V.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V2H8V.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V2H.5a.5.5 0 0 0-.5.5v21a.5.5 0 0 0 .5.5h23a.5.5 0 0 0 .5-.5v-21a.5.5 0 0 0-.5-.5zM17 1h2v3h-2V1zM5 1h2v3H5V1zM4 3v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V3h8v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V3h3v4H1V3h3zM1 23V8h22v15H1zm20.5-11a.5.5 0 0 0 0-1H17V9.5a.5.5 0 0 0-1 0V11h-4V9.5a.5.5 0 0 0-1 0V11H7V9.5a.5.5 0 0 0-1 0V11H2.5a.5.5 0 0 0 0 1H6v3H2.5a.5.5 0 0 0 0 1H6v3H2.5a.5.5 0 0 0 0 1H6v1.5a.5.5 0 0 0 1 0V20h4v1.5a.5.5 0 0 0 1 0V20h4v1.5a.5.5 0 0 0 1 0V20h4.5a.5.5 0 0 0 0-1H17v-3h4.5a.5.5 0 0 0 0-1H17v-3h4.5zM7 12h4v3H7v-3zm0 7v-3h4v3H7zm9 0h-4v-3h4v3zm0-4h-4v-3h4v3z"></path>
                          </svg>
                        </div>
                      </div>
                      <div id="ember-basic-dropdown-content-ember172" class="ember-basic-dropdown-content-placeholder" style="display: none;"></div>
                     </div> --}}
                    <div class="gh-date-time-picker-time "> 
                            <date-time-picker form="form-create" value="{{ now()->format('Y-m-d\TH:i') }}"></date-time-picker>
                      {{-- <input type="text" />
                      <small class="gh-date-time-picker-timezone">(UTC)</small> --}}
                    </div>

                  </div>
                  <!---->
                </div>
      
                <div class="form-group">
                  <label for="tag-input">Tags</label>
                {{-- <tag-select :tags="{{ $data['tags'] }}" :tagged="{{ $data['post']->tags }}"></tag-select> --}}
                <tag-select form="form-create" :tags="{{ $data['tags'] }}"></tag-select>


                  {{-- <div id="ember178" class="gh-token-input  ember-view">
                    <div id="ember179" class="gh-token-input  ember-view">
                      <div id="ember180" class="ember-basic-dropdown ember-view">
                        <div
                          aria-owns="ember-basic-dropdown-content-ember180"
                          tabindex="0"
                          data-ebd-id="ember180-trigger"
                          role="button"
                          id="tag-input"
                          class="ember-power-select-trigger ember-power-select-multiple-trigger ember-basic-dropdown-trigger ember-basic-dropdown-trigger--in-place ember-view"
                        >
                          <ul
                            id="ember-power-select-multiple-options-ember180"
                            class="ember-power-select-multiple-options sortable-objects ember-view"
                          >
                            <!---->
                            <input
                              class="ember-power-select-trigger-multiple-input"
                              tabindex="0"
                              autocomplete="off"
                              autocorrect="off"
                              autocapitalize="off"
                              spellcheck="false"
                              id="ember-power-select-trigger-multiple-input-ember180"
                              aria-controls="ember-power-select-options-ember180"
                              style="width: 100%;"
                              placeholder=""
                              type="search"
                            />
                          </ul>
                          <span class="ember-power-select-status-icon"></span>
                        </div>
                        <div
                          id="ember-basic-dropdown-content-ember180"
                          class="ember-basic-dropdown-content-placeholder"
                          style="display: none;"
                        ></div>
                      </div>
                    </div>
                  </div> --}}
                </div>
      
                <div id="ember183" class="form-group ember-view">
                  <label for="custom-excerpt">Summary</label>
                  {{-- <textarea
                    name="post-setting-custom-excerpt"
                    id="custom-excerpt"
                    class="post-setting-custom-excerpt ember-text-area gh-input ember-view"
                  ></textarea> --}}
                  <textarea form="form-create" name="summary" class="form-control border-0 px-0" rows="1"
                                  placeholder="A descriptive summary.." title="Summary">{{ old('summary') }}</textarea>
                  <p
                    id="ember184"
                    style="display: none;"
                    class="response ember-view"
                  ></p>
                </div>
                <div id="ember185" class="for-select form-group ember-view">
                  <label for="author-list">Authors</label>
                  <div id="ember188" class="gh-token-input  ember-view">
                    <div id="ember189" class="gh-token-input  ember-view">
                      <div id="ember190" class="ember-basic-dropdown ember-view">
                        <div
                          aria-owns="ember-basic-dropdown-content-ember190"
                          tabindex="0"
                          data-ebd-id="ember190-trigger"
                          role="button"
                          id="author-list"
                          class="ember-power-select-trigger ember-power-select-multiple-trigger ember-basic-dropdown-trigger ember-basic-dropdown-trigger--in-place ember-view"
                        >
                          <ul
                            id="ember-power-select-multiple-options-ember190"
                            class="ember-power-select-multiple-options sortable-objects ember-view"
                          >
                            <li
                              draggable="true"
                              id="ember201"
                              class="ember-power-select-multiple-option js-draggableObject draggable-object ember-view"
                            >
                              ndsjjnk
      
                              <span
                                role="button"
                                aria-label="remove element"
                                class="ember-power-select-multiple-remove-btn"
                                data-selected-index="0"
                              >
                                <svg
                                  version="1"
                                  xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 24 24"
                                  data-selected-index="0"
                                >
                                  <path
                                    d="M12.707 12L23.854.854a.5.5 0 0 0-.707-.707L12 11.293.854.146a.5.5 0 0 0-.707.707L11.293 12 .146 23.146a.5.5 0 0 0 .708.708L12 12.707l11.146 11.146a.5.5 0 1 0 .708-.706L12.707 12z"
                                  ></path>
                                </svg>
                              </span>
                            </li>
                            <input
                              class="ember-power-select-trigger-multiple-input"
                              tabindex="0"
                              autocomplete="off"
                              autocorrect="off"
                              autocapitalize="off"
                              spellcheck="false"
                              id="ember-power-select-trigger-multiple-input-ember190"
                              aria-controls="ember-power-select-options-ember190"
                              style="width: 25px"
                              placeholder=""
                              type="search"
                            />
                          </ul>
                          <span class="ember-power-select-status-icon"></span>
                        </div>
                        <div
                          id="ember-basic-dropdown-content-ember190"
                          class="ember-basic-dropdown-content-placeholder"
                          style="display: none;"
                        ></div>
                      </div>
                    </div>
                  </div>
      
                  <p
                    id="ember193"
                    style="display: none;"
                    class="response ember-view"
                  ></p>
                </div>
                <ul class="nav-list nav-list-block">
                  <li
                    class="nav-list-item"
                    data-ember-action=""
                    data-ember-action-194="194"
                  >
                    <button type="button" class="toggle-subview" data-sub-target="#mediasub">
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
                    class="nav-list-item"
                    data-ember-action=""
                    data-ember-action-195="195"
                  >
                    <button type="button" class="toggle-subview" data-sub-target="#twittersub">
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
                    class="nav-list-item"
                    data-ember-action=""
                    data-ember-action-196="196"
                  >
                    <button type="button" class="toggle-subview" data-sub-target="#fbsub">
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
                  <li
                    class="nav-list-item"
                    data-ember-action=""
                    data-ember-action-197="197"
                  >
                    <button type="button">
                      <b>Code Injection</b>
                      <span>Add styles/scripts to the header &amp; footer</span>
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
                    data-ember-action=""
                    data-ember-action-198="198"
                  >
                    <input class="gh-input post-settings-featured" type="checkbox" />
                    <span class="input-toggle-component"></span>
                    <p
                      class="liquid-tether-target liquid-tether-element-attached-middle liquid-tether-element-attached-center liquid-tether-target-attached-middle liquid-tether-enabled"
                    >
                      Feature this post
                    </p>
                  </label>
                </div>
      
                <!---->
      
                <button
                  class="gh-btn gh-btn-link gh-btn-icon settings-menu-delete-button"
                  type="button"
                  data-ember-action=""
                  data-ember-action-253="253"
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
                <meta-data form="form-create" title="hello" description="haha"></meta-data>
            </div>
            <div id="twittersub">
                <twitter-card form="form-create" title="hello" description="haha" ></twitter-card>
            </div>
            <div id="fbsub">
                    <facebook-card form="form-create" title="hello" description="haha" ></facebook-card>
            </div>
          
          </div>
        </div>
    </div>
      