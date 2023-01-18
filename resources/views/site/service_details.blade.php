@extends('layouts.user.master')
@section('tiite', 'SEVIC - Inerior Design Services')
@section('content')
    <!-- Service Details Section Start -->
    <section class="service-details-page pdt-110 pdb-110 pdb-lg-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="service-detail-text">
                        <div class="blog-standared-img slider-blog mrb-40">
                            <img class="img-full" src="{{ $service->getImage() }}" alt="">
                        </div>
                        <h3 class="mrb-15">Service Details</h3>
                        <p class="about-text-block mrb-40">{{ $service->details }}</p>

                        {{-- <div class="service-details-content">
                            <div class="row mrb-30">
                                <div class="col-lg-12">
                                    <h3 class="mrb-30">Frequently Asked Question</h3>
                                </div>
                                <div class="col-lg-12">
                                    <div class="faq-block">
                                        <div class="accordion">
                                            <div class="accordion-item">
                                                <div class="accordion-header active">
                                                    <h5 class="title">Q: What happens during Freshers' Week?</h5>
                                                    <span class="fas fa-arrow-right"></span>
                                                </div>
                                                <div class="accordion-body">
                                                    <p>A: Leverage agile frameworks to provide a robust synopsis for high
                                                        level overviews. Iterative approaches to corporate strategy foster
                                                        collaborative thinking to further the overall value proposition.
                                                        Organically grow the holistic world view of disruptive innovation
                                                        via workplace diversity and empowerment.</p>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <div class="accordion-header">
                                                    <h5 class="title">Q: What is the transfer application process?</h5>
                                                    <span class="fas fa-arrow-right"></span>
                                                </div>
                                                <div class="accordion-body">
                                                    <p>A: Leverage agile frameworks to provide a robust synopsis for high
                                                        level overviews. Iterative approaches to corporate strategy foster
                                                        collaborative thinking to further the overall value proposition.
                                                        Organically grow the holistic world view of disruptive innovation
                                                        via workplace diversity and empowerment.</p>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <div class="accordion-header">
                                                    <h5 class="title">Q: Why should I attend community college?</h5>
                                                    <span class="fas fa-arrow-right"></span>
                                                </div>
                                                <div class="accordion-body">
                                                    <p>A: Leverage agile frameworks to provide a robust synopsis for high
                                                        level overviews. Iterative approaches to corporate strategy foster
                                                        collaborative thinking to further the overall value proposition.
                                                        Organically grow the holistic world view of disruptive innovation
                                                        via workplace diversity and empowerment.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex">
                                <div class="col-lg-12 col-xl-6 pdl-40 pdl-lg-15">
                                    <h3 class="mrb-20">Service Included</h3>
                                    <ul class="order-list primary-color mrb-lg-40">
                                        <li>revolutionary catalysts for chang</li>
                                        <li>catalysts for chang the Seamlessly</li>
                                        <li>business applications through</li>
                                        <li>procedures whereas processes</li>
                                    </ul>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <img class="img-full mrb-lg-35" src="https://via.placeholder.com/420x240"
                                        alt="">
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 sidebar-right">
                    <div class="service-nav-menu mrb-30">
                        <div class="service-link-list">
                            <ul>
                                @foreach ($related_services as $related_service)
                                    <li class="active"><a href="{{ $related_service->getRoute() }}"><i
                                                class="fa fa-chevron-right"></i>{{ $related_service->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget-need-help">
                        <div class="need-help-icon">
                            <span class="webexflaticon base-icon-phone-call"></span>
                        </div>
                        <h4 class="need-help-title">Get Easy Interior Solution <br> From Us</h4>
                        <div class="need-help-contact">
                            <p class="mrb-5">Please Contact With Us</p>
                            <a href="tel:00214255415">00 214 255415</a>
                        </div>
                    </div>
                    @if ($service->pdf)
                        <div class="sidebar-widget">
                            <div class="brochure-download">
                                <h4 class="mrb-40 widget-title">Brochure Download</h4>
                                <p>Please click download button for getting brochure file</p>
                                <a href="{{ route('site.service.pdf' , $service->getEncId())}}" class="cs-btn-one"><span
                                        class="far fa-file-pdf mrr-10"></span> Download
                                    PDF</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Service Details Section End -->
@endsection
