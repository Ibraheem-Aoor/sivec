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
                                    <div class="services-count"></div>description
                                    <p class="service-description">{{Str::limit($job->description , 70 , '...')}}</p>
                                    <div class="services-link">
                                        <a class="text-btn" href="{{$job->getRoute()}}">Read More</a>
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
    <section>
        <div class="call-to-action">
            <div class="container">
                <div class="call-to-action-inner">
                    <div class="call-to-action-left">
                        <div class="call-to-action-icon">
                            <span class="webexflaticon flaticon-email-1"></span>
                        </div>
                        <div class="call-to-action-content">
                            <p class="call-to-action-sub-title">We are ready to help you</p>
                            <h3 class="call-to-action-title">Need Any Interior Design Help?</h3>
                        </div>
                    </div>
                    <div class="call-to-action-btn-box mrt-md-30">
                        <a href="{{ route('site.contact')}}" class="animate-btn-style4">Contact With Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call to Action End -->
    <!-- Price Section End -->
@endsection
