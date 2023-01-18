@extends('layouts.user.master')
@section('content')
    @include('site.partials.page-title')

    <!-- Project Details Section Start -->
    <section class="project-details-page pdt-110 pdb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-thumb">
                        <img class="img-full mrb-45 mrb-sm-0" src="{{ $project->getImage() }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-10 mrt--110 mrt-sm-30">
                    <div class="project-sidebar-widget">
                        <div class="project-sidebar">
                            <ul class="list project-info-list">
                                <li><span class="title"><i class="far fa-clock"></i> Project
                                        Date:</span>{{ $project->achieve_date }}</li>
                                <li><span class="title"><i class="far fa-user"></i> Client:</span> <a
                                        href="#">{{ $project->client->name }}</a></li>
                                <li><span class="title"><i class="far fa-hdd"></i> Categories:</span> <a
                                        href="#">{{ $project->category->name }}</a></li>
                                <li><span class="title"><i class="far fa-money-bill-alt"></i> Budgets:</span> <a
                                        href="#">{{ $project->budget }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mrb-40">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="project-detail-text mrb-md-25">
                        <h3 class="project-details-title mrb-20">Project Basic Info</h3>
                        <div class="project-details-content">
                            <p class="mrb-0">
                                {{ $project->basic_info }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mrt-40">
                <div class="col-xl-12">
                    <h3 class="mrb-30">Related Projects</h3>
                    <div class="row">
                        @foreach ($related_projects as $related_project)
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="project-item-style1 mrb-30">
                                    <div class="project-item-thumb">
                                        <img class="img-full" src="{{$related_project->getHomeImage()}}" alt="">
                                        <div class="project-item-link-icon">
                                            <a href="{{$related_project->getRoute()}}"><i class="base-icon-next"></i></a>
                                        </div>
                                        <div class="project-item-details">
                                            <h6 class="project-item-category">{{$related_project->category->name}}</h6>
                                            <h4 class="project-item-title"><a href="{{$related_project->getRoute()}}">{{$related_project->name}}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Project Section End -->
    <!-- Call to Action Start -->
    @include('site.partials.call_section')
    <!-- Call to Action End -->
@endsection
