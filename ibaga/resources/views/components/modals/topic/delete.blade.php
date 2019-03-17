<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="font-weight-bold lead">Delete</p>

                Deleted topics are gone forever. Are you sure?
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-danger"
                   onclick="event.preventDefault();document.getElementById('form-delete').submit();"
                   aria-label="Delete">Delete</a>
                <button type="button" class="btn btn-link text-muted" data-dismiss="modal">Cancel</button>

                <form id="form-delete" action="{{ route('canvas.topic.destroy', $data['topic']->id) }}" method="POST" style="display: none">
                    @method('DELETE')
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>