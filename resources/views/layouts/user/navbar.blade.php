<!-- Header Area Start -->
<header class="header-style-01">
    <nav class="main-menu sticky-header">
        <div class="main-menu-wrapper" style="background: #3E3D47 !important;">
            <div class="main-menu-logo">
                <a href="{{ route('site.home') }}">
                    <img src="{{ asset('user_assets/images/logo/logo.png') }}" width="165" height="72" alt="logo">
                </a>
            </div>
            <ul class="main-nav-menu">
                <li class="">
                    <a href="{{ route('site.home') }}">HOME</a>
                </li>
                <li class="">
                    <a href="{{ route('site.services') }}">SERVICES</a>
                </li>
                <li class="">
                    <a href="{{ route('site.projects') }}">PROJECTS</a>
                </li>
                <li class="">
                    <a href="{{ route('site.about') }}">ABOUT</a>
                </li>
                <li class="">
                    <a href="{{ route('site.contact') }}">CONTACT</a>
                </li>
                <li class="">
                    <a href="{{ route('site.branches') }}">BRANCHES</a>
                </li>
                <li class="menu-has-sub">
                    <a href="#">DESINGS</a>
                    <ul>
                        @foreach ($image_categories as $image_category)
                            <li @if ($image_category->hasSubCategories()) class="menu-has-sub has-sub-child" @endif><a
                                    href="@if (!$image_category->hasSubCategories()) {{ $image_category->getUrl() }} @endif"
                                    class="capitlize">{{ $image_category->name }}</a>
                                @if ($image_category->hasSubCategories())
                                    <ul>
                                        @foreach ($image_category->subCategories() as $sub_category)
                                            <li><a href="{{ $sub_category->getUrl() }}" class="capitlize">{{ $sub_category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
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
                        <h5 class="phone-no"><a
                                href="tel:{{ $site_settings['phone_number'] }}">{{ $site_settings['phone_number'] }}</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- Header Area End -->
