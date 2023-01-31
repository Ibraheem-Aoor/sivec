@extends('layouts.user.master')
@section('tiite', 'SIVEC- Inerior Design Services')
@section('content')
    <!-- Home Slider Start -->
    <section class="home_banner_01">
        <div class="home-carousel owl-theme owl-carousel">
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('user_assets/images/slide_image_2.jpg') }}"></div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1 class="home-carousel-title">Consultant<span class="text-primary-color"> Worth</span>
                                    <span class="text-obj1">Your Trust</span>
                                </h1>
                                <p class="home-carousel-text"></p>
                                <div class="btn-box">
                                    <a href="{{ route('site.contact') }}" class="animate-btn-style3">Get In Touch</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('user_assets/images/bedroom-2.jpg') }}">
                </div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1 class="home-carousel-title">We Provide <span class="text-primary-color">Kitchen</span>
                                    <span class="text-obj1">design</span>
                                </h1>
                                <p class="home-carousel-text">We have almost 20+ years of experience for providing interior
                                    & Architectural services solutions</p>
                                <div class="btn-box">
                                    <a href="page-services-style1.html" class="animate-btn-style3">Our Services</a>
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
    <section class="feature-style1-section">
        <div class="custom-md-container">
            <div class="feature-box-area-style1 bg-no-repeat bg-cover bg-pos-cc mrt-sm-110"
                data-background="{{ asset('user_assets/images/bg/feature-obj1.png') }}">
                <div class="row">
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="feature-box-style1">
                            <div class="inner-box">
                                <div class="feature-box-icon">
                                    <span class="webextheme-icon-interior-design-1"></span>
                                </div>
                                <h6 class="title">Interior Design</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="feature-box-style1">
                            <div class="inner-box">
                                <div class="feature-box-icon">
                                    <span class="webextheme-icon-kitchen"></span>
                                </div>
                                <h6 class="title">Kitchen Interior</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="feature-box-style1">
                            <div class="inner-box">
                                <div class="feature-box-icon">
                                    <span class="webextheme-icon-architect-4"></span>
                                </div>
                                <h6 class="title">Skilled Team</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="feature-box-style1">
                            <div class="inner-box">
                                <div class="feature-box-icon">
                                    <span class="base-icon-071-guarantee"></span>
                                </div>
                                <h6 class="title">Trusted Work</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="feature-box-style1">
                            <div class="inner-box">
                                <div class="feature-box-icon">
                                    <span class="base-icon-166-money"></span>
                                </div>
                                <h6 class="title">Low Cost</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="feature-box-style1">
                            <div class="inner-box">
                                <div class="feature-box-icon">
                                    <span class="base-icon-135-quality"></span>
                                </div>
                                <h6 class="title">Award Winner</h6>
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
                                    src="{{ Storage::url("site/about/{$about_page_settings['about_image_2']}") }}" alt="">
                            @endif
                        </figure>
                        <figure class="about-image2">
                            @if (@$about_page_settings['about_image_1'])
                                <img class="img-full"
                                    src="{{ Storage::url("site/about/{$about_page_settings['about_image_1']}") }}" alt="">
                            @endif
                        </figure>
                    </div>
                </div>
                <div class="col-md-12 col-lg-10 col-xl-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h5 class="side-line-left subtitle text-primary-color">About Our Company</h5>
                    <h2 class="mrb-45 mrb-lg-35">Providing the best <span class="text-primary-color">architecture</span> &
                        interior design services</h2>
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
                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <ul class="order-list primary-color">
                                        <li>{{ $feature }}</li>
                                    </ul>
                                </div>
                            @else
                                <div class="col-xl-6 col-lg-6 col-md-12">
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
                        <div class="col-xl-7 col-lg-7 col-md-6 col-sm-6">
                            <div class="featured-icon-box mrb-15">
                                <div class="featured-icon">
                                    <i class="webexflaticon webextheme-icon-003-staircase"></i>
                                </div>
                                <div class="featured-content">
                                    <h4 class="featured-title">Exclusive Design</h4>
                                    <p class="featured-desc">{{ @$about_page_settings['exclusive_design_description'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="featured-icon-box mrb-sm-40">
                                <div class="featured-icon">
                                    <i class="webexflaticon base-icon-158-employee-2"></i>
                                </div>
                                <div class="featured-content">
                                    <h4 class="featured-title">Professional Team</h4>
                                    <p class="featured-desc mrb-0">
                                        {{ @$about_page_settings['pro_team_description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6">
                            <div class="experience">
                                <p class="experience-text">We have more than years of experience</p>
                                <h4 class="experience-year">14+</h4>
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
                            <h5 class="side-line-left text-primary-color mrb-10">Our Services</h5>
                            <h2 class="mrb-25">We Provide <span class="text-primary-color">All</span> Services You Need
                            </h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-12">
                        <p class="mrb-0 mrb-md-40">We assist our clients at every stage: from the design to the 3D
                            renderings, from the submission of detailed quotations to the attention given to ensure the best
                            value money can buy, from the building site to logistics management, the assembly process and
                            the after-sales service.

                            Our aim is to become the exclusive partner of professional architects who wish to enjoy the
                            support and security of one single partner when developing their projects.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section Title Area End -->
    <!-- Service Section Area Start -->
    <section class="service-section-style1 bg-no-repeat bg-cover bg-pos-cb"
        data-background="{{ asset('user_assets/images/bg/abs-bg7.png') }}">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="service-style1">
                                <div class="service-inner">
                                    <i class="service-icon webextheme-icon-003-staircase"></i>
                                    <h4 class="service-title">{{ $service->name }}</h4>
                                    <div class="services-count"></div>
                                    <p class="service-description">{{ Str::limit($service->details, 70, '...') }}</p>
                                    <div class="services-link">
                                        <a class="text-btn"
                                            href="{{ route('site.service.details', encrypt($service->id)) }}">Read
                                            More</a>
                                    </div>
                                    <div class="service-inner-obj"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row mrt-30">
                    <div class="col-xl-12 text-center">
                        <div class="service-load-more">
                            <h5 class="text">Do You Want To explore more services just <span><a
                                        href="{{ route('site.services') }}"
                                        class="text-underline text-primary-color">click
                                        here</a></span></h5>
                        </div>
                    </div>
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



    <!-- Funfact Section Start -->
    <section class="funfact-section pdt-50 pdb-25 pdt-sm-80 pdb-sm-65">
        <div class="funfact-section-obj1">
            <img src="{{ asset('user_assets/images/objects/funfact-obj1.png') }}" alt="">
        </div>
        <div class="funfact-section-obj2">
            <img src="{{ asset('user_assets/images/objects/funfact-obj2.png') }}" alt="">
        </div>
        <div class="funfact-section-obj3">
            <img src="{{ asset('user_assets/images/objects/funfact-obj3.png') }}" alt="">
        </div>
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="800ms">
                        <div class="funfact">
                            <div class="funfact-icon">
                                <span class="webexflaticon base-icon-162-briefcase-2"></span>
                            </div>
                            <h2 class="count-box">
                                <span data-stop="864" data-speed="2500" class="count-text">00</span>
                            </h2>
                            <h5 class="title">Projects Succeed</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="800ms">
                        <div class="funfact">
                            <div class="funfact-icon">
                                <span class="webexflaticon base-icon-101-like-1"></span>
                            </div>
                            <h2 class="count-box">
                                <span data-stop="3450" data-speed="2500" class="count-text">00</span>
                            </h2>
                            <h5 class="title">Satisfied Clients</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="800ms">
                        <div class="funfact">
                            <div class="funfact-icon">
                                <span class="webexflaticon webextheme-icon-architect-4"></span>
                            </div>
                            <h2 class="count-box">
                                <span data-stop="84" data-speed="2500" class="count-text">00</span>
                            </h2>
                            <h5 class="title">Professional Engineers</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="800ms">
                        <div class="funfact">
                            <div class="funfact-icon">
                                <span class="webexflaticon base-icon-037-creativity"></span>
                            </div>
                            <h2 class="count-box">
                                <span data-stop="14" data-speed="2500" class="count-text">00</span>
                            </h2>
                            <h5 class="title">Year Of Experience</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Funfact Section End -->
@endsection
