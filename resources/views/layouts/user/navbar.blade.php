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
                {{-- <li class="@if (Route::currentRouteName() == 'site.projects' || Route::currentRouteName() == 'site.project.details') current @endif">
                    <a href="{{ route('site.projects') }}">{{ __('custom.site.PROJECTS') }}</a>
                </li> --}}
                <li class="@if (Route::currentRouteName() == 'site.about') current @endif">
                    <a href="{{ route('site.about') }}">{{ __('custom.site.ABOUT') }}</a>
                </li>
                {{-- Contact Start --}}
                <li class="menu-has-sub @if (Route::currentRouteName() == 'site.gallery') current @endif">
                    <a href="#">{{ __('custom.site.CONTACT') }}</a>
                    <ul>
                        <li><a href="{{ route('site.contact') }}" class="capitlize">{{ __('custom.site.CONTACT') }}</a>
                        </li>
                        <li><a href="{{ route('site.branches') }}"
                                class="capitlize">{{ __('custom.site.BRANCHES') }}</a>
                        </li>
                    </ul>
                </li>
                {{-- Contact END --}}

                {{-- desings start --}}
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
                {{-- desings End --}}

                {{-- Start Ramdan --}}
                <li class="@if (Route::currentRouteName() == 'site.ramadan') current @endif">
                    <a href="{{ route('site.ramadan') }}">{{ __('custom.site.RAMADAN') }}</a>
                </li>
                {{-- End  Ramdan --}}
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
                                        @if ($localeCode == 'en')
                                            <i class="fa fa-globe"></i>
                                        @endif
                                        {{ $properties['native'] }}
                                        @if ($localeCode == 'ar')
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
                        <i class="base-icon-011-phone-1"></i> &nbsp;&nbsp;
                        <h5 class="phone-no"><a style="color:#fff !important;" href="tel:0553133348">0553133348</a>
                        </h5>
                    </div>
                    <div class="header-contact-info-text">
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Header Area End -->
