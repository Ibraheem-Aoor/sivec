@extends('layouts.user.master')
@section('tiite', 'SIVEC- Inerior Design Services')
@push('css')
    <style>
        .gallery-image {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .gallery-image img {
            transform: scale(1.0);
            transition: transform 0.4s ease;
        }

        .img-box {
            box-sizing: content-box;
            margin: 20px;
            width: 400px;
            height: auto;
            overflow: hidden;
            display: inline-block !important;
            color: white;
            position: relative;
            background-color: white;
            border: 1px solid #F25F29;
        }

        .caption {
            position: absolute;
            bottom: 5px;
            left: 20px;
            opacity: 0.0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .transparent-box {
            width: 650px;
            height: auto;
            background-color: rgba(0, 0, 0, 0);
            position: absolute;
            top: 0;
            left: 0;
            transition: background-color 0.3s ease;
        }

        .img-box:hover img {
            transform: scale(1.1);
        }

        .img-box:hover .transparent-box {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .img-box:hover .caption {
            transform: translateY(-20px);
            opacity: 1.0;
        }

        .img-box:hover {
            cursor: pointer;
        }

        .caption>p:nth-child(2) {
            font-size: 0.8em;
        }

        .opacity-low {
            opacity: 0.5;
        }
    </style>
@endpush
@section('content')
    {{-- @include('site.partials.page-title') --}}
    <!-- Ramadan Intro  Section Start -->
    <section class="bg-secondary-color bg-no-repeat bg-cover bg-pos-cb pdt-110 pdb-85"
        style="background: none !important; margin-bottom:25vh !important; margin-top:20vh !important;">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-10 col-xl-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="800ms">
                        <h5 class="side-line-left text-primary-color mrb-10">{{ __('custom.site.ramdan_page_title') }}</h5>
                        <h2 class="text-black mrb-30 mrb-sm-30">{{ __('custom.site.ramadan_greetings') }} </h2>
                        <div class="video-block mrb-lg-60">
                            <div class="video-link">
                                <a class="video-popup"
                                    href="{{ asset('user_assets/images/ramadan/greetings_video.mp4') }}"><i
                                        class="base-icon-play1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-10 col-xl-6 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="800ms">
                        <div class="shine-effect">
                            <img loading="lazy" class="img-full"
                                src="{{ asset('user_assets/images/ramadan/greetings_1.webp') }}" alt="offer image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ramadan Outro  Section End -->


    {{-- Ramadan Offers Start --}}
    <section>
        <div class="text-center">
            <h5 class="text-primary-color mrb-10">{{ __('custom.site.ramdan_offers_title') }}</h5>
            <h2 class="text-black mrb-30 mrb-sm-30">{{ __('custom.site.ramdan_offers_text') }} </h2>
        </div>
        <div class="gallery-image col-sm-12">
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_1.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_2.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_3.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_4.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_6.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_7.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_8.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_9.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_10.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_11.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_12.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_13.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_14.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_15.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_16.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_17.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_18.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_19.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_20.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_21.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_22.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_23.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_24.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_25.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/greetings_offer_26.webp') }}" loading="lazy" alt="" />
            </div>
            <div class="img-box" id="img-box">
                <img src="{{ asset('user_assets/images/ramadan/working_hours_updated.webp') }}" loading="lazy"
                    alt="" />
            </div>
        </div>
    </section>
    {{-- Ramadan Offers Ends --}}



@endsection
