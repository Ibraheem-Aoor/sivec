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
                                            <input type="file" name="home_image" id="changeImg_1"
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
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="">{{ __('custom.main_image') }}</label>
                                <div class="avatar-picture">
                                    <div class="image-input image-input-outline" id="imgUserProfile">
                                        <div class="image-input-wrapper" id="image-input-wrapper-2"
                                            style="background-image: url('{{ asset('admin_assets/dist/img/image_placeholder.jpg') }}');">
                                        </div>
                                        <label class="btn">
                                            <i>
                                                <img src="{{ asset('admin_assets/dist/img/edit.svg') }}" alt=""
                                                    class="img-fluid">
                                            </i>
                                            <input type="file" name="image" id="changeImg_2"
                                                accept=".png, .jpg, .jpeg">
                                            <input type="button" value="Upload" id="uploadButton_2">
                                        </label>

                                    </div>
                                </div>
                                <div class="text-center">

                                    <span class="text-danger text-center">775*450</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="category_id">{{ __('custom.category') }}</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">--{{ __('custom.select') }}--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="category_id">{{ __('custom.client') }}</label>
                                    <select name="client_id" id="client_id" class="form-control">
                                        <option value="">--{{ __('custom.select') }}--</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="category_id">{{ __('custom.budget') }}</label>
                                    <input type="text" name="budget" id="budget" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6">
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
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="basic_info">{{ __('cutom.description') }}</label>
                                    <textarea name="basic_info" id="basic_info" name="basic_info" cols="30" rows="10" class="form-control"></textarea>
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
