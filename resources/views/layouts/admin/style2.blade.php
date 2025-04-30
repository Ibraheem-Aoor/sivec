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
<link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/libs/apex-charts/apex-charts.css" />
<link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/libs/swiper/swiper.css" />
<link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<link rel="stylesheet"
    href="{{ asset('assets/dashboard') }}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
<link rel="stylesheet"
    href="{{ asset('assets/dashboard') }}/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />

<!-- Page CSS -->
<link rel="stylesheet" href="{{ asset('assets/dashboard') }}/vendor/css/pages/cards-advance.css" />

{{-- Toastr --}}
<link rel="stylesheet" href="{{ asset('assets/dashboard/css/toastr.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/dashboard/file-input/css/fileinput.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dashboard/summernote/summernote-bs4.min.css') }}">

<style>
    .avatar-picture {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .avatar-picture .image-input {
        position: relative;
        display: inline-block;
        border-radius: 50%;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .avatar-picture .image-input .image-input-wrapper {
        border: 3px solid #fff;
        background-image: url("");
        width: 200px;
        height: 200px;
        /* border-radius: 50%; */
        background-repeat: no-repeat;
        background-size: contain !important;
    }

    .avatar-picture .image-input .btn {
        height: 24px;
        width: 24px;
        border-radius: 50%;
        cursor: pointer;
        position: absolute;
        left: 3px;
        bottom: -9px;
        background-color: #FFFFFF;
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        padding: 0;
        -webkit-filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.16));
        filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.16));
    }

    .avatar-picture .image-input .btn img {
        position: relative;
        top: -2px;
    }

    .avatar-picture .image-input .btn:hover {
        background-color: var(--main-color);
    }

    .avatar-picture .image-input .btn:hover img {
        -webkit-filter: invert(1) brightness(10);
        filter: invert(1) brightness(10);
    }

    .avatar-picture .image-input .btn input {
        width: 0 !important;
        height: 0 !important;
        overflow: hidden;
        opacity: 0;
        display: none;
    }

    th,
    td {
        font-size: 14px !important;
    }

    .toast-error {
        background-color: #ff4c51 !important;
    }

    .toast-success {
        background-color: #24b364 !important;
    }

    
</style>
@stack('css')
