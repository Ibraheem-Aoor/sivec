@extends('layouts.admin.master')
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.partials.page_header', ['page_title_1' => __('custom.dashboard.posts')])
        <!-- Main content -->
        <section class="content" enc>
            <div class="card p-2">
                <section id="posts-section" class="posts-section">
                    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        <!-- Add Post Section -->
                        @csrf
                        @method('put')
                        <section id="add-post" class="add-post-section mb-5">
                            <h2>{{ __('blog.edit_post') }}</h2>
                            <div class="post-form p-3 border rounded">
                                <!-- Post Title -->
                                <label for="postTitleAr">{{ __('blog.title_ar') }}</label>
                                <input value="{{ $post->translate('ar')->title }}" name="title_ar" type="text"
                                    id="postTitleAr" class="form-control mb-2" />
                                <label for="postTitleEn">{{ __('blog.title_en') }}</label>
                                <input value="{{ $post->translate('en')->title }}" name="title_en" type="text"
                                    id="postTitleEn" class="form-control mb-2" />

                                <label for="postContentAr">{{ __('blog.description_ar') }}</label>
                                <textarea name="description_ar" id="postContentAr"
                                    class="form-control mb-2" rows="3">{{ $post->translate('ar')->description }}</textarea>

                                <label for="postContentEn">{{ __('blog.description_en') }}</label>
                                <textarea  name="description_en" id="postContentEn"
                                    class="form-control mb-2" rows="3">{{ $post->translate('en')->description }}</textarea>

                                <!-- Image Upload -->
                                <label for="postImage">{{ __('blog.image') }}</label>
                                <input name="image" type="file" id="postImage" class="form-control mb-2" />

                                <label for="postCategory">{{ __('blog.category') }}</label>
                                <select name="category_id" id="postCategory" class="form-control mb-2">
                                    @foreach ($categories as $category)
                                        <option @selected($category->id == $post->category_id) value="{{ $category->id }}">
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>

                                <label>{{ __('blog.tags') }}</label>
                                <div class="row">
                                    @foreach ($tags as $tag)
                                        <div class="col-md-2">
                                            <input @checked(in_array($tag->id, $post->tags->pluck('id')->toArray())) value="{{ $tag->id }}" type="checkbox"
                                                name="tags[]" class="checkbox">
                                            <label for="id={{ $tag->title }}">{{ $tag->title }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Post Button -->
                                <button type="submit"
                                    class="btn btn-primary post-btn">{{ __('blog.edit_post') }}</button>
                            </div>
                        </section>
                    </form>
                </section>
            </div>
            <!-- /.card-body -->
    </div>
    </div>
    <!-- /.card-body -->
    </div>
    </section>
    <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection

@push('js')
    <script>
        $(function() {
            $("#postImage").fileinput({
                theme: 'fa5',
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                enableResumableUpload: false,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                    "{{ asset('uploads/blog/' . $post->image->path) }}",
                ],
                initialPreviewConfig: [{
                    caption: '{{ $post->image->path }}',
                    width: '120px',
                    key: {{ $post->image->id }},
                    showRemove: false,
                    showDrag: false,
                }, ],
            });
            $("#postContentAr").summernote({
                height: 300,
            });
            $("#postContentEn").summernote({
                height: 300,
            });

        });
    </script>
@endpush
