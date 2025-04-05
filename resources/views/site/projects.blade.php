@extends('layouts.user.master')
@section('content')
    @include('site.partials.page-title')

    <!-- Project Section Start -->
    <section class="pdt-110 pdb-80">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    @foreach ($projects as $project)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="project-item-style1 mrb-30">
                                <div class="project-item-thumb">
                                    <img class="img-full" src="{{$project->getHomeImage()}}" alt="">
                                    <div class="project-item-link-icon">
                                        <a href="{{route('site.project.details' , $project->getEncId())}}"><i class="base-icon-next"></i></a>
                                    </div>
                                    <div class="project-item-details">
                                        <h6 class="project-item-category">{{$project->category->name}}</h6>
                                        <h4 class="project-item-title"><a href="{{route('site.project.details' , $project->getEncId())}}">{{$project->name}}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        {{-- <button class="animate-btn-style4" style="background: #F25F29;color:#fff;">Show More</button> --}}
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
