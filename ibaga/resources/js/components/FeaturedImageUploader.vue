<script type="text/ecmascript">
    import _ from 'lodash';
    export default {
        props: ['postId', 'currentImageUrl', 'currentCaption', 'unsplash', 'form'],
        data() {
            return {
                imageUrl:  this.currentImageUrl ? this.currentImageUrl : '',
                caption: this.currentCaption ? this.currentCaption : '',
                imagePickerKey: '',
                uploadProgress: 0,
                uploading: false,
                modalShown: true,
            }
        },
        mounted() {
            this.$parent.$on('openingFeaturedImageUploader', data => {
                this.imageUrl = this.currentImageUrl;
                this.caption = this.currentCaption;
                this.modalShown = true;
            });
        },
        methods: {
            /**
             * Save the image.
             */
            saveImage() {
                this.$emit('changed', {url: this.imageUrl, caption: this.caption});
                this.close();
            },
            /**
             * Close the modal.
             */
            close() {
                this.imagePickerKey = _.uniqueId();
                this.modalShown = false;
            },
            /**
             * Update the selected image.
             */
            updateImage({url, caption}) {
                this.imageUrl = url;
                this.caption = caption;
                this.uploading = false;
            },
            /**
             * Update the upload progress.
             */
            updateProgress({progress}) {
                this.uploadProgress = progress;
            }
        }
    }
</script>


<template>
    <div>
        <div v-if="imageUrl" id="current-image">
            <preloader v-if="uploading"></preloader>

                <img :src="imageUrl" class="w-100">
            <div class="form-group py-2" v-if="imageUrl && !uploading">
                <label class="input-label">Caption</label>

                <textarea :form="form" name="featured_image_caption" rows="2" v-model="caption" ref="caption" class="form-control border-0 px-0" placeholder="Add caption to the image"></textarea>
            </div>
        </div>

        <input :form="form" hidden type="hidden" name="featured_image" v-model="imageUrl">

        <image-picker
                :key="imagePickerKey"
                class="mt-5"
                :unsplash="this.unsplash"
                @changed="updateImage"
                @progressing="updateProgress"
                @uploading="uploading = true">
        </image-picker>
        <hr>
        <!-- <button class="btn-sm btn-primary mt-10" @click="saveImage">Save Image</button> -->
        <!-- <button class="btn-sm btn-light mt-10" @click="close">Cancel</button> -->

    </div>
</template>

<style>
</style>