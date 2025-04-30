@extends('layouts.admin.app')
@section('title')
    {{ __('custom.dashboard.dashboard') }}
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content " enc>
            <div class="container mt-3">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    
                    <div class="col-lg-4 col-4 px-1">
                        <!-- small box -->
                        <div class="small-box card bg-info p-5 my-1 text-white">
                            <a class="text-white" href="{{ route('admin.project-category.index') }}">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-6">
                                    <h3 class="text-white">{{ $project_categories_count }}</h3>
                                    <p>{{ __('custom.dashboard.project_category') }}</p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="tf-icons ti ti-category-2 fs-2"></i>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4 px-1">
                        <!-- small box -->
                        
                        <div class="small-box card bg-info p-5 my-1 text-white">
                            <a href="{{ route('admin.project-style-type.index', ['model' => 'ProjectType']) }}" class="text-white">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-6">
                                    <h3 class="text-white">{{ $projects_count }}</h3>
                                    <p>{{ __('custom.dashboard.projects') }}</p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="tf-icons ti ti-building fs-2"></i>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4 px-1">
                        <!-- small box -->
                        <div class="small-box card bg-primary p-5 my-1 text-white">
                            <a href="{{ route('admin.service-category.index') }}" class="text-white">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-6">
                                    <h3 class="text-white">{{ $service_categories_count }}</h3>
                                    <p>{{ __('custom.dashboard.service_category') }}</p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="tf-icons ti ti-tags fs-2"></i>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4 px-1">
                        <!-- small box -->
                        <div class="small-box card bg-primary p-5 my-1 text-white">
                            <a href="{{ route('admin.service.index') }}" class="text-white">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-6">
                                    <h3 class="text-white">{{ $services_count }}</h3>
                                    <p>{{ __('custom.dashboard.services') }}</p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="tf-icons ti ti-server fs-2"></i>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4 px-1">
                        <!-- small box -->
                        <div class="small-box card bg-secondary p-5 my-1 text-white">
                            <a href="{{ route('admin.team-members.index') }}" class="text-white">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-6">
                                    <h3 class="text-white">{{ $team_members_count }}</h3>
                                    <p>{{ __('custom.dashboard.team_members') }}</p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="tf-icons ti ti-friends fs-2"></i>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4 px-1">
                        <!-- small box -->
                        <div class="small-box card bg-secondary p-5 my-1 text-white">
                            <a href="{{ route('admin.client.index') }}" class="text-white">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-6">
                                    <h3 class="text-white">{{ $clients_count }}</h3>
                                    <p>{{ __('custom.dashboard.clients') }}</p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="tf-icons ti ti-users fs-2"></i>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4 px-1">
                        <!-- small box -->
                        <div class="small-box card bg-info p-5 my-1 text-white">
                            <a href="{{ route('admin.job-position.index') }}" class="text-white">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-6">
                                    <h3 class="text-white">{{ $jobs_positions_count }}</h3>
                                    <p>{{ __('custom.dashboard.jobs') }}</p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="tf-icons ti ti-file-description fs-2"></i>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4 px-1">
                        <!-- small box -->
                        <div class="small-box card bg-info p-5 my-1 text-white">
                            <a href="{{ route('admin.job_application.index') }}" class="text-white">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-6">
                                    <h3 class="text-white">{{ $job_applications_count }}</h3>
                                    <p>{{ __('custom.dashboard.applications') }}</p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="tf-icons ti ti-user-plus fs-2"></i>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4 px-1">
                        <!-- small box -->
                        <div class="small-box card bg-success p-5 my-1 text-white">
                            <a href="{{ route('admin.contact.index') }}" class="text-white">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-6">
                                    <h3 class="text-white">{{ $contacts_count }}</h3>
                                    <p>{{ __('custom.dashboard.contacts') }}</p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="tf-icons ti ti-message fs-2"></i>
                                </div>
                            </div>
                            </a>
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
