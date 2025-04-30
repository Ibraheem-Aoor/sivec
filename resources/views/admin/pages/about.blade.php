@extends('layouts.admin.app')
@section('title')
    {{ __('custom.dashboard.about') }}
@endsection
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <style>
        .avatar-picture {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .avatar-picture .image-input {
            position: relative;
            display: inline-block;
            border-radius: 50%;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .avatar-picture .image-input .image-input-wrapper_first,
        .avatar-picture .image-input .image-input-wrapper_second {
            border: 3px solid transparent;
            background-image: url("");
            width: 200px;
            height: 200px;
            /* border-radius: 50%; */
            background-repeat: no-repeat;
            background-size: contain !important;
        }

        .avatar-picture .image-input .btn {
            height: 24px;
            width: 24px;
            border-radius: 50%;
            cursor: pointer;
            position: absolute;
            left: 3px;
            bottom: -9px;
            background-color: #FFFFFF;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding: 0;
            -webkit-filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.16));
            filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.16));
        }

        .avatar-picture .image-input .btn img {
            position: relative;
            top: -2px;
        }

        .avatar-picture .image-input .btn:hover {
            background-color: var(--main-color);
        }

        .avatar-picture .image-input .btn:hover img {
            -webkit-filter: invert(1) brightness(10);
            filter: invert(1) brightness(10);
        }

        .avatar-picture .image-input .btn input {
            width: 0 !important;
            height: 0 !important;
            overflow: hidden;
            opacity: 0;
            display: none;
        }

        th,
        td {
            font-size: 14px !important;
        }
    </style>
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="p-2">
        @include('admin.partials.page_header', [
            'page_title_1' => __('custom.dashboard.pages'),
            'page_title_2' => __('custom.dashboard.about'),
        ])

        <!-- Main content -->
        <section class="content" enc>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 class="card-title">{{ __('custom.dashboard.about_page_settings') }}</h3>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <form action="{{ route('admin.page.about.update') }}" method="POST">
                        <div class="row my-4">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ __('custom.about_image_1') }}: </label> <span
                                        class="text-danger  mb-4">480*565</span>
                                    <div class="col-sm-12">
                                        <div class="avatar-picture">
                                            <div class="image-input image-input-outline" id="imgUserProfile">
                                                <div class="image-input-wrapper_first" id="image-input-wrapper_first"
                                                    style="background-image: url('@if(isset($page_settings_ar['about_image_1'])) {{ asset('uploads/about/' . $page_settings_ar['about_image_1']) }} @else  {{ asset('admin_assets/dist/img/image_placeholder.jpg')  }} @endif');">
                                                </div>

                                                <label class="btn">
                                                    <i>
                                                        <img src="{{ asset('admin_assets/dist/img/edit.svg') }}"
                                                            alt="" class="img-fluid">
                                                    </i>
                                                    <input type="file" name="about_image_1" id="changeFirstImg"
                                                        accept=".png, .jpg, .jpeg , .webp">
                                                    <input type="button" value="Upload" id="uploadFirstButton">
                                                </label>

                                            </div>
                                        </div>
                                        <div class="text-center">

                                            <span class="text-danger text-center">80*80</span>
                                        </div>
                                    </div>
                                    {{-- <input type="file" name="about_image_1" class="form-control"> --}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">{{ __('custom.about_image_2') }}: </label><span
                                        class="text-danger mb-2">425*300</span>
                                    <div class="col-sm-12">
                                        <div class="avatar-picture">
                                            <div class="image-input image-input-outline" id="imgUserProfile">
                                                <div class="image-input-wrapper_second" id="image-input-wrapper_second"
                                                    style="background-image: url('@if(isset($page_settings_ar['about_image_2'])) {{ asset('uploads/about/' . $page_settings_ar['about_image_2']) }} @else  {{ asset('admin_assets/dist/img/image_placeholder.jpg')  }} @endif');">
                                                </div>

                                                <label class="btn">
                                                    <i>
                                                        <img src="{{ asset('admin_assets/dist/img/edit.svg') }}"
                                                            alt="" class="img-fluid">
                                                    </i>
                                                    <input type="file" name="about_image_2" id="changeSecondImg"
                                                        accept=".png, .jpg, .jpeg , .webp">
                                                    <input type="button" value="Upload" id="uploadSecondButton">
                                                </label>

                                            </div>
                                        </div>
                                        <div class="text-center">

                                            <span class="text-danger text-center">80*80</span>
                                        </div>
                                    </div>
                                    {{-- <input type="file" name="about_image_2" class="form-control"> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 my-4">
                            <div class="form-group">
                                <label for="">{{ __('custom.about_us_text_ar') }}:</label>
                                <textarea name="settings_ar[about_us_text]" id="about_us_text_ar" cols="30" rows="7" class="form-control">{{ @$page_settings_ar['about_us_text'] ?? null }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 my-4">
                            <div class="form-group">
                                <label for="">{{ __('custom.about_us_text_en') }}:</label>
                                <textarea name="settings_en[about_us_text]" id="about_us_text_en" cols="30" rows="7" class="form-control">{{ @$page_settings_en['about_us_text'] ?? null }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 my-4">
                            <div class="form-group">
                                <label for="">{{ __('custom.exclusive_design_description_ar') }}:</label>
                                <textarea name="settings_ar[exclusive_design_description]" id="exclusive_design_description_ar" cols="30"
                                    rows="4" class="form-control">{{ @$page_settings_ar['exclusive_design_description'] ?? null }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 my-4">
                            <div class="form-group">
                                <label for="">{{ __('custom.exclusive_design_description_en') }}:</label>
                                <textarea name="settings_en[exclusive_design_description]" id="exclusive_design_description_en" cols="30"
                                    rows="4" class="form-control">{{ @$page_settings_en['exclusive_design_description'] ?? null }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 my-4">
                            <div class="form-group">
                                <label for="">{{ __('custom.pro_team_description_ar') }}:</label>
                                <textarea name="settings_ar[pro_team_description]" id="pro_team_description_ar" cols="30" rows="4"
                                    class="form-control">{{ @$page_settings_ar['pro_team_description'] }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 my-4">
                            <div class="form-group">
                                <label for="">{{ __('custom.pro_team_description_en') }}:</label>
                                <textarea name="settings_en[pro_team_description]" id="pro_team_description_en" cols="30" rows="4"
                                    class="form-control">{{ @$page_settings_en['pro_team_description'] }}</textarea>
                            </div>
                        </div>

                        <div class="my-4">
                            {{-- Start features ar --}}
                            <div class="col-sm-6  my-4">
                                <div>
                                    <label for="">{{ __('custom.checklist_features_ar') }}:</label>
                                    <button type="button" class="add_feature btn-xs btn-primary"
                                        onclick="addNewFeature($(this).parent().parent() , 'ar');"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            @php
                                if (@$page_settings_ar['about_us_features']) {
                                    $features = json_decode($page_settings_ar['about_us_features'], true);
                                } else {
                                    $features = [null];
                                }
                            @endphp
                            @foreach ($features as $feature)
                                <div class="col-sm-6 my-1" id="features-en-div">
                                    <div class="form-group d-flex">
                                        ✔️ &nbsp; &nbsp;
                                        <input type="text" name="settings_ar[about_us_features][]"
                                            value="{{ $feature }}" class="form-control d-flex"> &nbsp;
                                        <button type="button" class="add_feature btn-xs btn-primary"
                                            onclick="addNewFeature($(this).parent().parent() , 'ar');"><i
                                                class="fa fa-plus"></i></button>&nbsp;
                                        <button type="button" class="remove_feature btn-xs btn-danger"
                                            onclick="deleteFeature($(this));"><i class="fa fa-trash"></i></button>

                                    </div>
                                </div>
                            @endforeach

                            {{-- end features ar --}}
                        </div>

                        <div class="my-4">
                            {{-- start features en --}}

                            <div class="col-sm-6  my-4">

                                <div>

                                    <label for="">{{ __('custom.checklist_features_en') }}:</label>
                                    <button type="button" class="add_feature btn-xs btn-primary"
                                        onclick="addNewFeature($(this).parent().parent() , 'en');"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            @php
                                if (@$page_settings_en['about_us_features']) {
                                    $features = json_decode($page_settings_en['about_us_features'], true);
                                } else {
                                    $features = [null];
                                }
                            @endphp
                            @foreach ($features as $feature)
                                <div class="col-sm-6 my-1" id="features-en-div">
                                    <div class="form-group d-flex">
                                        ✔️ &nbsp; &nbsp;
                                        <input type="text" name="settings_en[about_us_features][]"
                                            value="{{ $feature }}" class="form-control d-flex"> &nbsp;
                                        <button type="button" class="add_feature btn-xs btn-primary"
                                            onclick="addNewFeature($(this).parent().parent() , 'en');"><i
                                                class="fa fa-plus"></i></button>&nbsp;
                                        <button type="button" class="remove_feature btn-xs btn-danger"
                                            onclick="deleteFeature($(this));"><i class="fa fa-trash"></i></button>

                                    </div>
                                </div>
                            @endforeach
                            {{-- end features en --}}
                        </div>


                        <div class="row mt-5">
                            <div class="col-sm-12">
                                <button class="btn btn-outline-success">{{ __('custom.submit') }}</button>
                            </div>
                        </div>
                    </form>

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
    <script src="{{ asset('admin_assets/dist/js/custom/client.js') }}"></script>
    <script>
        // change image and preveiw
        $('#uploadFirstButton').on('click', function() {
            $('#changeFirstImg').click();
        })

        var file = null,
            reader = null;
        $('#changeFirstImg').change(function() {
            file = this.files[0];
            reader = new FileReader();
            reader.onloadend = function() {
                $('.image-input-wrapper_first').css('background-image', 'url("' + reader.result + '")');
            }
            if (file) {
                reader.readAsDataURL(file);
                console.log(file);
            }
        });


        $('#uploadSecondButton').on('click', function() {
            $('#changeSecondImg').click();
        })

        var file = null,
            reader = null;
        $('#changeSecondImg').change(function() {
            file = this.files[0];
            reader = new FileReader();
            reader.onloadend = function() {
                $('.image-input-wrapper_second').css('background-image', 'url("' + reader.result + '")');
            }
            if (file) {
                reader.readAsDataURL(file);
                console.log(file);
            }
        });
    </script>

    {{-- about features checklist --}}
    <script>
        function addNewFeature(div, lang) {
            var input_name = lang == 'ar' ? 'settings_ar[about_us_features]' : 'settings_en[about_us_features]';
            var html = `<div class="col-sm-6">
                        <div class="form-group d-flex">
                            ✔️ &nbsp; &nbsp;
                            <input type="text" name="${input_name}[]" class="form-control d-flex"> &nbsp;
                            <button type="button" class="add_feature btn-xs btn-primary" onclick="addNewFeature($(this).parent().parent() , '${lang}');"><i
                                    class="fa fa-plus"></i></button>&nbsp;
                            <button type="button" class="remove_feature btn-xs btn-danger" onclick="deleteFeature($(this));"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>`;
            div.after(html);
        };

        function deleteFeature(btn) {
            btn.parent().parent().remove();
        };
    </script>
@endpush
