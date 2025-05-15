<!doctype html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets/dashboard') }}/" data-template="horizontal-menu-template" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login Basic - Pages | Vuexy - Bootstrap Admin Template</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/dashboard') }}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/css/rtl/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />

    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="{{ asset('assets/dashboard') }}/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/dashboard') }}/vendor/js/template-customizer.js"></script>

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
                        <div class="app-brand demo mb-5 d-flex justify-content-center">
                            <a class="brand-link" style="background">
                                <img width="50px" src="{{ asset('user_assets/images/logo/white_logo.webp?v=1.0') }}"
                                    alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                                <span class="brand-text font-weight-light text-bold ">SEVIC</span>
                            </a>
                        </div>
                        <h4 class="mb-1">Welcome to SIVEC! 👋</h4>

                        <form id="formAuthentication" class="mb-4" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label for="email" class="form-label">Email</label>
                                <input value="{{ old('email') }}" type="text" class="form-control" id="email"
                                    name="email" placeholder="Enter your Email" autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-6">
                                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                            </div>
                        </form>
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
