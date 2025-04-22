<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard') }}" class="brand-link" style="background">
            <img width="50px" src="{{ asset('user_assets/images/logo/white_logo.webp?v=1.0') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light text-bold ">SEVIC</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item @if (Route::currentRouteName() == 'admin.dashboard') active @endif">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="tf-icons ti ti-dashboard pe-2"></i>
                <div>{{ __('custom.dashboard.dashboard') }}</div>
            </a>
        </li>


        <!-- Services -->
        <li class="menu-item @if (Route::currentRouteName() == 'admin.service-category.index' || Route::currentRouteName() == 'admin.service.index') active open @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="tf-icons ti ti-server pe-2"></i>
                <div data-i18n="{{ __('custom.dashboard.services') }}">{{ __('custom.dashboard.services') }}
                </div>
                {{-- <div class="badge bg-danger rounded-pill ms-auto">5</div> --}}
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if (Route::currentRouteName() == 'admin.service-category.index') active @endif">
                    <a href="{{ route('admin.service-category.index') }}" class="menu-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <div data-i18n="{{ __('custom.dashboard.service_category') }}">

                            {{ __('custom.dashboard.service_category') }}
                        </div>
                    </a>
                </li>
                <li class="menu-item @if (Route::currentRouteName() == 'admin.service.index') active @endif">
                    <a href="{{ route('admin.service.index') }}" class="menu-link">
                        <div data-i18n="{{ __('custom.dashboard.services') }}">{{ __('custom.dashboard.services') }}
                        </div>
                    </a>
                </li>
            </ul>
        </li>


        <!-- projects -->
        <li class="menu-item @if (Route::currentRouteName() == 'admin.project.index' || Route::currentRouteName() == 'admin.project-category.index' || Route::currentRouteName() == 'admin.project-style-type.index') active open @endif">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="tf-icons ti ti-building pe-2"></i>
              <div data-i18n="{{ __('custom.dashboard.projects') }}">{{ __('custom.dashboard.projects') }}
              </div>
              {{-- <div class="badge bg-danger rounded-pill ms-auto">5</div> --}}
          </a>
          <ul class="menu-sub">
              <li class="menu-item @if (Route::currentRouteName() == 'admin.project-category.index') active @endif">
                  <a href="{{ route('admin.project-category.index') }}" class="menu-link">
                      {{-- <i class="nav-icon fas fa-th"></i> --}}
                      <div data-i18n="{{ __('custom.dashboard.project_category') }}">

                          {{ __('custom.dashboard.project_category') }}
                      </div>
                  </a>
              </li>
              <li class="menu-item @if (Route::currentRouteName() == 'admin.project-style-type.index') active @endif">
                  <a href="{{ route('admin.project-style-type.index', ['model' => 'ProjectType']) }}" class="menu-link">
                      <div data-i18n="{{ __('custom.projects.projects_types') }}">{{ __('custom.projects.projects_types') }}
                      </div>
                  </a>
              </li>
          </ul>
      </li>

        {{-- team members --}}
        <li class="menu-item @if (Route::currentRouteName() == 'admin.team-members.index') active @endif">
            <a href="{{ route('admin.team-members.index') }}" class="menu-link">
                <i class="tf-icons ti ti-friends pe-2"></i>
                <div>{{ __('custom.dashboard.team_members') }}</div>
            </a>
        </li>

        {{-- clients --}}
        <li class="menu-item @if (Route::currentRouteName() == 'admin.client.index') active @endif">
            <a href="{{ route('admin.client.index') }}" class="menu-link">
                <i class="tf-icons ti ti-users pe-2"></i>
                <div>{{ __('custom.dashboard.clients') }}</div>
            </a>
        </li>


        {{-- contacts --}}
        <li class="menu-item @if (Route::currentRouteName() == 'admin.contact.index') active @endif">
            <a href="{{ route('admin.contact.index') }}" class="menu-link">
                <i class="tf-icons ti ti-message pe-2"></i>
                <div>{{ __('custom.dashboard.contacts') }}</div>
            </a>
        </li>


        <!-- pages -->
        <li class="menu-item @if (Route::currentRouteName() == 'admin.page.about' || Route::currentRouteName() == 'admin.page.branches') active open @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="tf-icons ti ti-file pe-2"></i>
                <div data-i18n="{{ __('custom.dashboard.pages') }}">{{ __('custom.dashboard.pages') }}
                </div>
                {{-- <div class="badge bg-danger rounded-pill ms-auto">5</div> --}}
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if (Route::currentRouteName() == 'admin.page.about') active @endif">
                    <a href="{{ route('admin.page.about') }}" class="menu-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <div data-i18n="{{ __('custom.dashboard.about') }}">

                            {{ __('custom.dashboard.about') }}
                        </div>
                    </a>
                </li>
                <li class="menu-item @if (Route::currentRouteName() == 'admin.page.branches') active @endif">
                    <a href="{{ route('admin.page.branches') }}" class="menu-link">
                        <div data-i18n="{{ __('custom.dashboard.branches') }}">{{ __('custom.dashboard.branches') }}
                        </div>
                    </a>
                </li>

            </ul>
        </li>


        <!-- blog -->
        <li class="menu-item @if (Route::is('admin.categories.*') || Route::is('admin.tags.*') || Route::is('admin.posts.*')) active open @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="tf-icons ti ti-news pe-2"></i>
                <div data-i18n="{{ __('blog.blog') }}">{{ __('blog.blog') }}
                </div>
                {{-- <div class="badge bg-danger rounded-pill ms-auto">5</div> --}}
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if (Route::is('admin.categories.*')) active @endif">
                    <a href="{{ route('admin.categories.index') }}" class="menu-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <div data-i18n="{{ __('custom.dashboard.categories') }}">

                            {{ __('custom.dashboard.categories') }}
                        </div>
                    </a>
                </li>
                <li class="menu-item @if (Route::is('admin.tags.*')) active @endif">
                    <a href="{{ route('admin.tags.index') }}" class="menu-link">
                        <div data-i18n="{{ __('custom.dashboard.tags') }}">{{ __('custom.dashboard.tags') }}</div>
                    </a>
                </li>

                <li class="menu-item @if (Route::is('admin.posts.*')) active @endif">
                    <a href="{{ route('admin.posts.index') }}" class="menu-link">
                        <div data-i18n="{{ __('custom.dashboard.posts') }}">{{ __('custom.dashboard.posts') }}</div>
                    </a>
                </li>

            </ul>
        </li>

        <!-- settings -->
        <li class="menu-item @if (Route::is('admin.settings.*')) active open @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-tool"></i>
                <div data-i18n="{{ __('custom.dashboard.settings') }}">{{ __('custom.dashboard.settings') }}
                </div>
                {{-- <div class="badge bg-danger rounded-pill ms-auto">5</div> --}}
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if (Route::is('admin.settings.*')) active @endif">
                    <a href="{{ route('admin.settings.general') }}" class="menu-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <div data-i18n="{{ __('custom.dashboard.general') }}">

                            {{ __('custom.dashboard.general') }}
                        </div>
                    </a>
                </li>


            </ul>
        </li>



        <!-- jobs -->
        <li class="menu-item @if (Route::is('admin.job-position.*') || Route::is('admin.job-title.*') || Route::is('admin.job_application.*')) active open @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="tf-icons ti ti-clipboard-list pe-2"></i>
                <div data-i18n="{{ __('custom.dashboard.jobs') }}">{{ __('custom.dashboard.jobs') }}
                </div>
                {{-- <div class="badge bg-danger rounded-pill ms-auto">5</div> --}}
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if (Route::is('admin.job-position.*')) active @endif">
                    <a href="{{ route('admin.job-position.index') }}" class="menu-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <div data-i18n="{{ __('custom.dashboard.jobs') }}">

                            {{ __('custom.dashboard.jobs') }}
                        </div>
                    </a>
                </li>
                <li class="menu-item @if (Route::is('admin.job-title.*')) active @endif">
                    <a href="{{ route('admin.job-title.index') }}" class="menu-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <div data-i18n="{{ __('custom.dashboard.job_titles') }}">

                            {{ __('custom.dashboard.job_titles') }}
                        </div>
                    </a>
                </li>
                <li class="menu-item @if (Route::is('admin.job_application.*')) active @endif">
                    <a href="{{ route('admin.job_application.index') }}" class="menu-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <div data-i18n="{{ __('custom.dashboard.applications') }}">

                            {{ __('custom.dashboard.applications') }}
                        </div>
                    </a>
                </li>


            </ul>
        </li>












        <!-- Layouts -->
        {{-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
          <div data-i18n="Layouts">Layouts</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="layouts-collapsed-menu.html" class="menu-link">
              <div data-i18n="Collapsed menu">Collapsed menu</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-content-navbar.html" class="menu-link">
              <div data-i18n="Content navbar">Content navbar</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
              <div data-i18n="Content nav + Sidebar">Content nav + Sidebar</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="../horizontal-menu-template" class="menu-link" target="_blank">
              <div data-i18n="Horizontal">Horizontal</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-without-menu.html" class="menu-link">
              <div data-i18n="Without menu">Without menu</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-without-navbar.html" class="menu-link">
              <div data-i18n="Without navbar">Without navbar</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-fluid.html" class="menu-link">
              <div data-i18n="Fluid">Fluid</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-container.html" class="menu-link">
              <div data-i18n="Container">Container</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="layouts-blank.html" class="menu-link">
              <div data-i18n="Blank">Blank</div>
            </a>
          </li>
        </ul>
      </li>          --}}
    </ul>
</aside>
