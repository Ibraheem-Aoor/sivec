	@extends('layouts.user.master')
    @section('title' , 'Contact Us')
    @push('css')
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/toastr/toastr.min.css') }}">
    @endpush
    @section('content')
    <!-- Page Title Start -->
    @include('site.partials.page-title')
	<!-- Page Title End -->
	<!-- Contact Section Start -->
	<section class="contact-section pdt-110 pdb-110" data-background="images/bg/abs-bg7.png" data-overlay-light="2">
		<div class="container">
			<div class="row mrb-80">
				<div class="col-md-12 col-lg-12 col-xl-4">
					<h5 class="side-line-left text-primary-color mrt-0 mrb-5">{{__('custom.site.get_in_touch')}}</h5>
					<h2 class="faq-title mrb-30">{{__('custom.site.have_question')}}</h2>
					<ul class="social-list list-lg list-primary-color list-flat mrb-lg-60 clearfix">
						<li><a href="{{ $site_settings['facebook'] }}"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{ $site_settings['twitter'] }}"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{ $site_settings['instagram'] }}"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="{{ $site_settings['linked_in'] }}"><i class="fab fa-linkedin"></i></a></li>
					</ul>
				</div>
				<div class="col-md-12 col-lg-12 col-xl-8">
					<div class="row">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6 col-xs-6">
					<div class="contact-form">
						<form name="contact-form" action="{{route('site.contact.submit')}}" method="POST">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mrb-25">
										<input required type="text" name="name" placeholder="name" class="form-control">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mrb-25">
										<input required type="text" name="phone" placeholder="phone" class="form-control">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group mrb-25">
										<input required type="email" name="email" placeholder="email" class="form-control">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group mrb-25">
										<textarea rows="5" name="message" placeholder="message"  class="form-control"></textarea>
									</div>
								</div>
								<div class="col-lg-8">
									<div class="form-group">
										<button type="submit" class="animate-btn-style3 btn-md mrb-lg-60">Submit Now</button>
										<button type="reset" hidden class="animate-btn-style3 btn-md mrb-lg-60"></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-xl-6 col-xs-6 mb-3">
					<!-- Google Map Start -->
					<div class="mapouter fixed-height">
						<div class="gmap_canvas">
							<iframe id="gmap_canvas" src="{{@$page_settings['google_map_url']}}"></iframe>
						</div>
					</div>
					<!-- Google Map End -->
				</div>
                @foreach($branches as $branch)
				<div class="col-lg-6 col-xl-6 mt-5">
                    <div class="contact-block d-flex mrb-30">
                        <div class="contact-icon">
                            <i class="base-icon-map"></i>
                        </div>
                        <div class="contact-details mrl-30">
                            <h5 class="icon-box-title mrb-10">{{@$branch['title']}}</h5>
                        </div>
                    </div>
                    <div class="gmap_canvas">
                        <iframe id="gmap_canvas" src="{{@$branch['value']}}" style="width: 100% !important;"></iframe>
                    </div>
                </div>
                @endforeach
			</div>
		</div>
	</section>
	<!-- Contact Section End -->
@endsection

@push('js')
    <script src="{{ asset('admin_assets/plugins/toastr/toastr.min.js') }}"></script>
@endpush
