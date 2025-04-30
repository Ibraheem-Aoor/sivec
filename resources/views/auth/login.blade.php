<!doctype html>
@php if (app()->getLocale() == 'ar') {
        $dir = 'rtl';
    } else {
        $dir = 'ltr';
    }
@endphp
<html lang="{{ app()->getLocale() }}" class="light-style layout-wide customizer-hide" data-theme="theme-default"
    data-assets-path="{{ asset('assets/dashboard/') }}" data-template="vertical-menu-template-no-customizer"
    data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>SIVEC | Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/dashboard') }}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" /> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Cairo:slnt,wght@-1,300&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    @if ($dir == 'ar')
        <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/css/rtl/core.css" />
        <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/css/rtl/theme-default.css" />
    @else
        <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/css/core.css" />
        <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/css/theme-default.css" />
    @endif
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet"
        href="{{ asset('assets/dashboard') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="{{ asset('assets/dashboard') }}/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/dashboard') }}/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6">
                <!-- Login -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div dir="{{ $dir }}" class="app-brand justify-content-center mb-6">
                            <a href="index.html" class="app-brand-link">
                                <span class="app-brand-logo demo">
                                    <img width="50px"
                                        src="{{ asset('user_assets/images/logo/white_logo.webp?v=1.0') }}"
                                        alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                                        style="opacity: .8">
                                </span>
                                <span
                                    class="app-brand-text demo text-heading fw-bold">{{ __('custom.site.sivec') }}</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 dir="{{ $dir }}" class="mb-1">{{ __('custom.welcome_login_page') }}
                            {{ __('custom.site.sivec') }}! 👋
                        </h4>
                        {{-- <p class="mb-6">Please sign-in to your account and start the adventure</p> --}}

                        <form id="formAuthentication" class="mb-4" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div dir="{{ $dir }}" class="mb-6">
                                <label for="email" class="form-label">{{ __('custom.email') }}</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" placeholder="{{ __('custom.email_placeholder') }}"
                                    autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-6 form-password-toggle">
                                <div dir="{{ $dir }}"><label class="form-label"
                                        for="password">{{ __('custom.password') }}</label></div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                            {{-- <div class="my-8">
                  <div class="d-flex justify-content-between">
                    <div class="form-check mb-0 ms-2">
                      <input class="form-check-input" type="checkbox" id="remember-me" />
                      <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                    <a href="auth-forgot-password-basic.html">
                      <p class="mb-0">Forgot Password?</p>
                    </a>
                  </div>
                </div> --}}
                            <div class="mb-6">
                                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                            </div>
                        </form>

                        {{-- <p class="text-center">
                <span>New on our platform?</span>
                <a href="auth-register-basic.html">
                  <span>Create an account</span>
                </a>
              </p> --}}

                        {{-- <div class="divider my-6">
                <div class="divider-text">or</div>
              </div> --}}

                        {{-- <div class="d-flex justify-content-center">
                <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-facebook me-1_5">
                  <i class="tf-icons ti ti-brand-facebook-filled"></i>
                </a>

                <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-twitter me-1_5">
                  <i class="tf-icons ti ti-brand-twitter-filled"></i>
                </a>

                <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-github me-1_5">
                  <i class="tf-icons ti ti-brand-github-filled"></i>
                </a>

                <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-google-plus">
                  <i class="tf-icons ti ti-brand-google-filled"></i>
                </a>
              </div> --}}
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('assets/dashboard') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets/dashboard') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets/dashboard') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('assets/dashboard') }}/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ asset('assets/dashboard') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('assets/dashboard') }}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('assets/dashboard') }}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('assets/dashboard') }}/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('assets/dashboard') }}/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/dashboard') }}/vendor/libs/@form-validation/popular.js"></script>
    <script src="{{ asset('assets/dashboard') }}/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="{{ asset('assets/dashboard') }}/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/dashboard') }}/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/dashboard') }}/js/pages-auth.js"></script>
</body>

</html>
