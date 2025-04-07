 @extends('layouts.user.master')
 @section('tiite', 'SIVEC- Inerior Design Services')
 @section('content')
     @include('site.partials.page-title')
     <!-- News Section Start -->
     <section class="bg-pos-ct pdt-105">
         <div class="section-content mrb-80">
             <div class="container">
                 <div class="row justify-content-center">
                     @forelse($items as $post)
                         <div class="col-md-6 col-lg-6 col-xl-4">
                             <div class="news-wrapper mrb-30">
                                 <div class="news-thumb">
                                     <img src="{{ asset('uploads/blog/' . $post->image->path) }}" class="img-full"
                                         alt="blog">
                                     <div class="news-top-meta">
                                         <span class="entry-category">{{ $post->category->title }}</span>
                                     </div>
                                 </div>
                                 <div class="news-description">
                                     <h4 class="the-title"><a
                                             href="{{ route('site.blog.post_details', $post->id) }}">{{ $post->title }}</a>
                                     </h4>
                                     {!! Str::limit($post->description, 50) !!}
                                     @if (strlen($post->description) > 50)
                                         ... <a class="text-dark"
                                             href="{{ route('site.blog.post_details', $post->id) }}">Read more</a>
                                     @endif
                                     <div class="news-bottom-part">
                                         <div class="post-author">

                                         </div>
                                         <div class="post-link">
                                             <span class="entry-date"><i
                                                     class="far fa-calendar-alt mrr-10 text-primary-color"></i>{{ $post->created_at->format('d, M Y') }}</span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     @empty
                         <div class="col-md-6 col-lg-6 col-xl-4 text-center">
                             <div class=" mrb-30">
                                 <div class="news-description">
                                     <h4 class="the-title">{{ __('blog.no_posts') }}</h4>
                                     <p>{{ __('blog.sorry_no_posts') }}</p>
                                     <a href="{{ route('site.blog') }}" class="btn">{{ __('blog.back_to_blog') }}</a>
                                     </a>
                                 </div>
                             </div>
                         </div>
                 </div>
             </div>
             @endforelse
         </div>
         <div class="row ">
             @include('site.blog.pagiantion')
         </div>
         </div>
         </div>
         @include('site.partials.call_section')
     </section>
     <!-- News Section End -->
 @endsection
