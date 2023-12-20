<!DOCTYPE html>
<html lang="ar" dir="rt">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="sivec">
    <meta name="csrf" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ $meta_desc }}">
    <meta name="keywords"
        content="الرؤية الذكية للاستشارات الهندسية,الهندسية,للاستشارات,المتكاملة,الرؤية,الرؤية المتكاملة للاستشارات الهندسية,sivec,architecture,interior,decoration, creative,engineering,engineering consulting ,sevic,svec, alrouya almoutakamela , الرؤية المتكاملة , الرؤية العصرية , تصاميم هندسية , مباني, مساجد , دبي , الامارات" />
    <meta property="og:title" content="{{ $page_title }}" />
    <meta property="og:type" content="Engineering Consulting" />
    <meta property="og:url" content="{{ route('site.home') }}" />
    <meta property="og:image" content="{{ asset('user_assets/images/social_meida.png') }}" />
    <meta name="twitter:title" content="{{ $page_title }}">
    <meta name="twitter:description" content="{{ $meta_desc }}">
    <meta name="twitter:image" content="{{ asset('user_assets/images/social_meida.png') }}">
    <meta name="twitter:card" content="asset('user_assets/images/social_meida.png')">
    <!--  Non-Essential, But Recommended -->
    <meta property="og:description" content="{{ $meta_desc }}">
    <meta property="og:site_name" content="SEVIC">
    <meta name="twitter:image:alt" content="{{ $page_title }}">
    @stack('meta')
    <title>{{ $page_title }}</title>
    <link href="{{ asset('user_assets/images/favicon.png') }}" rel="shortcut icon" type="image/png">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('user_assets/css/style.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/css/custom.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/css/responsive.css?v=1.0') }}">
    @stack('css')
    @if (app()->getLocale() == 'ar')
        <style>
            .footer-widget-list li a:before {
                position: absolute;
                content: '\f17d';
                left: 80px !important;
                top: -3px;
                font-family: 'webexbaseicon';
                font-weight: 600;
                rotate: 180deg !important;
                margin-left: 20px !important;
            }

            .footer-widget-list li a {
                padding-right: 30px !important;
            }

            .footer-widget-list li a:hover {
                color: var(--primary-color);
                padding-right: 35px !important;
            }

            .prime-text {
                color: #F25F29 !important;
            }
        </style>
    @endif
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1302068987059779');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1302068987059779&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

    <!-- Snap Pixel Code -->
    <script type='text/javascript'>
        (function(e, t, n) {
            if (e.snaptr) return;
            var a = e.snaptr = function() {
                a.handleRequest ? a.handleRequest.apply(a, arguments) : a.queue.push(arguments)
            };
            a.queue = [];
            var s = 'script';
            r = t.createElement(s);
            r.async = !0;
            r.src = n;
            var u = t.getElementsByTagName(s)[0];
            u.parentNode.insertBefore(r, u);
        })(window, document,
            'https://sc-static.net/scevent.min.js');

        snaptr('init', '88cc0ffc-efc7-4444-a58a-306ce97ac2e1', {
            'user_email': '_INSERT_USER_EMAIL_'
        });

        snaptr('track', 'PAGE_VIEW');
    </script>
    <!-- End Snap Pixel Code -->
</head>

