@extends('layouts.user.master')
@section('tiite', 'SIVEC- Inerior Design Services')

@section('content')



    <!-- Home Slider Start -->

    <section class="home_banner_01 @if (app()->getLocale() == 'ar') home_banner_rtl @endif">
        <div class="home-carousel owl-theme owl-carousel">
            <div class="slide-item">
                <div class="image-layer lazy-background"
                    data-background="{{ asset('user_assets/images/slider/400.webp?v=1.0') }}"></div>
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
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/392.webp?v=1.0') }}"></div>
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
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/762.webp?v=1.0') }}">
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
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/880.webp?v=1.0') }}">
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
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/710.webp?v=1.0') }}">
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
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/171.webp?v=1.0') }}">
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
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/356.webp?v=1.0') }}">
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
                <div class="image-layer" data-background="{{ asset('user_assets/images/slider/355.webp?v=1.0') }}">
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

    <!-- why Choose Us Section Start -->
    <section class="mrt-100 mrb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xl-6 bg-cover-custom"
                    data-background="{{ asset('user_assets/images/choose.webp?v=1.0') }}">
                </div>
                <div class="col-lg-12 col-xl-6 p-0">
                    <div class="divider-gap">
                        <h2 class="mrb-25">{{ __('custom.site.why_us') }}</h2>
                        <div class="icon-box-two mrb-40">
                            <div class="icon bg-primary-color f-left">
                                <span class="webexflaticon fa fa-check"></span>
                            </div>
                            <div class="icon-details ">
                                <h4 class="icon-box-title mrb-10">{{ __('custom.site.transparency') }}</h4>
                                <p>{{ __('custom.site.transparency_text') }}</p>
                            </div>
                        </div>
                        <div class="icon-box-two mrb-40">
                            <div class="icon bg-primary-color f-left">
                                <span class="webexflaticon fa fa-users"></span>
                            </div>
                            <div class="icon-details ">
                                <h4 class="icon-box-title mrb-10">{{ __('custom.site.teamwork') }}</h4>
                                <p>{{ __('custom.site.teamwork_text') }}</p>
                            </div>
                        </div>
                        <div class="icon-box-two mrb-40">
                            <div class="icon bg-primary-color f-left">
                                <span class="webexflaticon fa fa-clock"></span>
                            </div>
                            <div class="icon-details ">
                                <h4 class="icon-box-title mrb-10">{{ __('custom.site.achievement') }}</h4>
                                <p>{{ __('custom.site.achievement_text') }}</p>
                            </div>
                        </div>
                        <div class="icon-box-two">
                            <div class="icon bg-primary-color f-left">
                                <span class="webexflaticon fa fa-pen"></span>
                            </div>
                            <div class="icon-details ">
                                <h4 class="icon-box-title mrb-10">{{ __('custom.site.innovation') }}</h4>
                                <p>{{ __('custom.site.innovation_text') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- why Choose Us Section End -->



    <!-- About Section Start -->
    <section class="about-section pdt-110 pdb-105 bg-no-repeat bg-cover bg-pos-cb"
        data-background="{{ asset('user_assets/images/bg/abs-bg3.webp?v=1.0') }}" data-overlay-light="4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8 col-xl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="about-image-box-style1 about-side-line mrr-60 mrr-lg-0">
                        <figure class="about-image1 js-tilt d-none d-md-block d-lg-block d-xl-block">
                            @if (@$about_page_settings['about_image_2'])
                                <img loading="lazy" class="img-full"
                                    src="{{ getImageUrl($about_page_settings['about_image_2']) }}" alt="about image-2">
                            @endif
                        </figure>
                        <figure class="about-image2">
                            @if (@$about_page_settings['about_image_1'])
                                <img loading="lazy" class="img-full"
                                    src="{{ getImageUrl($about_page_settings['about_image_1']) }}" alt="about image-1">
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
                            <div class="experience text-center">
                                <p class="experience-text">{{ __('custom.site.our_experince') }}</p>
                                <h4 class="experience-year" style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                                    @if (app()->getLocale() == 'ar')
                                        +15
                                    @else
                                        15+
                                    @endif
                                </h4>
                            </div>
                            <div class="experience text-center">
                                <p class="experience-text">{{ __('custom.site.completed_projects') }}</p>
                                <h4 class="experience-year" style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                                    @if (app()->getLocale() == 'ar')
                                        4k
                                    @else
                                        4k
                                    @endif
                                </h4>
                            </div>
                            <div class="experience text-center">
                                <p class="experience-text">{{ __('custom.site.engineer') }}</p>
                                <h4 class="experience-year" style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};font-size: 65px !important;">
                                    @if (app()->getLocale() == 'ar')
                                        +150
                                    @else
                                        150+
                                    @endif
                                </h4>
                            </div>
                            <div class="experience text-center">
                                <p class="experience-text">{{ __('custom.site.regions') }}</p>
                                <h4 class="experience-year" style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                                    @if (app()->getLocale() == 'ar')
                                        +6
                                    @else
                                        6+
                                    @endif
                                </h4>
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
        data-background="{{ asset('user_assets/images/bg/abs-bg2.webp?v=1.0') }}">
        <div class="service-title-section-obj1">
            <img loading="lazy" src="{{ asset('user_assets/images/objects/3.webp?v=1.0') }}" alt="Services Image">
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
        data-background="{{ asset('user_assets/images/bg/abs-bg7.webp?v=1.0') }}">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-xl-4 col-lg-6 col-md-6">
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


    {{-- Projects Section Start --}}
    @if (!$projects->isEmpty())
        @include('site.partials.projects_section', ['projects' => $projects])
    @endif
    {{-- Projects Section End --}}




    <!-- Offer Section Start -->
    <section class="bg-secondary-color bg-no-repeat bg-cover bg-pos-cb pdt-110 pdb-85"
        style="background: none !important; margin-bottom:25vh !important; margin-top:20vh !important;">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-10 col-xl-6 wow fadeInUp" data-wow-delay="0ms"
                        data-wow-duration="800ms">
                        <h5 class="side-line-left text-primary-color mrb-10">{{ __('custom.site.what_we_offer') }}</h5>
                        <h2 class="text-black mrb-30 mrb-sm-30">{{ __('custom.site.our_company') }} <span
                                class="text-primary-color">{{ __('custom.site.make_u') }}<br>
                            </span>{{ __('custom.site.feel_conf') }}</h2>
                        <p class="text-black mrb-40">{{ __('custom.site.offer_text') }}</p>
                        <div class="video-block mrb-lg-60">
                            <div class="video-link">
                                <a class="video-popup" href="https://www.youtube.com/watch?v=C1r_f98iJv8"><i
                                        class="base-icon-play1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-10 col-xl-6 wow fadeInUp" data-wow-delay="200ms"
                        data-wow-duration="800ms">
                        <div class="shine-effect">
                            <img loading="lazy" class="img-full"
                                src="{{ asset('user_assets/images/offer_2.webp?v=1.0') }}" alt="offer image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Offer Section End -->


    @include('site.partials.call_section')


@endsection
@push('js')
    <script>
        window.addEventListener("load", function() {
            const lazyBackgrounds = document.querySelectorAll(".lazy-background");

            if ("IntersectionObserver" in window) {
                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const bg = entry.target;
                            const bgImage = bg.getAttribute("data-background");
                            if (bgImage) {
                                bg.style.backgroundImage = `url('${bgImage}')`;
                            }
                            observer.unobserve(bg); // Stop observing once loaded
                        }
                    });
                });

                lazyBackgrounds.forEach(lazyBackground => observer.observe(lazyBackground));
            } else {
                // Fallback for older browsers without IntersectionObserver support
                lazyBackgrounds.forEach(bg => {
                    const bgImage = bg.getAttribute("data-background");
                    if (bgImage) {
                        bg.style.backgroundImage = `url('${bgImage}')`;
                    }
                });
            }

            // Carousel auto-scroll after images have loaded
            const autoScrollCarousel = () => {
                const owlCarousel = $('.home-carousel');
                owlCarousel.trigger('next.owl.carousel');
            };

            // Start auto-scroll every 5 seconds
            setInterval(autoScrollCarousel, 5000);
        });
    </script>
@endpush
