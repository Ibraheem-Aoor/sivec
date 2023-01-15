<!-- Header Area Start -->
<header class="header-style-01">
    <nav class="main-menu sticky-header">
        <div class="main-menu-wrapper">
            <div class="main-menu-logo">
                <a href="index.html">
                    <img src="{{asset('user_assets/images/logo-light.svg')}}" width="165" height="72" alt="logo">
                </a>
            </div>
            <ul class="main-nav-menu">
                <li class="">
                    <a href="{{route('site.home')}}">HOME</a>
                </li>

                <li class="">
                    <a href="{{route('site.about')}}">ABOUT</a>
                </li>
                <li class="">
                    <a href="{{route('site.services')}}">SERVICES</a>
                </li>
                <li class="">
                    <a href="{{route('site.contact')}}">CONTACT</a>
                </li>

            </ul>
            <div class="main-menu-right">
                <a href="#" class="mobile-nav-toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                {{-- <a href="#" class="search-toggler">
                    <i class="base-icon-search-1"></i>
                </a> --}}
                <div class="header-contact-info">
                    <div class="header-contact-info-icon">
                        <i class="base-icon-011-phone-1"></i>
                    </div>
                    <div class="header-contact-info-text">
                        <p class="call-text">Call Anytime</p>
                        <h5 class="phone-no"><a href="tel:123456789">+972 0598298969</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- Header Area End -->
