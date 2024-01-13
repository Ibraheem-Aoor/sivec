<div class="modal fade" id="project-category-create-update-modal">
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
                                    <label for="name">{{ __('custom.name_ar') }}</label>
                                    <input type="text" name="name_ar" id="name_ar" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.name_en') }}</label>
                                    <input type="text" name="name_en" id="name_en" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.parent_category') }}</label>
                                    <select name="project_category_id" id="project_category_id" class="form-control">
                                        <option value="">--{{ __('custom.select') }}--</option>
                                        @foreach ($categories as $category)
                                            {{-- @if (!($category->subCategories->isEmpty()))
                                            <label for="{{ $category->id }}">{{ $category->name }}</label>
                                                <optgroup id="{{ $category->id }}">
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @foreach ($category->subCategories as $sub_category)
                                                        <option value="{{ $sub_category->id }}">
                                                            {{ $sub_category->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @else --}}
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            {{-- @endif --}}
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">{{ __('custom.status') }}</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">--{{ __('custom.select') }}--</option>
                                        @foreach ($show_statuses as $key => $object)
                                            <option value="{{ $key }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
