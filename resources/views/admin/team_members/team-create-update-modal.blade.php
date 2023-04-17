<div class="modal fade" id="team-create-update-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form name="create-update-form" action="" method="">
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
                                <div class="avatar-picture">
                                    <div class="image-input image-input-outline" id="imgUserProfile">
                                        <div class="image-input-wrapper" id="image-input-wrapper"
                                            style="background-image: url('{{ asset('admin_assets/dist/img/user.webp?v=1.0') }}');">
                                        </div>

                                        <label class="btn">
                                            <i>
                                                <img src="{{ asset('admin_assets/dist/img/edit.svg') }}" alt=""
                                                    class="img-fluid">
                                            </i>
                                            <input type="file" name="avatar" id="changeImg"
                                                accept=".png, .jpg, .jpeg">
                                            <input type="button" value="Upload" id="uploadButton">
                                        </label>

                                    </div>
                                </div>
                                <div class="text-center">

                                    <span class="text-danger text-center">460*480</span>
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
                                <div class="form-group">
                                    <label for="email">{{ __('custom.email') }}</label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">{{ __('custom.phone') }}</label>
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title_position">{{ __('custom.title_position') }}</label>
                                    <input type="text" name="title_position" id="title_position"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="address">{{ __('custom.address') }}</label>
                                    <input type="text" name="address" id="address" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="instagram">{{ __('custom.instagram') }}</label>
                                    <input type="text" name="instagram" id="instagram" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="twitter">{{ __('custom.twitter') }}</label>
                                    <input type="text" name="twitter" id="twitter" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="facebook">{{ __('custom.facebook') }}</label>
                                    <input type="text" name="facebook" id="facebook" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="linked_in">{{ __('custom.linked_in') }}</label>
                                    <input type="text" name="linked_in" id="linked_in" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="cover_letter">{{ __('custom.cover_letter') }}</label>
                                    <textarea class="form-control" name="cover_letter" id="cover_letter" cols="30" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="personal_details">{{ __('custom.personal_details') }}</label>
                                    <textarea class="form-control" name="personal_details" id="personal_details" cols="30" rows="7"></textarea>
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
