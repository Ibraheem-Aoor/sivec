<div class="modal fade" id="project-category-create-update-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form enctype="multipart/form-data">
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
                                                accept=".png, .jpg, .jpeg , .webp">
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
                                    <input type="text" name="name_ar" id="name_ar" class="form-control ar-only">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.name_en') }}</label>
                                    <input type="text" name="name_en" id="name_en" class="form-control en-only">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.parent_category') }}</label>
                                    <select name="project_category_id" id="project_category_id" class="form-control">
                                        <option value="">--{{ __('custom.select') }}--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            {{-- @endif --}}
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
