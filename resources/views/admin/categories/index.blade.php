@extends('layouts.admin.app')
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('title')
    {{ __('blog.categories') }}
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="p-2">
        @include('admin.partials.page_header', ['page_title_1' => __('custom.dashboard.categories')])
        <!-- Main content -->
        <section class="content" enc>
            <div class="card">
                
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <div class="my-2">
                        @include('admin.categories._create')
                    </div>
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('custom.title') }}</th>
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
        var table_data_url = "{{ $table_data_url }}";
    </script>
    <script src="{{ asset('admin_assets/dist/js/custom/category.js') }}"></script>
@endpush
