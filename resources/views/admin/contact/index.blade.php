@extends('layouts.admin.master')
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.page_header')
        <!-- Main content -->
        <section class="content" enc>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('custom.name') }}</th>
                            <th>{{ __('custom.phone') }}</th>
                            <th>{{ __('custom.email') }}</th>
                            <th>{{ __('custom.message') }}</th>
                            <th>{{ __('custom.date') }}</th>
                            <th>{{ __('custom.Actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
    </div>
    </section>
    <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    @include('admin.contact.contact-modal')
@endsection




@push('js')
    <!-- DataTables -->
    <script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        var table_data_url = "{{ $table_data_url }}"
    </script>
    <script src="{{ asset('admin_assets/dist/js/custom/contact.js') }}"></script>
@endpush
