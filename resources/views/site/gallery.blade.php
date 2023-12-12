@extends('layouts.user.master')
@push('css')
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Raleway;
        }

        .heading {
            text-align: center;
            font-size: 2.0em;
            letter-spacing: 1px;
            padding: 40px;
            color: white;
        }

        .gallery-image {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .gallery-image img {
            transform: scale(1.0);
            transition: transform 0.4s ease;
        }

        .img-box {
            box-sizing: content-box;
            margin: 10px;
            width: 350px;
            overflow: hidden;
            display: inline-block;
            color: white;
            position: relative;
            background-color: white;

            @if ($is_interior_caetegory)
                height: 350px;
                transition: transform 0.4s ease;
                background-repeat: no-repeat !important;
                background-size: cover !important;
                transform: scale(1.0);
                transition: transform 0.4s ease;
            @endif
        }

        .caption {
            position: absolute;
            bottom: 5px;
            left: 20px;
            opacity: 0.0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .transparent-box {
            width: 350px;
            height: auto;
            background-color: rgba(0, 0, 0, 0);
            position: absolute;
            top: 0;
            left: 0;
            transition: background-color 0.3s ease;
        }

        .img-box:hover img {
            transform: scale(1.1);
        }

        .img-box:hover .transparent-box {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .img-box:hover .caption {
            transform: translateY(-20px);
            opacity: 1.0;
        }

        .img-box:hover {
            cursor: pointer;
        }

        .caption>p:nth-child(2) {
            font-size: 0.8em;
        }

        .opacity-low {
            opacity: 0.5;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            max-width: 700px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: auto;
            @if($is_interior_caetegory)
            width: 60%;
            @else
            width: 80%;
            @endif
            margin-top: 3% !important;
            margin-bottom: 5% !important;
        }

        .close {
            position: absolute;
            top: 15px;
            right: 26px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        @media (max-width: 600px) {
            .modal-content {
                max-width: 700px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: auto;
                width: 80%;
                margin-top: 15% !important;
                margin-bottom: 1cm !important;
            }

        }
    </style>

    {{-- START pagination style --}}
    <style>
        /* Start Pagination Section */
        .pagination_sec .pagination {
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .pagination_sec .page-item.active .page-link {
            background-color: #F25F29;
            border-color: #FAB758;
            color: #fff !important;
        }

        .pagination_sec .page-item .page-link {
            font-size: 23px;
            padding: 3px 25px;
            color: #100F0F;
            cursor: pointer !important;
        }


        .pagination_sec .span_direction {
            font-size: 18px;
            letter-spacing: 0.5px;
            font-weight: bold;
        }

        .pagination_sec .span_direction.span_direction_next {
            color: var(--basicColor);
        }

        .page-link:hover {
            z-index: 2;
            background-color: #F25F29;
            border-color: #F25F29;
            color: #fff !important;
        }

        html[lang="ar"] .pagination_sec .page-item:first-child .page-link {
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            border-top-right-radius: var(--bs-pagination-border-radius);
            border-bottom-right-radius: var(--bs-pagination-border-radius);
        }

        html[lang="ar"] .pagination_sec .page-item:last-child .page-link {
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            border-top-left-radius: var(--bs-pagination-border-radius);
            border-bottom-left-radius: var(--bs-pagination-border-radius);
        }

        @media (max-width:321px) {
            .pagination_sec .page-item .page-link {
                font-size: 12px !important;
                padding: 2px 11px !important;
            }
        }

        @media (min-width:325px) and (max-width:600px) {
            .pagination_sec .page-item .page-link {
                font-size: 13px !important;
                padding: 2px 15px !important;
            }
        }

        /* End Pagination Section */
    </style>
    {{-- End Pagination Style. --}}
@endpush
@section('content')
    @include('site.partials.page-title')
    <div class="gallery-image">
        @foreach ($images as $image)
            <div class="img-box" id="img-box-{{ $loop->index }}"
                @if ($is_interior_caetegory) style='background-image: url("{{ $image->getUrl() }}");background-repeat:no-repeat;' @endif>
                <img src="{{ $image->getUrl() }}" loading="lazy" alt=""
                    @if ($is_interior_caetegory) hidden @endif />
                <div class="transparent-box">
                    <div class="caption">
                        <p>{{ $image->category->name }}</p>
                        {{-- <p class="opacity-low">Architect Design</p> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('site.partials.pagiantion', ['items' => $images])
    <div id="img-modal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img-enlarged">
    </div>
@endsection

@push('js')
    <script>
        $('.img-box').click(function() {
            let modal = $('#img-modal');
            let img = $('#img-enlarged');
            let src = $(this).find('img').attr('src');
            img.attr('src', src);
            modal.css('display', 'block');
            $('header').hide();
            $('.page-title-section').hide();
        });
        $('.close').click(function() {
            $('#img-modal').css('display', 'none');
            $('header').show();
            $('.page-title-section').show();
        });
    </script>
@endpush
