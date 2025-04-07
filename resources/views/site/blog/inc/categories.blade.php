<div class="widget sidebar-widget widget-categories">
    <h4 class="mrb-20 single-blog-widget-title">{{ __('blog.categories') }}</h4>
    <ul class="list">
        @foreach($categories as $category)
        <li><i class="fas fa-caret-right vertical-align-middle text-primary-color mrr-10"></i><a href="{{ route('site.blog.category', $category->id)}}">{{ $category->title }}</a><span class="f-right">({{ $category->posts_count }})</span></li>
            
        @endforeach
        
    </ul>
</div>