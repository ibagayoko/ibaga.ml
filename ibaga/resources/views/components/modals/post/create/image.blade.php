<div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" id="featured-image-unsplash-modal" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="font-weight-bold lead">Featured image</p>

                <featured-image-uploader
                        :post-id="'{{ $data['id']->toString() }}'"
                        :current-caption="'{{ old('featured_image_caption') }}'"
                        :unsplash="'{{ config('app.unsplash.access_key') }}'">
                </featured-image-uploader>
            </div>
            <div class="modal-footer">
                <button class="btn btn-link text-muted" data-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>