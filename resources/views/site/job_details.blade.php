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
                        <h3 class="mrb-15">Job Description</h3>
                        <p class="about-text-block mrb-40">{{ $job->description }}</p>
                    </div>

                    <h3 class="mrb-15">Job Requirements</h3>
                    <p>
                    <ul class="order-list primary-color">
                        @foreach ($job->getRequirements() as $requirement)
                            <li>{{ $requirement }}</li>
                        @endforeach
                    </ul>
                    </p>
                    <p class="about-text-block mrb-40"></p>
                    <div class="service-detail-text">
                        <h3 class="mrb-15">Apply</h3>
                        <p class="about-text-block mrb-40">
                        <form action="{{route('site.job.apply')}}" method="POST">
                            <div class="form-group">
                                <input type="hidden" value="{{encrypt($job->id)}}">
                                <label for="">Name</label>
                                <input required class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <input required class="form-control" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input required class="form-control" type="text" name="phone">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">CV</label>
                                <input required class="form-control" type="file" name="cv">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="animate-btn-style3 btn-md mrb-lg-60">APPLY NOW</button>
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
                    <div class="sidebar-widget-need-help">
                        <div class="need-help-icon">
                            <span class="webexflaticon base-icon-phone-call"></span>
                        </div>
                        <h4 class="need-help-title">Get Easy Interior Solution <br> From Us</h4>
                        <div class="need-help-contact">
                            <p class="mrb-5">Please Contact With Us</p>
                            <a href="tel:00214255415">00 214 255415</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Details Section End -->
@endsection
@push('js')
    <script src="{{ asset('admin_assets/plugins/toastr/toastr.min.js') }}"></script>
@endpush

