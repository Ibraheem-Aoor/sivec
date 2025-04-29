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
<script src="{{ asset('assets/dashboard') }}/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="{{ asset('assets/dashboard') }}/vendor/libs/swiper/swiper.js"></script>
<script src="{{ asset('assets/dashboard') }}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

<!-- Main JS -->
<script src="{{ asset('assets/dashboard') }}/js/main.js"></script>

<!-- Page JS -->
<script src="{{ asset('assets/dashboard') }}/js/dashboards-analytics.js"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- ChartJS -->
{{-- <script src="{{ asset('admin_assets/plugins/chart.js/Chart.min.js') }}"></script> --}}
<script src="{{ asset('assets/dashboard/js/Chart.min.js') }}"></script>

{{-- <script src="{{ asset('admin_assets/plugins/toastr/toastr.min.js') }}"></script> --}}
<script src="{{ asset('assets/dashboard/js/toastr.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content'),
        },
    });
</script>

<script>
    var globals = {
        // 'placeholder_image': "{{ asset('admin_assets/dist/img/image_placeholder.jpg') }}",

        'placeholder_image': "{{ asset('assets/dashboard/img/image_placeholder.jpg') }}",
    };
</script>
<script src="{{ asset('admin_assets/dist/js/custom/master.js?v=0.03') }}"></script>
<script src="{{ asset('assets/dashboard/js/custom/master.js?v=0.03') }}"></script>
<script src="{{ asset('assets/dashboard/file-input/js/fileinput.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/file-input/themes/fa5/theme.min.js') }}"></script>

<script src="{{ asset('assets/dashboard/summernote/summernote-bs4.min.js') }}"></script>



@stack('js')
