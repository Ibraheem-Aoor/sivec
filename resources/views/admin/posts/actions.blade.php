<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <a title="{{ __('blog.show') }}" class="btn btn-info m-1" href="{{ route('admin.posts.show', $post->id) }}">
            <i class="fas fa-eye"></i>
        </a>
        <a title="{{ __('blog.change_status') }}" class="btn @if($post->is_available == 'Active' || $post->is_available == 'مفعل' ) btn-warning @else btn-success @endif m-1" href="{{ route('admin.posts.change_status', $post->id) }}">
            <i class="fas @if($post->is_available == 'Active' || $post->is_available == 'مفعل' ) fa-times @else fa-check  @endif"></i>
        </a>
        <a title="{{ __('blog.edit') }}" class="btn btn-primary m-1" href="{{ route('admin.posts.edit', $post->id) }}">
            <i class="fas fa-edit"></i>
        </a>
        @include('admin.posts._destroy')
    </div>
</div>
