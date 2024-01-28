<div class="modal fade" id="project-create-update-modal">
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
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="">{{ __('custom.home_image') }}</label>
                                <div class="avatar-picture">
                                    <div class="image-input image-input-outline" id="imgUserProfile">
                                        <div class="image-input-wrapper" id="image-input-wrapper-1"
                                            style="background-image: url('{{ asset('admin_assets/dist/img/image_placeholder.jpg') }}');">
                                        </div>
                                        <label class="btn">
                                            <i>
                                                <img src="{{ asset('admin_assets/dist/img/edit.svg') }}" alt=""
                                                    class="img-fluid">
                                            </i>
                                            <input type="file" name="image" id="changeImg_1"
                                                accept=".png, .jpg, .jpeg">
                                            <input type="button" value="Upload" id="uploadButton_1">
                                        </label>

                                    </div>
                                </div>
                                <div class="text-center">

                                    <span class="text-danger text-center">400*475</span>
                                </div>
                            </div>
                        </div>
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

                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="category_id">{{ __('custom.category') }}</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">--{{ __('custom.select') }}--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="category_id">{{ __('custom.projects.type') }}</label>
                                <select name="project_type_id" id="project_type_id" class="form-control">
                                    <option value="">--{{ __('custom.select') }}--</option>
                                    @foreach ($project_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="category_id">{{ __('custom.projects.style') }}</label>
                                <select name="project_style_id" id="project_style_id" class="form-control">
                                    <option value="">--{{ __('custom.select') }}--</option>
                                    @foreach ($project_styles as $style)
                                        <option value="{{ $style->id }}">{{ $style->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 d-none">
                                <div class="form-group">
                                    <label for="category_id">{{ __('custom.budget') }}</label>
                                    <input type="text" name="budget" id="budget" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group">
                                <label for="category_id">{{ __('custom.gallery_images') }}</label>
                                <input type="file" name="gallery_images[]" multiple class="custom-form">
                            </div>
                        </div>
                        <div class="row mb-2 d-none">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="category_id">{{ __('custom.achieve_date') }}</label>
                                    <input type="date" name="achieve_date" id="achieve_date" class="form-control">
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
                        <div class="row mb-2 d-none">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="basic_info">{{ __('custom.description_ar') }}</label>
                                    <textarea name="basic_info_ar" id="basic_info_ar" name="basic_info_ar" cols="30" rows="10"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="basic_info">{{ __('custom.description_en') }}</label>
                                    <textarea name="basic_info_en" id="basic_info_en" name="basic_info_en" cols="30" rows="10"
                                        class="form-control"></textarea>
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
