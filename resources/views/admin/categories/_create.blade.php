<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCreate">
    {{ __('blog.create_category') }}
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('blog.create_category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="createCategoryForm" action="{{ route('admin.categories.store') }}" method="POST">
              @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title_ar">{{ __('blog.title_ar') }}</label>
                        <input type="text" class="form-control" id="title_ar" name="title_ar">
                    </div>
                    <div class="form-group">
                        <label for="title_en">{{ __('blog.title_en') }}</label>
                        <input type="text" class="form-control" id="title_en" name="title_en">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('blog.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('blog.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
