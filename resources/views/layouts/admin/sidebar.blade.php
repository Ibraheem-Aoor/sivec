  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('admin.dashboard') }}" class="brand-link" style="background">
          <img src="{{ asset('user_assets/images/logo/white_logo.webp?v=1.0') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">SEVIC</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Admin</a>
              </div>
          </div> --}}

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <li class="nav-item">
                      <a href="{{ route('admin.dashboard') }}"
                          class="nav-link {{ areActiveRoutes(['admin.dashboard']) }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              {{ __('custom.dashboard.dashboard') }}
                              {{-- <i class="right fas fa-angle-left"></i> --}}
                          </p>
                      </a>
                  </li>

                  {{-- Start services --}}
                  <li
                      class="nav-item has-treeview {{ areActiveRoutes(['admin.service.index', 'admin.service-category.index'], 'menu-open') }}">
                      <a href="#"
                          class="nav-link {{ areActiveRoutes(['admin.service.index', 'admin.service-category.index']) }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              {{ __('custom.dashboard.services') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.service-category.index') }}"
                                  class="nav-link  {{ areActiveRoutes(['admin.service-category.index']) }}">
                                  <i class="nav-icon fas fa-th"></i>

                                  <p>{{ __('custom.dashboard.service_category') }}</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.service.index') }}"
                                  class="nav-link {{ areActiveRoutes(['admin.service.index']) }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('custom.dashboard.services') }}</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- End services --}}

                  <li
                      class="nav-item has-treeview {{ areActiveRoutes(['admin.project.index', 'admin.project-category.index', 'admin.project-style-type.index'], 'menu-open') }}">
                      <a href="#"
                          class="nav-link {{ areActiveRoutes(['admin.project.index', 'admin.project-category.index', 'admin.project-style-type.index']) }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              {{ __('custom.dashboard.projects') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.project-category.index') }}"
                                  class="nav-link {{ areActiveRoutes(['admin.project-category.index']) }}">
                                  <i class="nav-icon fas fa-th"></i>

                                  <p>{{ __('custom.dashboard.project_category') }}</p>
                              </a>
                          </li>
                          <li class="nav-item @if (Route::currentRouteName() == 'admin.project-style-type.index' && @$model == 'ProjectType') active @endif">
                              <a href="{{ route('admin.project-style-type.index', ['model' => 'ProjectType']) }}"
                                  class="nav-link {{ areActiveRoutes(['admin.project-style-type.index']) }}">
                                  <i class="nav-icon fas fa-th"></i>
                                  <p>{{ __('custom.projects.projects_types') }}</p>
                              </a>
                          </li>
                          <li class="nav-item @if (Route::currentRouteName() == 'admin.project-style-type.index' && @$model == 'ProjectStyle') active @endif">
                              <a href="{{ route('admin.project-style-type.index', ['model' => 'ProjectStyle']) }}"
                                  class="nav-link {{ areActiveRoutes(['admin.project-style-type.index']) }}">
                                  <i class="nav-icon fas fa-th"></i>
                                  <p>{{ __('custom.projects.projects_styles') }}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.project.index') }}"
                                  class="nav-link {{ areActiveRoutes(['admin.project.index']) }}">
                                  <i class="nav-icon fas fa-cubes"></i>
                                  <p>
                                      {{ __('custom.dashboard.projects') }}
                                      <span class="right badge badge-danger">New</span>
                                  </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('admin.team-members.index') }}"
                          class="nav-link {{ areActiveRoutes(['admin.team-members.index']) }} ">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              {{ __('custom.dashboard.team_members') }}
                              <span class="right badge badge-danger">New</span>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.client.index') }}"
                          class="nav-link {{ areActiveRoutes(['admin.client.index']) }}">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              {{ __('custom.dashboard.clients') }}
                              <span class="right badge badge-danger">New</span>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.contact.index') }}"
                          class="nav-link {{ areActiveRoutes(['admin.contact.index']) }} ">
                          <i class="nav-icon fas fa-envelope"></i>
                          <p>
                              {{ __('custom.dashboard.contacts') }}
                              <span class="right badge badge-danger">New</span>
                          </p>
                      </a>
                  </li>


                  {{-- Start pages --}}
                  <li
                      class="nav-item has-treeview {{ areActiveRoutes(['admin.page.about', 'admin.page.branches'], 'menu-open') }}">
                      <a href="#"
                          class="nav-link
                        {{ areActiveRoutes(['admin.page.about', 'admin.page.branches']) }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              {{ __('custom.dashboard.pages') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.page.about') }}"
                                  class="nav-link  {{ areActiveRoutes(['admin.page.about']) }}">
                                  <i class="nav-icon fas fa-file"></i>

                                  <p>{{ __('custom.dashboard.about') }}</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.page.branches') }}"
                                  class="nav-link {{ areActiveRoutes(['admin.page.branches']) }}">
                                  <i class="far fa-file nav-icon"></i>
                                  <p>{{ __('custom.dashboard.branches') }}</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- End pages --}}

                  {{-- Start Blog --}}
                  <li class="nav-item has-treeview ">
                      <a href="#" class="nav-link
                        ">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              {{ __('blog.blog') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.categories.index') }}" class="nav-link">
                                  <i class="nav-icon fas fa-file"></i>

                                  <p>{{ __('custom.dashboard.categories') }}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.tags.index') }}" class="nav-link">
                                  <i class="nav-icon fas fa-file"></i>

                                  <p>{{ __('custom.dashboard.tags') }}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.posts.index') }}" class="nav-link">
                                  <i class="nav-icon fas fa-file"></i>

                                  <p>{{ __('custom.dashboard.posts') }}</p>
                              </a>
                          </li>
                          {{-- <li class="nav-item ">
                              <a href="{{ route('admin.page.branches') }}"
                                  class="nav-link {{ areActiveRoutes(['admin.page.branches']) }}">
                                  <i class="far fa-file nav-icon"></i>
                                  <p>{{ __('custom.dashboard.branches') }}</p>
                              </a>
                          </li> --}}
                      </ul>
                  </li>
                  {{-- End Blog --}}

                  {{-- Start pages --}}
                  <li class="nav-item has-treeview {{ areActiveRoutes(['admin.settings.general'], 'menu-open') }}">
                      <a href="#" class="nav-link {{ areActiveRoutes(['admin.settings.general']) }}">
                          <i class="nav-icon fas fa-cogs"></i>
                          <p>
                              {{ __('custom.dashboard.settings') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.settings.general') }}"
                                  class="nav-link  {{ areActiveRoutes(['admin.settings.general']) }}">
                                  🏛️
                                  <p>{{ __('custom.dashboard.general') }}</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- End pages --}}

                  {{-- Start services --}}
                  {{-- <li class="nav-item has-treeview menu-open">
                      <a href="#" class="nav-link @if (Route::currentRouteName() == 'admin.job-title.index' || Route::currentRouteName() == 'admin.job-title.create' || Route::currentRouteName() == 'admin.job-position.create' || Route::currentRouteName() == 'admin.service-category.destroy') active @endif">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              {{ __('custom.dashboard.jobs') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.job-position.index') }}"
                                  class="nav-link  @if (Route::currentRouteName() == 'admin.job-position.index') active @endif">
                                  <i class="nav-icon fas fa-th"></i>

                                  <p>{{ __('custom.dashboard.jobs') }}</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.job_application.index') }}"
                                  class="nav-link @if (Route::currentRouteName() == 'admin.job-title.index' || Route::currentRouteName() == 'admin.job-titlereate' || Route::currentRouteName() == 'admin.service.custom_update' || Route::currentRouteName() == 'admin.service.destroy') active @endif">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('custom.dashboard.job_titles') }}</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.job_application.index') }}"
                                  class="nav-link @if (Route::currentRouteName() == 'admin.job-applications') active @endif">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('custom.dashboard.applications') }}</p>
                              </a>
                          </li>
                      </ul>
                  </li> --}}
                  {{-- End services --}}
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
