<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalDestroy{{ $category->id }}">
  {{ __('delete') }}
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalDestroy{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('blog.delete_category') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="destroyForm{{ $category->id }}" action="{{ route('admin.categories.destroy' , $category->id) }}" method="POST">
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
                <button type="submit" class="btn btn-danger">{{ __('blog.delete') }}</button>
            </div>
        </form>
      </div>
    </div>
  </div>