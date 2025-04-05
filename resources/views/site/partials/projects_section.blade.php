 <!-- Project Section Start -->
 <section class="bg-secondary-color bg-no-repeat bg-cover bg-pos-cb pdt-105"
     data-background="{{ asset('user_assets/images/bg/abs-bg3.webp') }}" data-overlay-dark="4">
     <div class="section-title mrb-60 mrb-md-15 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
         <div class="container">
             <div class="row align-items-end">
                 <div class="col-xl-8 col-lg-7 col-md-12">
                     <div class="title-box-center">
                         <h5 class="side-line-left text-primary-color mrb-10">{{ __('custom.our_projects') }}</h5>
                         <h2 class="text-white mrb-md-40 mrb-sm-30">
                             {{ __('custom.our_outstanding') }}<br />
                             <span
                                 class="text-primary-color">{{ __('custom.latest_projects') }}</span>{{ __('custom.designs') }}
                         </h2>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-5 col-md-12 text-lg-end d-none">
                     <p class="text-white mrb-0 mrb-md-40">{{ __('custom.our_projects_text') }}</p>
                 </div>
             </div>
         </div>
     </div>
     <div class="section-content">
         <div class="custom-md-container">
             <div class="row">
                 <div class="col-xl-12">
                     <div class="project-item-style1-wrapper">
                         <div class="owl-carousel projects_4col">
                             @foreach ($projects as $project)
                                 <div class="project-item-style1">
                                     <div class="project-item-thumb">
                                         <img class="img-full" src="{{ getImageUrl($project->image) }}"
                                             alt="{{ $project->name }}" />
                                         <div class="project-item-link-icon">
                                             <a href="{{ route('site.project_details', encrypt($project->id)) }}"><i
                                                     class="base-icon-next"></i></a>
                                         </div>
                                         <div class="project-item-details">
                                             <h6 class="project-item-category">{{ $project->getBaseCategory()->name }}
                                             </h6>
                                             <h4 class="project-item-title"><a
                                                     href="{{ route('site.project_details', encrypt($project->id)) }}">{{ $project->getNameOrDirectCategoryName() }}</a>
                                             </h4>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Project Section End -->
