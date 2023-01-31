<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Sevic">
    <meta name="csrf" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="SIVECInterior & Architecture">
    <meta name="keywords"
        content="architecture, interior, decoration, design, corporate, modern, html, template, multipurpose, creative" />
    <title>{{ $page_title }}</title>
    <link href="{{ asset('user_assets/images/favicon.png') }}" rel="shortcut icon" type="image/png">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('user_assets/css/style.css?v=0.2') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/css/responsive.css') }}">
    @stack('css')
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
                </div>
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
        </div>
    </section>
    <!-- Preloader End -->

    @include('layouts.user.navbar')

    @yield('content')


    <!-- Footer Area Start -->
    <footer class="footer bg-cover" data-background="https://via.placeholder.com/1920x1280" data-overlay-dark="98">
        <div class="footer-main-area">
            <div class="footer-section-obj1">
                <img src="{{ asset('user_assets/images/objects/footer-obj1.png') }}" alt="">
            </div>
            <div class="footer-section-obj2">
                <img src="{{ asset('user_assets/images/objects/footer-obj2.png') }}" alt="">
            </div>
            <div class="container">
                <div class="row pdb-65">
                    <div class="col-xl-4 col-lg-6">
                        <div class="widget footer-widget mrr-60 mrr-md-0">
                            <h5 class="widget-title text-white mrb-30">Newsletter</h5>
                            <p class="mrb-30">Join Our Community And Start Receiving Our News And Updates</p>
                            <div class="newsletter-from">
                                <div class="email">
                                    <input type="email" name="EMAIL" placeholder="Enter your email" required="">
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
                            <h5 class="widget-title text-white mrb-30">Quick Links</h5>
                            <ul class="footer-widget-list">
                                <li><a href="{{route('site.services')}}">Services</a></li>
                                <li><a href="{{route('site.projects')}}">Projects</a></li>
                                <li><a href="{{route('site.contact')}}">Contact</a></li>
                                <li><a href="{{route('site.about')}}">About</a></li>
                                <li><a href="{{route('site.jobs')}}">Jobs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="widget footer-widget mrr-30 mrr-md-0">
                            <h5 class="widget-title text-white mrb-30">Contact</h5>
                            <address class="mrb-0">
                                <p>{{ @$site_settings['main_address'] }}</p>
                                <div class="mrb-10"><a href="#"><i
                                            class="fas fa-phone-alt mrr-10"></i>{{ @$site_settings['phone_number'] }}</a>
                                </div>
                                <div class="mrb-10"><a href="#"><i
                                            class="fas fa-envelope mrr-10"></i>{{ @$site_settings['company_email'] }}</a>
                                </div>
                                <div class="mrb-0"><a href="#"><i
                                            class="fas fa-globe mrr-10"></i>www.sevic.ae</a></div>
                            </address>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="widget footer-widget mrr-60 mrr-md-0">
                            <div class="footer-logo">
                                <img src="{{ asset('user_assets/images/logo/logo.png') }}" alt=""
                                    class="mrb-25">
                            </div>
                            <p class="mrb-25"></p>
                            <ul class="social-list">
                                <li><a href="{{ @$site_settings['facebook'] }}"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="{{ @$site_settings['twitter'] }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ @$site_settings['instagram'] }}"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li><a href="{{ @$site_settings['linked_in'] }}"><i class="fab fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row pdt-30 pdb-30 footer-copyright-area">
                    <div class="col-xl-12">
                        <div class="text-center">
                            Copyright &copy; 2023 <a href="{{ route('site.home') }}">SIVEC</a>
                            All rights reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->
    <!-- Mobile Nav Sidebar Content Start -->
    <div class="mobile-nav-wrapper">
        <div class="mobile-nav-overlay mobile-nav-toggler"></div>
        <div class="mobile-nav-content">
            <a href="#" class="mobile-nav-close mobile-nav-toggler">
                <span></span>
                <span></span>
            </a>
            <div class="logo-box">
                <a href="index-2.html" aria-label="logo image">
                    <img src="{{ asset('user_assets/images/logo/logo.png') }}" width="165" height="72"
                        alt="logo">
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
                        href="tel:{{ @$site_settings['phone_number'] }}">{{ @$site_settings['phone_number'] }}</a></li>
            </ul>
            <ul class="social-list list-primary-color">
                <li><a href="{{ @$site_settings['facebook'] }}"><i class="fab fa-facebook"></i></a></li>
                <li><a href="{{ @$site_settings['twitter'] }}"><i class="fab fa-twitter"></i></a></li>
                <li><a href="{{ @$site_settings['instagram'] }}"><i class="fab fa-instagram"></i></a></li>
                <li><a href="{{ @$site_settings['linked_in'] }}"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- Mobile Nav Sidebar Content End -->
    <!-- Header Search Popup Start -->
    {{-- <div class="search-popup">
        <div class="search-popup-overlay search-toggler"></div>
        <div class="search-popup-content">
            <form action="#">
                <label for="search" class="sr-only">search here</label>
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="base-icon-search-1"></i>
                </button>
            </form>
        </div>
    </div> --}}
    <!-- Header Search Popup End -->
    <!-- Back to Top Start -->
    <div class="anim-scroll-to-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Back to Top end -->
    <!-- Integrated important scripts here -->
    <script src="{{ asset('user_assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/jquery.event.move.js') }}"></script>
    <script src="{{ asset('user_assets/js/jquery.twentytwenty.js') }}"></script>
    <script src="{{ asset('user_assets/js/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('user_assets/js/backtotop.js') }}"></script>
    <script src="{{ asset('user_assets/js/trigger.js') }}"></script>
    @if ($errors->any())
        @foreach ($errors as $error)
            <script>
                toastr.error("{{ $error }}");
            </script>
        @endforeach
    @endif
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
                }
            });
        });
    </script>
    @stack('js')
</body>

</html>
