<div class="widget sidebar-widget widget-popular-posts">
    <h4 class="mrb-30 single-blog-widget-title">{{ __('blog.popular_posts') }}</h4>
    @foreach($popular_posts as $post)
    <div class="single-post d-flex align-items-center mrb-20">
        <div class="post-content">
            <span class="post-date"><i class="far fa-clock mrr-5"></i>{{ $post->created_at->format('d, M Y') }}</span>
            <h5><a href="{{ route('site.blog.post_details' , $post->id) }}">{{ $post->title }}</a></h5>
        </div>
    </div>
    @endforeach
</div>