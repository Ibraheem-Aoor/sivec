
<div class="widget sidebar-widget widget-search mrb-20 d-flex justify-content-between">
    <form id="myForm" action="{{ route('site.blog.search') }}" method="get">
        <input name="key" class="search-field" placeholder="{{ __('blog.search_here') }}">
    </form>
    <a class="border rounded-circle px-3 py-2" href="#" onclick="document.getElementById('myForm').submit(); return false;" ><i class="base-icon-search-1"></i></a>
</div>



