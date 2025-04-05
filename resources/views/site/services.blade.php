@extends('layouts.user.master')
@section('title', 'Services')
@section('content')
    @include('site.partials.page-title')
    <!-- Price Section Start -->
    <section class="service-inner-page-section-style1 pdt-110 pdb-80">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="service-style1">
                                <div class="service-inner">
                                    <i class="service-icon {{$service->icon}}"></i>
                                    <h4 class="service-title">{{ $service->name }}</h4>
                                    <div class="services-count"></div>
                                    <p class="service-description">{{Str::limit($service->details , 70 , '...')}}</p>
                                    <div class="services-link">
                                        <a class="text-btn" href="{{route('site.service.details' , encrypt($service->id))}}">{{__('custom.site.read_more')}}</a>
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

    @include('site.partials.call_section')
@endsection
