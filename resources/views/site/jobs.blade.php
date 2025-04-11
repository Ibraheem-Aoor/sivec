@extends('layouts.user.master')
@section('content')
    @include('site.partials.page-title')
    <!-- Price Section Start -->
    <section class="service-inner-page-section-style1 pdt-110 pdb-80">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    @foreach ($jobs as $job)
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="service-style1">
                                <div class="service-inner">
                                    <i class="service-icon webextheme-icon-003-staircase"></i>
                                    <h4 class="service-title">{{ $job->title->name }}</h4>
                                    <div class="services-count"></div>{{ __('custom.description') }}
                                    <p class="service-description">{{ Str::limit($job->description, 70, '...') }}</p>
                                    <div class="services-link">
                                        <a class="text-btn" href="{{ $job->getRoute() }}">{{ __('custom.site.read_more') }}</a>
                                    </div>
                                    <div class="service-inner-obj"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Price Section End -->
    <!-- Call to Action Start -->
    @include('site.partials.call_section')
    <!-- Call to Action End -->
    <!-- Price Section End -->
@endsection
