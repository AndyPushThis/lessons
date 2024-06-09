<div class="modal fade" id="modal-delete" aria-hidden="true" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <form method="post" action="{{ route('admin.' . str(class_basename($model))->lower()->plural()  . '.destroy', [str(class_basename($model))-> lower() -> toString() => $model]) }}" class="modal-content">
            @csrf
            @method('delete')
            <div class="modal-header">
                <h4 class="modal-title">Delete {{ class_basename($model) }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
