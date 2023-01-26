@extends('layouts.admin.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $project_categories_count }}</h3>
                                <p>{{ __('custom.dashboard.project_category') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-grid"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $projects_count }}</h3>
                                <p>{{ __('custom.dashboard.projects') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-cube"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ $service_categories_count }}</h3>
                                <p>{{ __('custom.dashboard.service_category') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-grid"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ $services_count }}</h3>
                                <p>{{ __('custom.dashboard.services') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-cube"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ $team_members_count }}</h3>
                                <p>{{ __('custom.dashboard.team_members') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ $clients_count }}</h3>
                                <p>{{ __('custom.dashboard.clients') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $jobs_positions_count }}</h3>
                                <p>{{ __('custom.dashboard.jobs') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $job_applications_count }}</h3>
                                <p>{{ __('custom.dashboard.applications') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-document"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $contacts_count }}</h3>
                                <p>{{ __('custom.dashboard.contacts') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