<body>
    <!-- Preloader Start -->
    <section>
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="S" class="letters-loading">S</span>
                        <span data-text-preloader="I" class="letters-loading">I</span>
                        <span data-text-preloader="V" class="letters-loading">V</span>
                        <span data-text-preloader="E" class="letters-loading">E</span>
                        <span data-text-preloader="C" class="letters-loading">C</span>
                    </div>
                    @if ($locale == 'en')
                        <div class="txt-loading preloader-text">
                            <span data-text-preloader="A" class="letters-loading">A</span>
                            <span data-text-preloader="L" class="letters-loading">L</span>
                            <span data-text-preloader="R" class="letters-loading">R</span>
                            <span data-text-preloader="O" class="letters-loading">O</span>
                            <span data-text-preloader="U" class="letters-loading">U</span>
                            <span data-text-preloader="Y" class="letters-loading">Y</span>
                            <span data-text-preloader="A" class="letters-loading">A</span>
                            &nbsp;
                            <span data-text-preloader="A" class="letters-loading">A</span>
                            <span data-text-preloader="L" class="letters-loading">L</span>
                            <span data-text-preloader="M" class="letters-loading">M</span>
                            <span data-text-preloader="O" class="letters-loading">O</span>
                            <span data-text-preloader="T" class="letters-loading">T</span>
                            <span data-text-preloader="A" class="letters-loading">A</span>
                            <span data-text-preloader="K" class="letters-loading">K</span>
                            <span data-text-preloader="A" class="letters-loading">A</span>
                            <span data-text-preloader="M" class="letters-loading">M</span>
                            <span data-text-preloader="E" class="letters-loading">E</span>
                            <span data-text-preloader="L" class="letters-loading">L</span>
                            <span data-text-preloader="A" class="letters-loading">A</span>
                        </div>
                    @else
                        <div class="txt-loading preloader-text">
                            <span data-text-preloader="الرؤية المتكاملة" class="letters-loading">الرؤية
                                المتكاملة</span>
                        </div>
                    @endif
                </div>
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
        </div>
    </section>
    <!-- Preloader End -->

    @include('layouts.user.navbar')

    @yield('content')



    @if (!isset($footer_disabled))
        <!-- Footer Area Start -->
        <footer class="footer bg-cover" data-background="https://via.placeholder.com/1920x1280"
            data-overlay-dark="98">
            <div class="footer-main-area">
                <div class="footer-section-obj1">
                    <img src="{{ asset('user_assets/images/objects/footer-obj1.png') }}" alt="footer-img-1">
                </div>
                <div class="footer-section-obj2">
                    <img src="{{ asset('user_assets/images/objects/footer-obj2.png') }}" alt="footer-img-2">
                </div>
                <div class="container">
                    <div class="row pdb-65">
                        <div class="col-xl-4 col-lg-6">
                            <div class="widget footer-widget mrr-60 mrr-md-0">
                                <h5 class="widget-title text-white mrb-30">{{ __('custom.site.Newsletter') }}</h5>
                                <p class="mrb-30">{{ __('custom.site.newsletter_text') }}</p>
                                <div class="newsletter-from">
                                    <div class="email">
                                        <input type="email" name="EMAIL"
                                            placeholder="{{ __('custom.site.enter_email') }}" required="">
                                    </div>
                                    <div class="submit">
                                        <button type="submit">
                                            <i class="base-icon-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6">
                            <div class="widget footer-widget">
                                <h5 class="widget-title text-white mrb-30">{{ __('custom.site.Quick Links') }}</h5>
                                <ul class="footer-widget-list">
                                    <li><a class="@if (app()->getLocale() == 'ar') footer-links-edited @endif"
                                            href="{{ route('site.services') }}"
                                            class="capitlized">{{ __('custom.site.SERVICES') }}</a></li>
                                    <li><a class="@if (app()->getLocale() == 'ar') footer-links-edited @endif"
                                            href="{{ route('site.projects') }}"
                                            class="capitlized">{{ __('custom.site.PROJECTS') }}</a></li>
                                    <li><a class="@if (app()->getLocale() == 'ar') footer-links-edited @endif"
                                            href="{{ route('site.contact') }}"
                                            class="capitlized">{{ __('custom.site.CONTACT') }}</a></li>
                                    <li>
                                        <a class="@if (app()->getLocale() == 'ar') footer-links-edited @endif"
                                            href="{{ route('site.about') }}"
                                            class="capitlized">{{ __('custom.site.ABOUT') }}</a>
                                    </li>
                                    <li><a class="@if (app()->getLocale() == 'ar') footer-links-edited @endif"
                                            href="{{ route('site.jobs') }}"
                                            class="capitlized">{{ __('custom.site.JOBS') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="widget footer-widget mrr-30 mrr-md-0">
                                <h5 class="widget-title text-white mrb-30">{{ __('custom.site.CONTACT') }}</h5>
                                <address class="mrb-0" style="font-size:small !important;">
                                    <p>{{ @$site_settings['main_address'] }}</p>
                                    <div class="mrb-10"><a target="_blank" href="#"><i
                                                class="fas fa-phone-alt mrr-10"></i>{{ @$site_settings['phone_number'] }}</a>
                                    </div>
                                    <div class="mrb-10"><a target="_blank" href="#"><i
                                                class="fas fa-phone-alt mrr-10"></i>{{ @$site_settings['phone_number_2'] }}</a>
                                    </div>
                                    <div class="mrb-10"><a
                                            href="https://wa.me/971{{ @$site_settings['whatsaap_number'] }}"><i
                                                class="fab fa-whatsapp mrr-10"></i>{{ @$site_settings['whatsaap_number'] }}</a>
                                    </div>
                                    <div class="mrb-10"><a target="_blank" href="#"><i
                                                class="fas fa-envelope mrr-10"></i>{{ @$site_settings['company_email'] }}</a>
                                    </div>
                                    <div class="mrb-0"><a target="_blank" href="#"><i
                                                class="fas fa-globe mrr-10"></i>www.sivec.ae</a></div>
                                </address>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="widget footer-widget mrr-60 mrr-md-0">
                                <div class="footer-logo">
                                    <img src="{{ asset('user_assets/images/logo/white_logo.webp?v=1.0') }}"
                                        alt="logo-white" class="mrb-25">
                                </div>
                                <p class="mrb-25"></p>
                                <ul class="social-list">
                                    <li><a target="_blank" href="{{ @$site_settings['facebook'] }}"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li><a target="_blank" href="{{ @$site_settings['twitter'] }}"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a target="_blank" href="{{ @$site_settings['instagram'] }}"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li><a target="_blank" href="{{ @$site_settings['linked_in'] }}"><i
                                                class="fab fa-linkedin"></i></a>
                                    </li>
                                    <li><a target="_blank" href="{{ @$site_settings['snapchat'] }}"><i
                                                class="fab fa-snapchat"></i></a>
                                    </li>
                                    <li><a target="_blank" href="{{ @$site_settings['youtube'] }}"><i
                                                class="fab fa-youtube"></i></a>
                                    </li>
                                    <li><a target="_blank" href="{{ @$site_settings['youtube'] }}"><i
                                                class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row pdt-30 pdb-30 footer-copyright-area">
                        <div class="col-xl-12">
                            <div class="text-center">
                                {!! __('custom.site.copy_rights') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @endif
    <!-- Footer Area End -->
    <!-- Mobile Nav Sidebar Content Start -->
    <div class="mobile-nav-wrapper">
        <div class="mobile-nav-overlay mobile-nav-toggler"></div>
        <div class="mobile-nav-content">
            <a target="_blank" href="#" class="mobile-nav-close mobile-nav-toggler">
                <span></span>
                <span></span>
            </a>
            <div class="logo-box">
                <a target="_blank" href="{{ route('site.home') }}" aria-label="logo image">
                    <img src="{{ asset('user_assets/images/logo/black_logo.webp?v=1.0') }}" width="165"
                        height="72" alt="logo-black">
                </a>
            </div>
            <div class="mobile-nav-container"></div>
            <ul class="list-items mobile-sidebar-contact">
                <li><span
                        class="fa fa-map-marker-alt mrr-10 text-primary-color"></span>{{ @$site_settings['main_address'] }}
                </li>
                <li><span class="fas fa-envelope mrr-10 text-primary-color"></span><a
                        href="mailto:{{ @$site_settings['company_email'] }}">{{ @$site_settings['company_email'] }}</a>
                </li>
                <li><span class="fas fa-phone-alt mrr-10 text-primary-color"></span><a
                        href="tel:{{ @$site_settings['phone_number'] }}">{{ @$site_settings['phone_number'] }}</a>
                </li>
                <li><span class="fas fa-phone-alt mrr-10 text-primary-color"></span><a
                        href="tel:{{ @$site_settings['phone_number_2'] }}">{{ @$site_settings['phone_number_2'] }}</a>
                </li>
                <li><span class="fab fa-whatsapp mrr-10 text-primary-color"></span><a
                        href="https://wa.me/971{{ @$site_settings['whatsaap_number'] }}">{{ @$site_settings['whatsaap_number'] }}</a>
                </li>
            </ul>
            <ul class="social-list list-primary-color">
                <li><a target="_blank" href="{{ @$site_settings['facebook'] }}"><i class="fab fa-facebook"></i></a>
                </li>
                <li><a target="_blank" href="{{ @$site_settings['twitter'] }}"><i class="fab fa-twitter"></i></a>
                </li>
                <li><a target="_blank" href="{{ @$site_settings['instagram'] }}"><i
                            class="fab fa-instagram"></i></a></li>
                <li><a target="_blank" href="{{ @$site_settings['linked_in'] }}"><i class="fab fa-linkedin"></i></a>
                </li>
                <li><a target="_blank" href="{{ @$site_settings['snapchat'] }}"><i class="fab fa-snapchat"></i></a>
                </li>
                <li><a target="_blank" href="{{ @$site_settings['youtube'] }}"><i class="fab fa-youtube"></i></a>
                </li>
                <li><a target="_blank" href="{{ @$site_settings['youtube'] }}"><i class="fab fa-youtube"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Mobile Nav Sidebar Content End -->

    <!-- Start Whatsapp Catatlog Modal -->
    <div class="modal fade" id="catalogModal" tabindex="-1" role="dialog" aria-labelledby="testModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testModalLabel">{!! __('custom.site.catalog_modal_headline') !!}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <video id="catalogVideo" controls>
                            <source src="{{ asset('user_assets/videos/whatsapp_catalog.mp4?v=1.0') }}">
                        </video>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="https://wa.me/c/971543018342" target="_blank" id="whatsapp-continue-btn"
                        class="btn btn-success">{{ __('custom.site.catalog_continue') }} <i
                            class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Whatsapp Catatlog Modal -->


    <!-- Back to Top Start -->
    <div class="anim-scroll-to-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Back to Top end -->
    <!-- Integrated important scripts here -->
    <script src="{{ asset('user_assets/js/jquery-3.6.0.min.js?v=1.0') }}"></script>
    <script src="{{ asset('user_assets/js/jquery.nice-select.min.js?v=1.0') }}"></script>
    <script src="{{ asset('user_assets/js/bootstrap.min.js?v=1.0') }}"></script>
    <script src="{{ asset('user_assets/js/jquery.appear.min.js?v=1.0') }}"></script>
    <script src="{{ asset('user_assets/js/wow.min.js?v=1.0') }}"></script>
    <script src="{{ asset('user_assets/js/owl.carousel.min.js?v=1.0') }}"></script>
    <script src="{{ asset('user_assets/js/jquery.event.move.js?v=1.0') }}"></script>
    <script src="{{ asset('user_assets/js/jquery.twentytwenty.js?v=1.0') }}"></script>
    <script src="{{ asset('user_assets/js/tilt.jquery.min.js?v=1.0') }}"></script>
    <script src="{{ asset('user_assets/js/magnific-popup.min.js?v=1.0') }}"></script>
    <script src="{{ asset('user_assets/js/backtotop.js?v=1.0') }}"></script>
    <script src="{{ asset('user_assets/js/trigger.js?v=1.0') }}"></script>
    <script>
        $(".owl-carousel").owlCarousel({
            autoPlay: 3000,
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content'),
            },
        });
    </script>
    <script>
        $(document).on('submit', 'form', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var submitBtn = $(this).find('button[type="submit"]');
            submitBtn.prop('disabled', true);
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                    if (response.reset_form) {
                        $('button[type="reset"]').click();
                    }
                    submitBtn.prop('disabled', false);
                },
                error: function(response) {
                    console.log(response);
                    if (response.status == 422) {
                        $.each(response.responseJSON.errors, function(key, errorsArray) {
                            $.each(errorsArray, function(item, error) {
                                toastr.error(error);
                            });
                        });
                    } else if (response.responseJSON && response.responseJSON.message) {
                        toastr.error(response.responseJSON.message);
                    } else {
                        toastr.error(response.message);
                    }
                    submitBtn.prop('disabled', false);
                }
            });
        });
        $(document).on('shown.bs.modal', '#catalogModal', function() {
            $('#catalogVideo').get(0).play();
        });
        $(document).on('hide.bs.modal', '#catalogModal', function() {
            $('#catalogVideo').get(0).pause();
        });

        $(document).on('click', '#whatsapp-continue-btn', function() {
            $('#catalogModal').modal('hide');
        })
    </script>

    @stack('js')
</body>

</html>
