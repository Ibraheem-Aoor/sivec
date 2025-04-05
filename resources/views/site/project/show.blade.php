@extends('layouts.user.master')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css'>
    <style>
        [class^=swiper-button-] {
            transition: all 0.3s ease;
        }

        .swiper-slide {
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
        }

        *,
        *:before,
        *:after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .swiper-container {
            width: 80%;
            height: 100vh;
            float: left;
            transition: opacity 0.6s ease, transform 0.3s ease;
        }

        .swiper-container.nav-slider {
            width: 20%;
            padding-left: 5px;
        }

        .swiper-container.nav-slider .swiper-slide {
            cursor: pointer;
            opacity: 0.4;
            transition: opacity 0.3s ease;
        }

        .swiper-container.nav-slider .swiper-slide.swiper-slide-active {
            opacity: 1;
        }

        .swiper-container.nav-slider .swiper-slide .content {
            width: 100%;
        }

        .swiper-container.nav-slider .swiper-slide .content .title {
            font-size: 20px;
        }

        .swiper-container:hover .swiper-button-prev,
        .swiper-container:hover .swiper-button-next {
            transform: translateX(0);
            opacity: 1;
            visibility: visible;
        }

        .swiper-container.loading {
            opacity: 0;
            visibility: hidden;
        }

        .swiper-slide {
            overflow: hidden;
        }

        .swiper-slide .slide-bgimg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-position: center;
            background-size: cover !important;
            background-repeat: no-repeat !important;
        }

        .swiper-slide .entity-img {
            display: none;
        }

        .swiper-slide .content {
            position: absolute;
            top: 40%;
            left: 0;
            width: 50%;
            padding-left: 5%;
            color: #fff;
        }

        .swiper-slide .content .title {
            font-size: 2.6em;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .swiper-slide .content .caption {
            display: block;
            font-size: 13px;
            line-height: 1.4;
            transform: translateX(50px);
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.7s ease;
        }

        .swiper-slide .content .caption.show {
            transform: translateX(0);
            opacity: 1;
        }

        [class^=swiper-button-] {
            width: 44px;
            opacity: 0;
            visibility: hidden;
        }

        .swiper-button-prev {
            transform: translateX(50px);
        }

        .swiper-button-next {
            transform: translateX(-50px);
        }

        .slider-section {
            margin-top: 9% !important;
        }

        @media(max-width:780px) {
            .swiper-slide .slide-bgimg {
                background-size: contain !important;
            }
        }
    </style>
@endpush
@section('content')
    {{-- @include('site.partials.page-title') --}}

    <!-- Project Details Section Start -->
    <section class="col-sm-12 slider-section">
        <!-- partial:index.partial.html -->
        <div class="swiper-container main-slider loading">
            <div class="swiper-wrapper">
                @foreach ($project->images as $image)
                    <div class="swiper-slide">
                        <figure class="slide-bgimg" style="background-image:url({{ getImageUrl($image->name) }})">
                            <img src="{{ getImageUrl($image->name) }}" class="entity-img" />
                        </figure>
                        <div class="content d-none">
                            <p class="title">Shaun Matthews</p>
                            <span class="caption">Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book.</span>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev swiper-button-white"></div>
            <div class="swiper-button-next swiper-button-white"></div>
        </div>

        <!-- Thumbnail navigation -->
        <div class="swiper-container nav-slider loading">
            <div class="swiper-wrapper" role="navigation">
                @foreach ($project->images as $image)
                    <div class="swiper-slide">
                        <figure class="slide-bgimg" style="background-image:url({{ getImageUrl($image->name) }})">
                            <img src="{{ getImageUrl($image->name) }}" class="entity-img" />
                        </figure>
                        <div class="content d-none">
                            <p class="title">Shaun Matthews</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Project Section End -->
    <!-- Call to Action Start -->
    @include('site.partials.call_section')
    <!-- Call to Action End -->
@endsection

@push('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js'></script>

    <script>
        // Params
        let mainSliderSelector = '.main-slider',
            navSliderSelector = '.nav-slider',
            interleaveOffset = 0.5;

        // Main Slider
        let mainSliderOptions = {
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 3000
            },
            loopAdditionalSlides: 10,
            grabCursor: true,
            watchSlidesProgress: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            on: {
                init: function() {
                    this.autoplay.stop();
                },
                imagesReady: function() {
                    this.el.classList.remove('loading');
                    this.autoplay.start();
                },
                slideChangeTransitionEnd: function() {
                    let swiper = this,
                        captions = swiper.el.querySelectorAll('.caption');
                    for (let i = 0; i < captions.length; ++i) {
                        captions[i].classList.remove('show');
                    }
                    swiper.slides[swiper.activeIndex].querySelector('.caption').classList.add('show');
                },
                progress: function() {
                    let swiper = this;
                    for (let i = 0; i < swiper.slides.length; i++) {
                        let slideProgress = swiper.slides[i].progress,
                            innerOffset = swiper.width * interleaveOffset,
                            innerTranslate = slideProgress * innerOffset;

                        swiper.slides[i].querySelector(".slide-bgimg").style.transform =
                            "translateX(" + innerTranslate + "px)";
                    }
                },
                touchStart: function() {
                    let swiper = this;
                    for (let i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = "";
                    }
                },
                setTransition: function(speed) {
                    let swiper = this;
                    for (let i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = speed + "ms";
                        swiper.slides[i].querySelector(".slide-bgimg").style.transition =
                            speed + "ms";
                    }
                }
            }
        };
        let mainSlider = new Swiper(mainSliderSelector, mainSliderOptions);

        // Navigation Slider
        let navSliderOptions = {
            loop: true,
            loopAdditionalSlides: 10,
            speed: 1000,
            spaceBetween: 5,
            slidesPerView: 5,
            centeredSlides: true,
            touchRatio: 0.2,
            slideToClickedSlide: true,
            direction: 'vertical',
            on: {
                imagesReady: function() {
                    this.el.classList.remove('loading');
                },
                click: function() {
                    mainSlider.autoplay.stop();
                }
            }
        };
        let navSlider = new Swiper(navSliderSelector, navSliderOptions);

        // Matching sliders
        mainSlider.controller.control = navSlider;
        navSlider.controller.control = mainSlider;
    </script>
@endpush
