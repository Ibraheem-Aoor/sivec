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
            @if ($buildings_gallery)
                height: 402px;
                width: 350px;
            @else
                height: 250px;
                width: 350px;
            @endif
            transform: scale(1.0);
            transition: transform 0.4s ease;
        }

        .img-box {
            box-sizing: content-box;
            margin: 10px;

            @if ($buildings_gallery)
                height: 402px;
                width: 350px;
            @else
                height: 250px;
                width: 350px;
            @endif
            overflow: hidden;
            display: inline-block;
            color: white;
            position: relative;
            background-color: white;
        }

        .caption {
            position: absolute;
            bottom: 5px;
            left: 20px;
            opacity: 0.0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .transparent-box {
            @if ($buildings_gallery)
                height: 402px;
                width: 350px;
            @else
                height: 250px;
                width: 350px;
            @endif
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
            width: 80%;
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
@endpush
@section('content')
    @include('site.partials.page-title')
    <div class="gallery-image">
        @foreach ($images as $image)
            <div class="img-box" id="img-box-{{ $loop->index }}">
                <img src="{{ $image->getUrl() }}" loading="lazy" alt="" />
                <div class="transparent-box">
                    <div class="caption">
                        <p>{{ $image->category->name }}</p>
                        {{-- <p class="opacity-low">Architect Design</p> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
