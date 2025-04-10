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
                <div class="row">
                    <div class="col-md-6">
                        <img class="w-100" src="{{ asset('uploads/blog/'.$post->image->path) }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <h2>{{ $post->title }}</h2>

                        <p>{{ __('blog.num_of_views') }}: {{ $post->num_of_views }}</p>
                        <p>{{ __('blog.status') }}: {{ $post->is_available }}</p>
                        <p>{{ __('blog.category') }}: <span class="badge badge-success m-1">{{ $post->category->title }}</span></p>
                        <p>{{ __('custom.dashboard.tags') }}:
                            @foreach ($post->tags as $tag)
                                <span class="badge badge-info m-1">{{ $tag->title }}</span>,
                            @endforeach
                        </p>

                        
                    </div>
                </div>
                <div class="row p-2">
                    {!! $post->description !!}
                </div>
                <div class="row">
                    <div class=" mx-5">
                        <a class=" btn btn-primary m-1" href="{{ route('admin.posts.edit', $post->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a title="{{ __('blog.change_status') }}" class="btn @if($post->is_available == 'Active' || $post->is_available == 'مفعل' ) btn-warning @else btn-success @endif m-1" href="{{ route('admin.posts.change_status', $post->id) }}">
                            <i class="fas @if($post->is_available == 'Active' || $post->is_available == 'مفعل' ) fa-times @else fa-check  @endif"></i>
                        </a>

                        
                    </div>
                </div>
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
