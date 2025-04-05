@extends('layouts.user.master')
@section('content')
    {{-- @include('site.partials.page-title') --}}
    <section class="service-section-style2 bg-no-repeat bg-cover bg-pos-cb pdt-105 pdb-110 pdb-lg-105 mt-5"
        data-background="images/bg/abs-bg8.png">
        <div class="section-title text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="title-box-center">
                            @isset($category->parentCategory)
                                <h5 class="sub-title-line-bottom text-primary-color mrb-10">
                                    {{ $category->parentCategory?->name }}</h5>
                            @endisset
                            <h2 class="title">{{ $category->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="container">
                <div class="row justify-content-center">
                    @if (!$category->projects?->isEmpty())
                        @foreach ($category->projects as $project)
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="service-style2">
                                    <div class="service-item-thumb">
                                        <img class="img-full" src="{{ getImageUrl($project->image) }}"
                                            alt="{{ $project->name }}" />
                                        {{-- <div class="service-item-icon">
                                            <i class="webextheme-icon-measure"></i>
                                        </div> --}}
                                        <div class="service-item-content">
                                            <h6 class="service-categories">{{ $project->category->name }}</h6>
                                            <h4 class="service-title"><a
                                                    href="{{ $project->getUrl() }}">{{ $project->name }}</a>
                                            </h4>
                                            {{-- <div class="service-item-inner-icon">
                                                <i class="webextheme-icon-measure"></i>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach ($category->subCategories as $sub_category)
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="service-style2">
                                    <div class="service-item-thumb">
                                        <img class="img-full" src="{{ getImageUrl($sub_category->image) }}"
                                            alt="{{ $sub_category->name }}" />
                                        {{-- <div class="service-item-icon">
                                            <i class="webextheme-icon-measure"></i>
                                        </div> --}}
                                        <div class="service-item-content">
                                            @isset($sub_category->parentCategory)
                                                <h6 class="service-categories">{{ $sub_category->parentCategory->name }}</h6>
                                            @endisset
                                            <h4 class="service-title"><a
                                                    href="{{ $sub_category->getUrl() }}">{{ $sub_category->name }}</a>
                                            </h4>
                                            {{-- <div class="service-item-inner-icon">
                                                <i class="webextheme-icon-measure"></i>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        @include('site.partials.call_section')
    </section>
@endsection
