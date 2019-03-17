<div class="modal fade" id="modal-publish" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-12">
                        <label for="published_at" class="font-weight-bold">Publish date (m/d/y h:m)</label>
                        <p class="text-muted">Post scheduling uses a 24-hour time format and is utilizing the <span class="font-weight-bold">{{ now()->timezoneName }}</span> timezone.</p>

                        <date-time-picker value="{{ $data['post']->published_at->format('Y-m-d\TH:i') }}"></date-time-picker>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary"
                   onclick="event.preventDefault();document.getElementById('form-edit').submit();"
                   aria-label="Update post">Update post</a>
                <button class="btn btn-link text-muted" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>