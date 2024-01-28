<!-- Header Area Start -->
<header class="header-style-01">
    <nav class="main-menu sticky-header">
        <div class="main-menu-wrapper" style="background: #fff !important;">
            <div class="main-menu-logo">
                <a href="{{ route('site.home') }}">
                    <img src="{{ asset('user_assets/images/logo/black_logo.webp?v=1.0') }}" width="165" height="72"
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
                    <a href="{{ route('site.projects') }}">{{ __('custom.site.PROJECTS') }}</a>y
                </li> --}}
                <li class="@if (Route::currentRouteName() == 'site.about') current @endif">
                    <a href="{{ route('site.about') }}">{{ __('custom.site.ABOUT') }}</a>
                </li>
                {{-- Contact Start --}}
                <li class="menu-has-sub @if (Route::currentRouteName() == 'site.contact') current @endif">
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
                        @foreach ($image_categories->take(5) as $image_category)
                            @php
                                $has_sub_category = $image_category->hasSubCategories();
                            @endphp
                            <li @if ($has_sub_category) class="menu-has-sub has-sub-child" @endif><a
                                    href="@if (!$has_sub_category) {{ $image_category->getUrl() }} @endif"
                                    class="capitlize">{{ $image_category->name }}</a>
                                @if ($has_sub_category)
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
                {{-- Interior  start --}}
                @foreach ($project_parent_categories as $category)
                    <li class="menu-has-sub has-sub-child">
                        <a href="#">{{ $category->name }}</a>
                        <ul>
                            @foreach ($category->subCategories as $sub_category)
                                <li @if ($sub_category->hasSubCategories()) class="menu-has-sub has-sub-child" @endif><a
                                        href="{{ $sub_category->getUrl() }}"
                                        class="capitlize">{{ $sub_category->name }}</a>
                                    @if ($sub_category->hasSubCategories())
                                        <ul>
                                            @foreach ($sub_category->subCategories as $child_category)
                                                <li><a href="{{ $child_category->getUrl() }}"
                                                        class="capitlize">{{ $child_category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                {{-- Interior End --}}

                {{-- Start Catalog --}}
                <li class="">
                    <a data-bs-toggle="modal" data-bs-target="#catalogModal">{{ __('custom.site.catalog') }}</a>
                </li>
                {{-- End  Catalog --}}

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
                                        href="{{ route('change_language', $localeCode) }}">
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
