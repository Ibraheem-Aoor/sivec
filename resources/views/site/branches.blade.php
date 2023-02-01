@extends('layouts.user.master')
@section('content')
    @include('site.partials.page-title')
    <!-- About Section Start -->
    <section class="about-section pdt-110 pdb-105 bg-no-repeat bg-cover bg-pos-cb" data-background="images/bg/abs-bg3.png"
        data-overlay-light="4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-10 col-xl-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <h5 class="side-line-left subtitle text-primary-color">Our Company Branches</h5>
                    <h2 class="mrb-45 mrb-lg-35">We Have Multiple <span class="text-primary-color">Branches</span> In United
                        Arab Emirates</h2>
                    <p class="about-text-block" style="padding: 0 !important;"></p>
                </div>
            </div>
            @foreach ($addresses as $address)
                <div class="row">
                    <div class="clol-xl-6 mb-5">
                        <div class="contact-block d-flex mrb-35">
                            <div class="contact-icon">
                                <i class="base-icon-map"></i>
                            </div>
                            <div class="contact-details mrl-30">
                                <h5 class="icon-box-title mrb-10">{{ @$address['title'] }}</h5>
                            </div>
                        </div>
                        <div class="mapouter fixed-height">
                            <div class="gmap_canvas">
                                <iframe id="gmap_canvas" src="{{ @$address['value']  }}"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </section>
    <!-- About Section End -->
@endsection
