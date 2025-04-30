@extends('layouts.admin.app')
@section('title')
    {{ __('custom.my_profile') }}
@endsection

@section('content')
    @include('admin.partials.page_header', [
        'page_title_1' => __('custom.dashboard.settings'),
        'page_title_2' => __('custom.my_profile'),
    ])
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-6">
                    <!-- Account -->
                    <div class="card-body pt-4">
                        <form action="{{ route('admin.profile.update') }}" method="POST"">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="mb-4 col-md-12">
                                    <label for="name" class="form-label">{{ __('custom.name') }}</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ auth()->user()->name }}" autofocus />
                                </div>

                                <div class="mb-4 col-md-12">
                                    <label for="email" class="form-label">{{ __('custom.email') }}</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="{{ auth()->user()->email }}" />
                                </div>

                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-3">{{ __('custom.save_changes') }}</button>
                                <button type="reset" class="btn btn-label-secondary">{{ __('custom.cancel') }}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

                <div class="card mb-6">
                    <!-- Password -->
                    <div class="card-body pt-4">
                        <form action="{{ route('admin.profile.change_password') }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="mb-6 form-password-toggle">
                                    <div><label class="form-label"
                                            for="old_password">{{ __('custom.old_password') }}</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="old_password" class="form-control" name="old_password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="old_password" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>

                                <div class="mb-6 form-password-toggle">
                                    <div><label class="form-label" for="password">{{ __('custom.new_password') }}</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                <div class="mb-6 form-password-toggle">
                                    <div><label class="form-label"
                                            for="password_confirmation">{{ __('custom.new_password_confirmation') }}</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password_confirmation" class="form-control"
                                            name="password_confirmation"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password_confirmation" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>

                            </div>
                            <div class="mt-2">
                                <button type="submit"
                                    class="btn btn-primary me-3">{{ __('custom.change_password') }}</button>
                                <button type="reset" class="btn btn-label-secondary">{{ __('custom.cancel') }}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Password -->
                </div>

            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ajaxSuccess(function() {
            $('form input[name="old_password"]').val('');
            $('form input[name="password"]').val('');
            $('form input[name="password_confirmation"]').val('');
        });
    </script>
@endpush
