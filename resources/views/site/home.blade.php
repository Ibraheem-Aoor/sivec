@extends('layouts.user.master')
@section('tiite', 'SIVEC- Inerior Design Services')

@section('content')



    <!-- Home Slider Start -->

    <section class="home_banner_01">
        <div id="slider-border">
            {!! __('custom.site.take_look') !!}
        </div>
        <div class="home-carousel owl-theme owl-carousel">
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/400.png') }}"></div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1 class="home-carousel-title">{{ __('custom.site.slide_1') }}
                                </h1>
                                <p class="home-carousel-text"></p>
                                <div class="btn-box">
                                    <a href="{{ route('site.contact') }}"
                                        class="animate-btn-style3">{{ __('custom.site.Contact With Us_slider') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/392.png') }}"></div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1 class="home-carousel-title">{{ __('custom.site.slide_2') }}
                                </h1>
                                <p class="home-carousel-text"></p>
                                <div class="btn-box">
                                    <a href="{{ route('site.contact') }}"
                                        class="animate-btn-style3">{{ __('custom.site.Contact With Us_slider') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/762.png') }}">
                </div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1 class="home-carousel-title">
                                    {{ __('custom.site.slide_3') }}
                                </h1>
                                <div class="btn-box">
                                    <a href="{{ route('site.services') }}"
                                        class="animate-btn-style3">{{ __('custom.site.SERVICES') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/880.png') }}">
                </div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1 class="home-carousel-title">
                                    {{ __('custom.site.slide_4') }}
                                </h1>
                                <div class="btn-box">
                                    <a href="{{ route('site.services') }}"
                                        class="animate-btn-style3">{{ __('custom.site.SERVICES') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/710.png') }}">
                </div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1 class="home-carousel-title">
                                    {{ __('custom.site.slide_5') }}
                                </h1>
                                <div class="btn-box">
                                    <a href="{{ route('site.services') }}"
                                        class="animate-btn-style3">{{ __('custom.site.SERVICES') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/171.png') }}">
                </div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1 class="home-carousel-title">
                                    {{ __('custom.site.slide_6') }}
                                </h1>
                                <div class="btn-box">
                                    <a href="{{ route('site.services') }}"
                                        class="animate-btn-style3">{{ __('custom.site.SERVICES') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/356.png') }}">
                </div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1 class="home-carousel-title">
                                    {{ __('custom.site.slide_7') }}
                                </h1>
                                <div class="btn-box">
                                    <a href="{{ route('site.services') }}"
                                        class="animate-btn-style3">{{ __('custom.site.SERVICES') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/355.jpeg') }}">
                </div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1 class="home-carousel-title">
                                    {{ __('custom.site.slide_8') }}
                                </h1>
                                <div class="btn-box">
                                    <a href="{{ route('site.gallery', encrypt(2)) }}"
                                        class="animate-btn-style3">{{ __('custom.site.DESINGS') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Home Slider End -->
    <!-- Features Style1 Section Start -->
    <section class="bg-no-repeat bg-cover bg-pos-cb pdt-110 pdb-85" data-background="images/bg/abs-bg4.png">
        <div class="service-title-section-obj2">
            <img src="{{ asset('user_assets/images/objects/3.png') }}" alt="">
        </div>
        <div class="section-content">
            <div class="container">
                <div class="row trans-row">
                    <div class="col-sm-6">
                        <img src="{{ asset('user_assets/images/slider/400.png') }}" id="animated-img" alt="">
                    </div>
                    <div class="col-sm-6 margin-on-mobile">
                        <div class="row">
                            <div class="col-sm-6  col-xs-6 ol-lg-6 col-md-6">
                                <div class="feature-box-style2 wow fadeInUp" data-wow-delay="200ms"
                                    data-wow-duration="800ms">
                                    <div class="inner-box">
                                        <div class="feature-box-icon">
                                            <span class="webextheme-icon-light-interior-design-1"></span>
                                        </div>
                                        <h6 class="title" style="padding-right:10px !important;">
                                            {{ __('custom.site.Design') }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6  col-xs-6 col-s-6 col-lg-6 col-md-6">
                                <div class="feature-box-style2 wow fadeInUp" data-wow-delay="300ms"
                                    data-wow-duration="800ms">
                                    <div class="inner-box">
                                        <div class="feature-box-icon">
                                            <span class="service-icon webextheme-icon-light-measure"></span>
                                        </div>
                                        <h6 class="title">{{ __('custom.site.Engineering Consulting') }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6  col-xs-6 col-s-6 col-lg-6 col-md-6">
                                <div class="feature-box-style2 wow fadeInUp" data-wow-delay="400ms"
                                    data-wow-duration="800ms">
                                    <div class="inner-box">
                                        <div class="feature-box-icon">
                                            <span class="webextheme-icon-light-architect-4"></span>
                                        </div>
                                        <h6 class="title">{{ __('custom.site.Skilled Team') }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6  col-xs-6 col-s-6 col-lg-6 col-md-6">
                                <div class="feature-box-style2 wow fadeInUp" data-wow-delay="500ms"
                                    data-wow-duration="800ms">
                                    <div class="inner-box">
                                        <div class="feature-box-icon">
                                            <span class="base-icon-071-guarantee"></span>
                                        </div>
                                        <h6 class="title">{{ __('custom.site.Trusted Work') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Style1 Section End -->



    <!-- About Section Start -->
    <section class="about-section pdt-110 pdb-105 bg-no-repeat bg-cover bg-pos-cb"
        data-background="{{ asset('user_assets/images/bg/abs-bg3.png') }}" data-overlay-light="4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8 col-xl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="about-image-box-style1 about-side-line mrr-60 mrr-lg-0">
                        <figure class="about-image1 js-tilt d-none d-md-block d-lg-block d-xl-block">
                            @if (@$about_page_settings['about_image_2'])
                                <img class="img-full"
                                    src="{{ Storage::url("site/about/{$about_page_settings['about_image_2']}") }}"
                                    alt="">
                            @endif
                        </figure>
                        <figure class="about-image2">
                            @if (@$about_page_settings['about_image_1'])
                                <img class="img-full"
                                    src="{{ Storage::url("site/about/{$about_page_settings['about_image_1']}") }}"
                                    alt="">
                            @endif
                        </figure>
                    </div>
                </div>
                <div class="col-md-12 col-lg-10 col-xl-6 wow fadeInRight" data-wow-delay="0ms"
                    data-wow-duration="1500ms">
                    <h5 class="side-line-left subtitle text-primary-color">{{ __('custom.site.about_sivec') }}</h5>
                    <h2 class="mrb-45 mrb-lg-35">{{ __('custom.site.about_we_provide_text_1') }} <span
                            class="text-primary-color">{{ __('custom.site.Engineering Consulting') }}</span>
                        {{ __('custom.site.about_we_provide_text_2') }} </h2>
                    <p class="about-text-block mrb-40">{{ @$about_page_settings['about_us_text'] }}</p>
                    <div class="row mrb-30 mrb-lg-40">
                        @php
                            if (@$about_page_settings['about_us_features']) {
                                $features = json_decode($about_page_settings['about_us_features'], true);
                            } else {
                                $features = [null];
                            }
                            $i = 1;
                        @endphp
                        @foreach ($features as $feature)
                            @if ($i % 2 != 0)
                                <div class="col-xl-6 col-xs-6 col-sm-6 col-lg-6 col-md-12">
                                    <ul class="order-list primary-color">
                                        <li>{{ $feature }}</li>
                                    </ul>
                                </div>
                            @else
                                <div class="col-xl-6 col-xs-6 col-sm-6 col-lg-6 col-md-12">
                                    <ul class="order-list primary-color">
                                        <li>{{ $feature }}</li>
                                    </ul>
                                </div>
                            @endif
                            @php
                                ++$i;
                            @endphp
                        @endforeach
                    </div>
                    <div class="row no-gutters">
                        <div class="col-xl-7 col-lg-7 col-md-6">
                            <div class="featured-icon-box mrb-15">
                                <div class="featured-icon">
                                    <i class="webexflaticon webextheme-icon-light-003-staircase"></i>
                                </div>
                                <div class="featured-content">
                                    <h4 class="featured-title">{{ __('custom.site.Exclusive Design') }}</h4>
                                    <p class="featured-desc">{{ @$about_page_settings['exclusive_design_description'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="featured-icon-box mrb-sm-40">
                                <div class="featured-icon">
                                    <i class="webexflaticon base-icon-158-employee-2"></i>
                                </div>
                                <div class="featured-content">
                                    <h4 class="featured-title">{{ __('custom.site.Professional Team') }}</h4>
                                    <p class="featured-desc mrb-0">
                                        {{ @$about_page_settings['pro_team_description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-6">
                            <div class="experience">
                                <p class="experience-text">{{ __('custom.site.our_experince') }}</p>
                                <h4 class="experience-year">8+</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->


    <!-- Service Section Title Area Start -->
    <section class="service-title-section bg-silver bg-no-repeat bg-cover bg-pos-cb pdt-105 pdb-200"
        data-background="{{ asset('user_assets/images/bg/abs-bg2.png') }}">
        <div class="service-title-section-obj1">
            <img src="{{ asset('user_assets/images/objects/3.png') }}" alt="">
        </div>
        <div class="section-title mrb-55 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-7 col-md-12">
                        <div class="title-box-center">
                            <h5 class="side-line-left text-primary-color mrb-10">{{ __('custom.site.our_services') }}</h5>
                            <h2 class="mrb-25">{{ __('custom.site.We Provide') }} <span class="text-primary-color">
                                    {{ __('custom.site.All') }} </span> {{ __('custom.site.services_you_need') }}
                            </h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-12">
                        <p class="mrb-0 mrb-md-40">
                            {{ __('custom.site.our_services_text') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section Title Area End -->
    <!-- Service Section Area Start -->
    <section class="service-section-style1 bg-no-repeat bg-cover bg-pos-cb mb-5"
        data-background="{{ asset('user_assets/images/bg/abs-bg7.png') }}">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="service-style1">
                                <div class="service-inner">
                                    <i class="service-icon {{ $service->icon }}"></i>
                                    <h4 class="service-title">{{ $service->name }}</h4>
                                    <div class="services-count"></div>
                                    <p class="service-description">{{ Str::limit($service->details, 70, '...') }}</p>
                                    <div class="services-link">
                                        <a class="text-btn"
                                            href="{{ route('site.service.details', encrypt($service->id)) }}">
                                            {{ __('custom.site.read_more') }}
                                        </a>
                                    </div>
                                    <div class="service-inner-obj"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="row mrt-110">
                    <div class="col-xl-12">
                        <div class="before-after-slider1">
                            <!-- The before image is first -->
                            <img src="https://via.placeholder.com/1320x600" alt="img1">
                            <!-- The after image is last -->
                            <img src="https://via.placeholder.com/1320x600" alt="img1">
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Service Section Area End -->

    @include('site.partials.call_section')
@endsection


@push('js')
    <script>
        $('.owl-next').click();
        setInterval(function() {
            $('.owl-next').click();
        }, 5000);
    </script>
    <script>
        const animatedImg = document.getElementById('animated-img');

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animatedImg.classList.add('show');
                    observer.unobserve(animatedImg);
                }
            });
        });

        observer.observe(animatedImg);
    </script>
@endpush
