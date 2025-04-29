<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <form name="confirm-delete-form" id="confirm-delete-form">
                <div class="modal-header">
                    <h4 class="modal-title text-white">{{ __('custom.Caution') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-white"></p>
                </div>
                <div class="modal-footer justify-content-between text-white">
                    <button type="button" class="btn btn-outline-light"
                        data-bs-dismiss="modal">{{ __('custom.close') }}</button>
                    <button type="submit" class="btn btn-outline-light">{{ __('custom.delete') }}</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
