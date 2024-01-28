@extends('layouts.admin.master')
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        @include('admin.partials.page_header'  , [ 'page_title_1' => __('custom.dashboard.team_members')])
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2">
                            <button class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#team-create-update-modal" data-action="{{route('admin.team-members.store')}}" data-method="POST" data-is-create="1">
                                {{ __('custom.new') }}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('custom.image') }}</th>
                                <th>{{ __('custom.name') }}</th>
                                <th>{{ __('custom.title_position') }}</th>
                                <th>{{ __('custom.email') }}</th>
                                <th>{{ __('custom.phone') }}</th>
                                <th class="d-none">{{ __('custom.status') }}</th>
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

    @include('admin.team_members.team-create-update-modal')
@endsection




@push('js')
    <!-- DataTables -->
    <script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        var table_data_url = "{{ $table_data_url }}"
    </script>
    <script src="{{ asset('admin_assets/dist/js/custom/team_member.js') }}"></script>
    <script>
        // change image and preveiw
        $('#uploadButton').on('click', function() {
            $('#changeImg').click();
        })

        var file = null,
            reader = null;
        $('#changeImg').change(function() {
            file = this.files[0];
            reader = new FileReader();
            reader.onloadend = function() {
                $('.image-input-wrapper').css('background-image', 'url("' + reader.result + '")');
            }
            if (file) {
                reader.readAsDataURL(file);
                console.log(file);
            }
        });
    </script>
@endpush
