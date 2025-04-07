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
                         <div id="posts" class="row ">
                             @foreach ($items as $post)
                                 <div class="col-lg-12 col-xl-6">
                                     <div class="news-wrapper mrb-30">
                                         <div class="news-thumb">
                                             <img src="{{ asset('uploads/blog/' . $post->image->path) }}" class="img-full"
                                                 alt="blog">
                                             <div class="news-top-meta">
                                                 <a href="{{ route('site.blog.category', $post->category->id) }}" class="entry-category">{{ $post->category->title }}</a>
                                             </div>
                                         </div>
                                         <div class="news-description">
                                             <h4 class="the-title"><a
                                                     href="{{ route('site.blog.post_details', $post->id) }}">{{ Str::limit($post->title, 20) }}</a>
                                             </h4>
                                             {!! Str::limit($post->description, 50) !!}
                                             @if (strlen($post->description) > 50)
                                                 ... <a class="text-dark"
                                                     href="{{ route('site.blog.post_details', $post->id) }}">Read more</a>
                                             @endif


                                             <div class="news-bottom-part">

                                                 <div class="post-link">
                                                     <span class="entry-date"><i
                                                             class="far fa-calendar-alt mrr-10 text-primary-color"></i>{{ $post->created_at->format('d, M Y') }}</span>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach
                         </div>
                         <div class="row">
                             @include('site.blog.pagiantion')

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

