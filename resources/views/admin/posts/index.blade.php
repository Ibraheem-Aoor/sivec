
@extends('layouts.admin.app')
@section('title')
    {{ __('blog.posts') }}
@endsection
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="p-2">
        @include('admin.partials.page_header', ['page_title_1' => __('custom.dashboard.posts')])
        <!-- Main content -->
        <section class="content" enc>
            <div class="card">
                
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <div class="my-2">
                        <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">
                            {{ __('blog.create_post') }}
                        </a>
                    </div>
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('custom.title') }}</th>
                                <th>{{ __('blog.num_of_views') }}</th>
                                <th>{{ __('blog.category') }}</th>
                                <th>{{ __('custom.dashboard.tags') }}</th>
                                <th>{{ __('blog.status') }}</th>
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
        var table_data_url = "{{ $table_data_url ?? $data['table_data_url'] }}";
    </script>
    <script src="{{ asset('admin_assets/dist/js/custom/post.js') }}"></script>
@endpush
