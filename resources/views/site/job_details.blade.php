@extends('layouts.user.master')
@push('css')
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/toastr/toastr.min.css') }}">
    @endpush
@section('content')
    @include('site.partials.page-title')

    <!-- Service Details Section Start -->
    <section class="service-details-page pdt-110 pdb-110 pdb-lg-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="service-detail-text">
                        <h3 class="mrb-15">{{ __('custom.site.job_description') }}</h3>
                        <p class="about-text-block mrb-40">{{ $job->description }}</p>
                    </div>

                    <h3 class="mrb-15">{{ __('custom.site.job_requirement') }}</h3>
                    <p>
                    <ul class="order-list primary-color">
                        @foreach ($job->getRequirements() as $requirement)
                            <li>{{ $requirement }}</li>
                        @endforeach
                    </ul>
                    </p>
                    <p class="about-text-block mrb-40"></p>
                    <div class="service-detail-text">
                        <h3 class="mrb-15">{{ __('custom.apply') }}</h3>
                        <p class="about-text-block mrb-40">
                        <form action="{{route('site.job.apply')}}" method="POST">
                            <div class="form-group">
                                <input type="hidden" value="{{encrypt($job->id)}}">
                                <label for="">{{ __('custom.name') }}</label>
                                <input required class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('custom.email') }}</label>
                                <input required class="form-control" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('custom.phone') }}</label>
                                <input required class="form-control" type="text" name="phone">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">{{ __('custom.cv') }}</label>
                                <input required class="form-control" type="file" name="cv">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="animate-btn-style3 btn-md mrb-lg-60">{{ __('custom.apply_now') }}</button>
                                <button type="reset" hidden></button>
                            </div>
                        </form>
                        </p>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5 sidebar-right">
                    <div class="service-nav-menu mrb-30">
                        <div class="service-link-list">
                            <ul>
                                @foreach ($related_jobs as $related_job)
                                    <li class="active"><a href="{{ $related_job->getRoute() }}"><i
                                                class="fa fa-chevron-right"></i>{{ $related_job->title->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @include('site.partials.get_solutions_section')
                </div>
            </div>
        </div>
    </section>
    <!-- Service Details Section End -->
@endsection
@push('js')
    <script src="{{ asset('admin_assets/plugins/toastr/toastr.min.js') }}"></script>
@endpush

