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
                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                        <!-- Add Post Section -->
                        @csrf
                        <section id="add-post" class="add-post-section mb-5">
                            <h2>{{ __('blog.create_post') }}</h2>
                            <div class="post-form p-3 border rounded">
                                <!-- Post Title -->
                                <label for="postTitleAr">{{ __('blog.title_ar') }}</label>
                                <input name="title_ar" type="text" id="postTitleAr" class="form-control mb-2" />
                                <label for="postTitleEn">{{ __('blog.title_en') }}</label>
                                <input name="title_en" type="text" id="postTitleEn" class="form-control mb-2" />

                                <label for="postContentAr">{{ __('blog.description_ar') }}</label>
                                <textarea name="description_ar" id="postContentAr" class="form-control mb-2" rows="3"></textarea>

                                <label for="postContentEn">{{ __('blog.description_en') }}</label>
                                <textarea name="description_en" id="postContentEn" class="form-control mb-2" rows="3"></textarea>

                                <!-- Image Upload -->
                                <label for="postImage">{{ __('blog.image') }}</label>
                                <input name="image" type="file" id="postImage" class="form-control mb-2" />
                                
                                <label for="postCategory">{{ __('blog.category') }}</label>
                                <select name="category_id" id="postCategory" class="form-control mb-2">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>

                                <label>{{ __('blog.tag') }}</label>
                                <div class="row">
                                    @foreach ($tags as $tag)
                                        <div class="col-md-2">
                                            <input id="{{ $tag->id }}" value="{{ $tag->id }}" type="checkbox"
                                                name="tags[]" class="checkbox">
                                            <label for="id={{ $tag->title }}">{{ $tag->title }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Post Button -->
                                <button type="submit" class="btn btn-primary post-btn">{{ __('blog.create_post') }}</button>
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
