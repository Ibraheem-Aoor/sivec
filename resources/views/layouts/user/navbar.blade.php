<!-- Header Area Start -->
<header class="header-style-01">
    <nav class="main-menu sticky-header">
        <div class="main-menu-wrapper" style="background: #fff !important;">
            <div class="main-menu-logo">
                <a href="{{ route('site.home') }}">
                    <img src="{{ asset('user_assets/images/logo/black_logo.png') }}" width="165" height="72"
                        alt="logo">
                </a>
            </div>
            <ul class="main-nav-menu">
                <li class="@if (Route::currentRouteName() == 'site.home') current @endif">
                    <a href="{{ route('site.home') }}">{{ __('custom.site.HOME') }}</a>
                </li>
                <li class="@if (Route::currentRouteName() == 'site.services' || Route::currentRouteName() == 'site.service.details') current @endif">
                    <a href="{{ route('site.services') }}">{{ __('custom.site.SERVICES') }}</a>
                </li>
                <li class="@if (Route::currentRouteName() == 'site.projects' || Route::currentRouteName() == 'site.project.details') current @endif">
                    <a href="{{ route('site.projects') }}">{{ __('custom.site.PROJECTS') }}</a>
                </li>
                <li class="@if (Route::currentRouteName() == 'site.about') current @endif">
                    <a href="{{ route('site.about') }}">{{ __('custom.site.ABOUT') }}</a>
                </li>
                <li class="@if (Route::currentRouteName() == 'site.contact') current @endif">
                    <a href="{{ route('site.contact') }}">{{ __('custom.site.CONTACT') }}</a>
                </li>
                <li class="@if (Route::currentRouteName() == 'site.branches') current @endif">
                    <a href="{{ route('site.branches') }}">{{ __('custom.site.BRANCHES') }}</a>
                </li>
                <li class="menu-has-sub @if (Route::currentRouteName() == 'site.gallery') current @endif">
                    <a href="#">{{ __('custom.site.DESINGS') }}</a>
                    <ul>
                        @foreach ($image_categories as $image_category)
                            <li @if ($image_category->hasSubCategories()) class="menu-has-sub has-sub-child" @endif><a
                                    href="@if (!$image_category->hasSubCategories()) {{ $image_category->getUrl() }} @endif"
                                    class="capitlize">{{ $image_category->name }}</a>
                                @if ($image_category->hasSubCategories())
                                    <ul>
                                        @foreach ($image_category->subCategories() as $sub_category)
                                            <li><a href="{{ $sub_category->getUrl() }}"
                                                    class="capitlize">{{ $sub_category->name }}</a>
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
                    <ul class="main-nav-menu header-contact-info-text">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if (app()->getLocale() != $localeCode)
                                <li>


                                    <a rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        @if($localeCode == 'en')
                                        <i class="fa fa-globe"></i>
                                        @endif
                                        {{ $properties['native'] }}
                                        @if($localeCode == 'ar')
                                        <i class="fa fa-globe"></i>
                                        @endif
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="header-contact-info">
                    <div class="header-contact-info-icon">
                        <i class="base-icon-011-phone-1"></i>
                    </div>
                    <div class="header-contact-info-text">
                        <p class="call-text">{{ __('custom.site.Call Anytime') }}</p>
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
