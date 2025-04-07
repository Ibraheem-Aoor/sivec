	
    @extends('layouts.user.master')
    @section('tiite', 'SIVEC- Inerior Design Services')
    @section('content')
        @include('site.partials.page-title')
    <!-- News Section Start -->
	<section class="bg-pos-ct pdt-105">
			<!-- Service Details Section Start -->
	<div class="service-details-page pdt-110 pdb-70">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-5 sidebar-right">
					<aside class="news-sidebar-widget">
                        @include('site.blog.inc.search')
						@include('site.blog.inc.categories')
						@include('site.blog.inc.popular')
						@include('site.blog.inc.tags')
					</aside>
				</div>

                        <div class="col-xl-8 col-lg-7">
                            <div class="single-news-details news-wrapper mrb-20">
                                <div class="single-news-content">
                                    <div class="news-thumb">
                                        <img src="{{ asset('uploads/blog/'.$post->image->path) }}" alt="blog">
                                        <div class="news-top-meta">
                                            <span class="entry-category">{{ $post->category->title }}</span>
                                        </div>
                                    </div>
                                    <div class="news-description mrb-35">
                                        <h4 class="the-title">{{ $post->title }}</h4>
                                        <div class="news-bottom-part">
                                            <div class="post-author">
                                                
                                            </div>
                                            <div class="post-link">
                                                <span class="entry-date"><i class="far fa-calendar-alt mrr-10 text-primary-color"></i>{{ $post->created_at->format('d, M Y')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-content">
                                        {!! $post->description !!}
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

			</div>
		</div>
	</div>
	<!-- About Section End -->
		@include('site.partials.call_section')
	</section>
	<!-- News Section End -->
    @endsection
    
    