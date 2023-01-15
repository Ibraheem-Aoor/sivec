<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Interar">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Interar Interior & Architecture HTML Template">
    <meta name="keywords"
        content="architecture, interior, decoration, design, corporate, modern, html, template, multipurpose, creative" />
    <title>Interar - Interior & Architecture HTML Template</title>
    <link href="{{asset('user_assets/images/favicon.png')}}" rel="shortcut icon" type="image/png">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('user_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/css/responsive.css')}}">
</head>

<body>
    <!-- Preloader Start -->
    <section>
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="I" class="letters-loading">I</span>
                        <span data-text-preloader="N" class="letters-loading">N</span>
                        <span data-text-preloader="T" class="letters-loading">T</span>
                        <span data-text-preloader="E" class="letters-loading">E</span>
                        <span data-text-preloader="R" class="letters-loading">R</span>
                        <span data-text-preloader="A" class="letters-loading">A</span>
                        <span data-text-preloader="R" class="letters-loading">R</span>
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
                <img src="{{asset('user_assets/images/objects/footer-obj1.png')}}" alt="">
            </div>
            <div class="footer-section-obj2">
                <img src="{{asset('user_assets/images/objects/footer-obj2.png')}}" alt="">
            </div>
            <div class="container">
                <div class="row pdb-65">
                    <div class="col-xl-4 col-lg-6">
                        <div class="widget footer-widget mrr-60 mrr-md-0">
                            <h5 class="widget-title text-white mrb-30">Newsletter</h5>
                            <p class="mrb-30">Seamlessly visualize quality intellectual ideal without collaboration
                                superior montes soon maecenas capita idea listically</p>
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
                            <h5 class="widget-title text-white mrb-30">Services</h5>
                            <ul class="footer-widget-list">
                                <li><a href="service-architecture.html">Architecture</a></li>
                                <li><a href="service-interior-work.html">Interior Work</a></li>
                                <li><a href="service-kitchen-design.html">Kitchen Design</a></li>
                                <li><a href="service-decoration-art.html">Decoration Art</a></li>
                                <li><a href="service-renovation.html">Renovation</a></li>
                                <li><a href="service-exterior-design.html">Exterior Design</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="widget footer-widget mrr-30 mrr-md-0">
                            <h5 class="widget-title text-white mrb-30">Contact</h5>
                            <address class="mrb-0">
                                <p>32 Dora Creek, tuntable creek, New South Wales 2480, Australia</p>
                                <div class="mrb-10"><a href="#"><i class="fas fa-phone-alt mrr-10"></i>+088 234
                                        432 15565</a></div>
                                <div class="mrb-10"><a href="#"><i
                                            class="fas fa-envelope mrr-10"></i>sample@yourdomain.com</a></div>
                                <div class="mrb-0"><a href="#"><i
                                            class="fas fa-globe mrr-10"></i>www.domainname.com</a></div>
                            </address>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="widget footer-widget mrr-60 mrr-md-0">
                            <div class="footer-logo">
                                <img src="{{asset('user_assets/images/logo-light.svg')}}" alt="" class="mrb-25">
                            </div>
                            <p class="mrb-25">There are many vari of pass but majority have suffered some injected of a
                                humour</p>
                            <ul class="social-list">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row pdt-30 pdb-30 footer-copyright-area">
                    <div class="col-xl-12">
                        <div class="text-center">

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
                    <img src="{{asset('user_assets/images/logo-light.svg')}}" width="165" height="72" alt="logo">
                </a>
            </div>
            <div class="mobile-nav-container"></div>
            <ul class="list-items mobile-sidebar-contact">
                <li><span class="fa fa-map-marker-alt mrr-10 text-primary-color"></span>121 King Street, Australia</li>
                <li><span class="fas fa-envelope mrr-10 text-primary-color"></span><a
                        href="mailto:example@gmail.com">example@gmail.com</a></li>
                <li><span class="fas fa-phone-alt mrr-10 text-primary-color"></span><a href="tel:123456789">+972
                        0598298969</a></li>
            </ul>
            <ul class="social-list list-primary-color">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
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
    <script src="{{asset('user_assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('user_assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('user_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('user_assets/js/jquery.appear.min.js')}}"></script>
    <script src="{{asset('user_assets/js/wow.min.js')}}"></script>
    <script src="{{asset('user_assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('user_assets/js/jquery.event.move.js')}}"></script>
    <script src="{{asset('user_assets/js/jquery.twentytwenty.js')}}"></script>
    <script src="{{asset('user_assets/js/tilt.jquery.min.js')}}"></script>
    <script src="{{asset('user_assets/js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('user_assets/js/backtotop.js')}}"></script>
    <script src="{{asset('user_assets/js/trigger.js')}}"></script>
</body>

</html>
