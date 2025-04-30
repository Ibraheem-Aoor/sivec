@extends('layouts.admin.app')
@section('title')
    {{ __('custom.dashboard.applications') }}
@endsection
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="p-2">
        @include('admin.partials.page_header')
        <!-- Main content -->
        <section class="content" enc>
            <div class="card">
                
            
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('custom.name') }}</th>
                            <th>{{ __('custom.phone') }}</th>
                            <th>{{ __('custom.email') }}</th>
                            <th>{{ __('custom.date') }}</th>
                            <th>{{ __('custom.Actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>
            <!-- /.card-body -->
    </div>
    </section>
    <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

@endsection




@push('js')
    <!-- DataTables -->
    <script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        var table_data_url = "{{ $table_data_url }}"
    </script>
    <script src="{{ asset('admin_assets/dist/js/custom/job_application.js') }}"></script>
@endpush
