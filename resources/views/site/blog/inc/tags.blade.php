<div class="widget sidebar-widget widget-tags">
    <h4 class="mrb-15 single-blog-widget-title">{{ __('blog.tags') }}</h4>
    <ul class="list">
        @foreach($tags as $tag)
            
        <li><a href="{{ route('site.blog.tag', $tag->id) }}">{{ $tag->title }}</a></li>
        @endforeach
        
    </ul>
</div>