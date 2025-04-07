<!-- Button trigger modal -->
<button  title="{{ __('blog.delete') }}" type="button" class="btn btn-danger m-1" data-toggle="modal" data-target="#exampleModalDestroy{{ $post->id }}">
  <i class="fas fa-trash"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalDestroy{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('blog.delete_post') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.posts.destroy' , $post->id) }}" method="POST">
          @csrf
          @method('DELETE')
            <div class="modal-body">
                <div class="form-group">
                    {{ __('blog.delete_confirm') }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ __('blog.cancel') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('blog.delete') }}</button>
            </div>
        </form>
      </div>
    </div>
  </div>