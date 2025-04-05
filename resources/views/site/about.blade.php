@extends('layouts.user.master')
@section('tiite', 'SIVEC- Inerior Design Services')
@section('content')
    @include('site.partials.page-title')
    <!-- About Section Start -->
    <section class="about-section pdt-110 pdb-105 bg-no-repeat bg-cover bg-pos-cb" data-background="images/bg/abs-bg3.png"
        data-overlay-light="4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8 col-xl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="about-image-box-style1 about-side-line mrr-60 mrr-lg-0">
                        <figure class="about-image1 d-none d-md-block d-lg-block d-xl-block">
                            @if (@$page_settings['about_image_2'])
                                <img class="img-full"
                                    src="{{ Storage::url("site/about/{$page_settings['about_image_2']}") }}">
                            @endif
                        </figure>
                        <figure class="about-image2">
                            @if (@$page_settings['about_image_1'])
                                <img class=" img-full"
                                    src="{{ Storage::url("site/about/{$page_settings['about_image_1']}") }}" alt="">
                            @endif
                        </figure>
                    </div>
                </div>
                <div class="col-md-12 col-lg-10 col-xl-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h5 class="side-line-left subtitle text-primary-color">{{ __('custom.site.about_sivec') }}</h5>
                    <h2 class="mrb-45 mrb-lg-35">{{ __('custom.site.about_we_provide_text_1') }} <span
                            class="text-primary-color">{{ __('custom.site.Engineering Consulting') }}</span>
                        {{ __('custom.site.about_we_provide_text_2') }}</h2>
                    <p class="about-text-block mrb-40">{{ @$page_settings['about_us_text'] }}</p>

                    <div class="row mrb-30 mrb-lg-40">
                        @php
                            if (@$page_settings['about_us_features']) {
                                $features = json_decode($page_settings['about_us_features'], true);
                            } else {
                                $features = [null];
                            }
                            $i = 1;
                        @endphp
                        @foreach ($features as $feature)
                            @if ($i % 2 != 0)
                                <div class="col-xl-6 col-xs-6 col-lg-6 col-md-12">
                                    <ul class="order-list primary-color">
                                        <li>{{ $feature }}</li>
                                    </ul>
                                </div>
                            @else
                                <div class="col-xl-6 col-xs-6 col-lg-6 col-md-12">
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
                                    <i class="webexflaticon webextheme-icon-light-003-staircase"></i>
                                </div>
                                <div class="featured-content">
                                    <h4 class="featured-title">{{ __('custom.site.Exclusive Design') }}</h4>
                                    <p class="featured-desc">{{ @$page_settings['exclusive_design_description'] }}</p>
                                </div>
                            </div>
                            <div class="featured-icon-box mrb-sm-40">
                                <div class="featured-icon">
                                    <i class="webexflaticon base-icon-158-employee-2"></i>
                                </div>
                                <div class="featured-content">
                                    <h4 class="featured-title">{{ __('custom.site.Professional Team') }}</h4>
                                    <p class="featured-desc mrb-0">{{ @$page_settings['pro_team_description'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6">
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
    <!-- Features Style1 Section Start -->
    <!-- Features Style1 Section Start -->
    <section class="bg-no-repeat bg-cover bg-pos-cb pdt-110 pdb-85" data-background="images/bg/abs-bg4.png">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6  col-xs-6 ol-lg-6 col-md-6">
                        <div class="feature-box-style2 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="800ms">
                            <div class="inner-box">
                                <div class="feature-box-icon">
                                    <span class="webextheme-icon-light-interior-design-1"></span>
                                </div>
                                <h6 class="title" style="padding-right:10px !important;">{{ __('custom.site.Design') }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6  col-xs-6 col-s-6 col-lg-6 col-md-6">
                        <div class="feature-box-style2 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="800ms">
                            <div class="inner-box">
                                <div class="feature-box-icon">
                                    <span class="service-icon webextheme-icon-light-measure"></span>
                                </div>
                                <h6 class="title">{{ __('custom.site.Engineering Consulting') }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6  col-xs-6 col-s-6 col-lg-6 col-md-6">
                        <div class="feature-box-style2 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="800ms">
                            <div class="inner-box">
                                <div class="feature-box-icon">
                                    <span class="webextheme-icon-light-architect-4"></span>
                                </div>
                                <h6 class="title">{{ __('custom.site.Skilled Team') }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6  col-xs-6 col-s-6 col-lg-6 col-md-6">
                        <div class="feature-box-style2 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="800ms">
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
    </section>
    <!-- Features Style1 Section End -->


    <!-- Features Style1 Section End -->
@endsection
