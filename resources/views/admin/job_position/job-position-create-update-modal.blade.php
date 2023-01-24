<div class="modal fade" id="job-position-create-update-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.title_position') }}</label>
                                    <select name="title_id" id="title_id" class="form-control">
                                        <option value="">--{{ __('custom.select') }}--</option>
                                        @foreach ($job_titles as $title)
                                            <option value="{{ $title->id }}">{{ $title->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.vacancy') }}</label>
                                    <input type="text" class="form-control" name="vacancy">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.salary') }}</label>
                                    <input type="number" class="form-control" name="salary">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.status') }}</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">--{{ __('custom.select') }}--</option>
                                        @foreach ($show_statuses as $key => $object)
                                            <option value="{{ $key }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.hide_salary') }}</label>
                                    <input type="checkbox" name="is_salary_visible" id="hide_salary" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label for="description">{{ __('custom.description') }}</label>
                                <textarea name="description" id="description" cols="30" rows="6" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label for="">{{ __('custom.requirements') }}</label>
                                <div>
                                    <button type="button" class="add_feature btn-xs btn-primary"
                                        onclick="addNewRequirmeent($(this));"><i class="fa fa-plus"></i></button>&nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="form-group d-flex">
                                ✔️ &nbsp; &nbsp;
                                <input type="text" name="requirements[]" value="" class="form-control d-flex">
                                &nbsp;
                                <button type="button" class="add_feature btn-xs btn-primary"
                                    onclick="addNewRequirmeent($(this));"><i class="fa fa-plus"></i></button>&nbsp;
                                <button type="button" class="remove_feature btn-xs btn-danger"
                                    onclick="deleteRequirment($(this));"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default"
                        data-dismiss="modal">{{ __('custom.close') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('custom.submit') }}</button>
                    <button type="reset" hidden></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
