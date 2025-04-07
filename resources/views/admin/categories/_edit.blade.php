<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalEdit{{ $category->id }}">
    {{ __('edit') }}
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalEdit{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('blog.edit_category') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.categories.update' , $category->id) }}" method="POST">
          @csrf
          @method('put')
            <div class="modal-body">
                <div class="form-group">
                    <label for="title_ar">{{ __('blog.title_ar') }}</label>
                    <input value="{{ $category->translate('ar')->title }}" type="text" class="form-control" id="title_ar" name="title_ar">
                </div>
                <div class="form-group">
                    <label for="title_en">{{ __('blog.title_en') }}</label>
                    <input value="{{ $category->translate('en')->title }}" type="text" class="form-control" id="title_en" name="title_en">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ __('blog.cancel') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('blog.edit') }}</button>
            </div>
        </form>
      </div>
    </div>
  </div>